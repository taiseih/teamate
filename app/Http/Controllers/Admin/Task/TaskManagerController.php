<?php

namespace App\Http\Controllers\Admin\Task;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $now = Carbon::now();
        $users = User::all();
        $admin = Admin::where('id', Auth::id())->first();

        $tasks = Task::with(['user'])->whereDate('created_at', $now->toDateString())->get();

        
        return view('admin.members.index', compact('users', 'tasks', 'admin'));//社員一覧を表示
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('admin.project.show', compact('user'));
    }
    
    public function project($id)
    {
        $users = User::findOrFail($id);

        return view('admin.project.edit', compact('users'));
    }
    
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->project = $request->project;
        $user->project_info = $request->info;
        $user->company = $request->company;
        $user->project_attend = $request->attend;
        $user->save();

        return redirect()->route('admin.members.index');
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
