<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = Admin::where('id', Auth::id())->first();

        return view('admin.profile.index', compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admin.profile.edit', compact('admin'));
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
        $admin = Admin::findOrFail($id);
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->save();

        return redirect()->route('admin.profile.index');
    }

    public function managerIndex()
    {
        $managers = Admin::all();
        $admin = Admin::where('id', Auth::id())->first();

        return view('admin.manager.index', compact('managers', 'admin'));
    }

    public function managerCreate()
    {
        return view('admin.manager.create');
    }

    public function managerStore(Request $request)
    {
        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'access_level' => $request->level,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.manager.index');
    }

    public function managerEdit($id)
    {
        $manager = Admin::findOrFail($id);

        return view('admin.manager.edit', compact('manager'));
    }

    public function managerUpdate(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);
        $admin->update([
            'name' => $request->name,
            'email' => $request->email,
            'access_level' => $request->level,
            'password' => $request->password,
        ]);

        return redirect()->route('admin.manager.index');
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
