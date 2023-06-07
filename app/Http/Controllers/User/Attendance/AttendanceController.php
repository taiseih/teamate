<?php

namespace App\Http\Controllers\User\Attendance;

use App\Http\Controllers\Controller;
use App\Mail\AttendanceMail;
use App\Models\Attendance;
use App\Models\AttendanceError;
use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $at_info = Attendance::first();
        $now = Carbon::now();
        $users = User::where('id', Auth::id())->first();

        $at_info = DB::table('attendances')->where('user_id', Auth::id())
            ->whereDate('created_at', $now->toDateString())
            ->whereNull('leaving_time')
            ->first();

        $date = $now->format('m月d日');

        return view('user.attendance.index', compact('at_info', 'users', 'date'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.attendance.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user_attend = User::where('id', Auth::id())->select('project_attend')->first();
        $req_attend = $request->attendance;

        Attendance::create([
            'user_id' => Auth::id(),
            'attendance_time' => $request->attendance,
            'job_type' => $request->jobType,
            'status' => $request->status,
        ]);

        if($user_attend->project_attend != $req_attend){
            AttendanceError::create([
                'user_id' => Auth::id(),
                'attendance' => $request->attendance,
            ]);
        }

        if($_POST['title'])
        Task::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'information' => $request->information,
        ]);

        //メール送信部分
        $name = User::where('id', Auth::id())->value('name'); //valueメソッドでnameカラムから取得している（日本語で採れた〜！）データベースからデータを取得したら数列になる
        $attendance = $request->attendance;
        if ($request->jobType == 1) {
            $jobType = '案件業務';
        } elseif ($request->jobType == 2) {
            $jobType = '自社業務';
        }
        $status = $request->status;
        $information = null;

        //   Mail::send(new AttendanceMail($name, $attendance,$information, $jobType, $status));
        return redirect()->route('user.attendance.index');
    }

    public function edit($id)
    {
        $now = now();

        $at_info = DB::table('attendances')->where('user_id', Auth::id())
            ->whereDate('created_at', $now->toDateString())
            ->whereNull('leaving_time')
            ->first();

        return view('user.attendance.leaving', compact('at_info'));
    }

    public function update(Request $request, $id)
    {
        $user_id = Auth::id();
        $now = now();

        $attendance = Attendance::where('user_id', $user_id)
            ->where('id', $id)
            ->whereNull('leaving_time')
            ->orderByDesc('id')
            ->first();

        if ($attendance) {
            $attendance->update([
                'leaving_time' => substr($now, 11,5),
                'rest_time' => "01:00", //退勤時に１時間の休憩時間を設ける
                'information' => $request->information,
            ]);
        }

        $name = User::where('id', Auth::id())->value('name'); //valueメソッドでnameカラムから取得している（日本語で採れた〜！）
        $attendance = $now;
        $information = $request->information;
        $jobType = null;
        $status = null;

        //   Mail::send(new AttendanceMail($name, $attendance, $information, $jobType, $status));
        return redirect()->route('user.attendance.index');
    }

    public function absenceCreate()
    {
        return view('user.attendance.absence');
    }

    public function absenceStore(Request $request)
    {
        Attendance::create([
            'user_id' => Auth::id(),
            'attendance_time' => $request->attendance,
            'information' => $request->information,
        ]);

        $name = User::where('id', Auth::id())->value('name');
        $attendance = $request->attendance;
        $information = $request->information;
        $jobType = null;
        $status = null;

        //  Mail::send(new AttendanceMail($name, $attendance, $information, $jobType, $status));
        return redirect()->route('user.attendance.index');
    }
}
