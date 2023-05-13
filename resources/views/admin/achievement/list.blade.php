<x-admin-layout>
    <section class="text-gray-600 body-font">
        <div class="sm:w-4/5 py-24 mx-auto">
            <div class="flex flex-col text-center w-full mb-20">
                <h1 class="sm:text-4xl text-3xl font-bold title-font mb-2 text-gray-600">{{ $user->name }}の稼働実績</h1>
            </div>

            <div class="flex mb-4">

                @foreach ($searchMonths as $month)
                    <a href="{{ route('admin.achievement.personal', ['achievement' => $achieve, 'search' => $month->month]) }}"
                        {{-- $achieveにはindexから受け取ったrequestパラメータ、searchにはcontrollerから受け取ったmonth 二つパラメータを送れるのは盲点だったよ！ --}}
                        class="@if (request('search') == $month->month) bg-blue-500 text-white @endif p-0.5 h-12 w-12 hover:bg-blue-600 hover:text-white mx-2 rounded-full"><span
                            class="text-3xl mx-1">{{ $month->month }}</span><span class="font-bold">月</span></a>
                @endforeach
            </div>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-midium text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="pl-6 py-3">
                                月/日
                            </th>
                            <th scope="col" class="pl-6 py-3">
                                出勤時刻
                            </th>
                            <th scope="col" class="pl-6 py-3">
                                退勤時刻
                            </th>
                            <th scope="col" class="pl-6 py-3">
                                休憩時間
                            </th>
                            <th scope="col" class="pl-6 py-3">
                                稼働時間
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($at_achieve as $work)
                            <tr class="bg-white border-b">
                                <th scope="row" class="px-6 py-4 font-medium">
                                    {{ $work->created_at->format('m/d') }}
                                </th>

                                <td class="px-6 py-4">
                                    {{ $work->attendance_time }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $work->leaving_time }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $work->rest_time }}
                                </td>
                                <td class="px-6 py-4">
                                    @php
                                        // 出勤時刻と退勤時刻が両方とも存在する場合
                                        if ($work->attendance_time !== '欠勤') {
                                            // 出勤時間と退勤時間をDateTimeオブジェクトに変換する
                                            $attendanceTime = new DateTime($work->attendance_time);
                                            $leavingTime = new DateTime($work->leaving_time);
                                        
                                            if ($work->rest_time !== null) {
                                                //休憩時間がnullじゃない時に$restTimeに休憩時間を格納
                                                $restTime = strtotime($work->rest_time) - strtotime('00:00:00'); //休憩時間をstrtotimeで秒数変換して、00:00:00からrest_timeの数値を引いて秒数を格納(int型)
                                            } else {
                                                //休憩時間がない時は0を格納する
                                                $restTime = 0;
                                            }
                                        
                                            // 稼働時間を計算する
                                            $diff = $attendanceTime->diff($leavingTime); //出勤時刻と退勤時刻の差分を求める(object(DateInterval)型)
                                            $diffSeconds = $diff->h * 3600 + $diff->i * 60 + $diff->s; //DateIntervalオブジェクトから、時間、分、秒の値を取得し、それぞれを3600秒、60秒で乗算し、すべての値を合計して、差を秒数に変換。最終的に計算された秒数を変数$diffSecondsに格納する。(int型)
                                            $workingSeconds = $diffSeconds - $restTime; //int型 変数diffSecondsで算出した勤務時間から休憩時間の秒数を引いて変数に格納
                                            $workingHours = sprintf('%01d時間%02d分', floor($workingSeconds / 3600), floor(($workingSeconds % 3600) / 60)); //時間は0埋め1桁、分数は0埋め2桁、floor関数で小数点切り捨て3600で割った結果を時間に、分数は余った数字を60で割る
                                        } else {
                                            //ない時はなにも入れない
                                            $workingHours = ' ';
                                        }
                                    @endphp

                                    <p>{{ $workingHours }}</p>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            @if ($search){{--$search（検索された値が存在しない場合は表示しない）--}}
                <a href="{{ route('admin.csv.download', [$achieve, $search]) }}">Download CSV</a>
            @endif
        </div>
    </section>

</x-admin-layout>
