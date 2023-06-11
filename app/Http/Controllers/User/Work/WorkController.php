<?php

namespace App\Http\Controllers\User\Work;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\AttendanceError;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $searchMonths = Attendance::where('user_id', Auth::id())
        ->selectRaw('MONTH(created_at) as month')//MONTHメソッドを使用してcreated_atのmonth部分のみを配列にしてmonthに格納
        ->groupByRaw('MONTH(created_at)')//MONTHメソッドで取得した各データの同じ月をグループ化
        ->get();

        $works = Attendance::where('user_id', Auth::id())->whereMonth('created_at', $search)->get();

        $error_number = AttendanceError::where('user_id', Auth::id())->where('error_info', '')->orWhere('error_info', null)->get();
        $user_attend = User::where('id', Auth::id())->first();

        $number = $error_number->count();

        return view('user.work.index', compact('works', 'searchMonths', 'number', 'user_attend'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $work = Attendance::where('id', $id)->first();

        return view('user.work.edit', compact('work'));
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
        $attendance = Attendance::where('user_id', Auth::id())->where('id', $id)->first();

        $attendance->attendance_time = $request->attendance;
        $attendance->leaving_time = $request->leaving;
        $attendance->rest_time = $request->rest;
        $attendance->save();

        return redirect()->route('user.work.index');
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
