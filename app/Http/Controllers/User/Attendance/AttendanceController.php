<?php

namespace App\Http\Controllers\User\Attendance;

use App\Http\Controllers\Controller;
use App\Mail\AttendanceMail;
use App\Models\Attendance;
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
        Attendance::create([
            'user_id' => Auth::id(),
            'attendance_time' => $request->attendance,
            'job_type' => $request->jobType,
            'condition' => $request->condition,
        ]);

        //メール送信部分
        $name = User::where('id', Auth::id())->value('name');//valueメソッドでnameカラムから取得している（日本語で採れた〜！）データベースからデータを取得したら数列になる
        $attendance = $request->attendance;
        if($request->jobType == 1){
            $jobType = '自社業務';
        }elseif($request->jobType == 2){
            $jobType = '案件業務';
        }
        $condition = $request->condition;

        Mail::send(new AttendanceMail($name, $attendance, $jobType, $condition));

        return redirect()->route('user.attendance.index');
    }

    public function edit($id){
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
                'leaving_time' => $now,
                'information' => $request->information,
            ]);
        }

        $name = User::where('id', Auth::id())->value('name'); //valueメソッドでnameカラムから取得している（日本語で採れた〜！）
        $attendance = $now;
        $jobType = null;
        $condition = null;

        Mail::send(new AttendanceMail($name, $attendance, $jobType, $condition));

        return redirect()->route('user.attendance.index');


    }

    public function absenceCreate(){
        return view('user.attendance.absence');
    }

    public function absenceStore(Request $request){
        Attendance::create([
            'user_id' => Auth::id(),
            'attendance_time' => $request->attendance,
            'information' => $request->information,
        ]);
        return redirect()->route('user.attendance.index');
    }
}
