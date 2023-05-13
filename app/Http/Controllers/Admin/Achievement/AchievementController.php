<?php

namespace App\Http\Controllers\Admin\Achievement;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\User;
use Illuminate\Http\Request;

class AchievementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('admin.achievement.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function workerAchievement(Request $request)
    {
        $achieve = $request->achievement;//index.blade.phpから送られたパラメータ
        $search = $request->search;//list.blade.phpから送られたパラメータ
        
        $at_achieve = Attendance::where('user_id', $achieve)->whereMonth('created_at', $search)->get();//検索するときには改めてlist.blade.phpからachieveとsearchのパラメータを受け取って渡す list.blade.phpの月選択でパラメータが二つ渡ってきたときに初めて変数が格納される

        $searchMonths = Attendance::where('user_id', $achieve)
        ->selectRaw('MONTH(created_at) as month') //MONTHメソッドを使用してcreated_atのmonth部分のみを配列にしてmonthに格納
        ->groupByRaw('MONTH(created_at)') //MONTHメソッドで取得した各データの同じ月をグループ化
        ->get();

        $user = User::where('id', $achieve)->first();

        return view('admin.achievement.list', compact('achieve', 'search', 'at_achieve', 'searchMonths', 'user'));
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
        //
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
        //
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
