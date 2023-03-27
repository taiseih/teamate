<?php

use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\Task\TaskController;
use App\Http\Controllers\User\Attendance\AttendanceController;
use App\Http\Controllers\User\Top\TopPageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('attendance', AttendanceController::class)
->middleware('auth:users');

Route::resource('profile', ProfileController::class)
->middleware('auth:users');

Route::resource('task',TaskController::class)
->middleware('auth:users');

Route::resource('top', TopPageController::class)
->middleware('auth:users');

Route::get('/', function () {
    return view('user.welcome');
});

Route::get('/dashboard', function () {
    return abort(404);
})->middleware(['auth:users'])->name('dashboard');

require __DIR__.'/auth.php';
