<?php

namespace App\Http\Controllers\User\Attendance;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

        return view('user.attendance.index', compact('at_info', 'users'));
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
            'condition' => $request->condition,
        ]);

        return redirect()->route('user.attendance.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
            ]);
        }

        return redirect()->route('user.attendance.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
