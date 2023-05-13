<?php

namespace App\Http\Controllers\Admin\CSV;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\StreamedResponse;

class CSVController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function download(Request $request)
    {
        $userId = $request->user;
        $searchMonth = $request->month;

        $data = Attendance::with(['user'])->where('user_id', $userId)
            ->whereMonth('created_at', $searchMonth)
            ->get();

        // CSVファイルのヘッダー行を作成
        $header = ['日付', '出勤時間', '退勤時間', '休憩時間', '稼働時間'];

        // CSVファイルを作成し、データを書き込む
        $file = fopen('php://temp', 'r+');
        fputcsv($file, $header);
        foreach ($data as $row) {

            if ($row->attendance_time === '欠勤' || $row->leaving_time == null) {
            //ない時はなにも入れない
            $workingHours = ' ';
        }
            else {
                // 出勤時間と退勤時間をDateTimeオブジェクトに変換する
                $attendanceTime = new DateTime($row->attendance_time);
                $leavingTime = new DateTime($row->leaving_time);

                if ($row->rest_time !== null) {
                    //休憩時間がnullじゃない時に$restTimeに休憩時間を格納
                    $restTime = strtotime($row->rest_time) - strtotime('00:00:00'); //休憩時間をstrtotimeで秒数変換して、00:00:00からrest_timeの数値を引いて秒数を格納(int型)
                } else {
                    //休憩時間がない時は0を格納する
                    $restTime = 0;
                }

                // 稼働時間を計算する
                $diff = $attendanceTime->diff($leavingTime); //出勤時刻と退勤時刻の差分を求める(object(DateInterval)型)
                $diffSeconds = $diff->h * 3600 + $diff->i * 60 + $diff->s; //DateIntervalオブジェクトから、時間、分、秒の値を取得し、それぞれを3600秒、60秒で乗算し、すべての値を合計して、差を秒数に変換。最終的に計算された秒数を変数$diffSecondsに格納する。(int型)
                $workingSeconds = $diffSeconds - $restTime; //int型 変数diffSecondsで算出した勤務時間から休憩時間の秒数を引いて変数に格納
                $workingHours = sprintf('%01d時間%02d分', floor($workingSeconds / 3600), floor(($workingSeconds % 3600) / 60)); //時間は0埋め1桁、分数は0埋め2桁、floor関数で小数点切り捨て3600で割った結果を時間に、分数は余った数字を60で割る
            }

            // 日本語表示に変換してデータを整形する
            $formattedData = [
                $row->created_at->format('Y/m/d'),
                $row->attendance_time ? $row->attendance_time : '',
                $row->leaving_time ? $row->leaving_time : '',
                $row->rest_time,
                $workingHours,
            ];
            fputcsv($file, $formattedData);
        }
        rewind($file);

        $filename = $row->user->name . $searchMonth . '月分の稼働実績.csv';

        // レスポンスを生成し、CSVファイルをダウンロードさせる
        $response = new Response(stream_get_contents($file));
        $response->header('Content-Type', 'text/csv');
        $response->header('Content-Disposition', 'attachment; filename="' . $filename . '"');
        return $response;
    }
}
