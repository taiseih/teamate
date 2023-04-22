<?php

use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\Task\TaskController;
use App\Http\Controllers\User\Attendance\AttendanceController;
use App\Http\Controllers\User\Top\TopPageController;
use App\Http\Controllers\User\Work\WorkController;
use GuzzleHttp\Promise\Create;
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

Route::middleware(['auth:users'])->group(function () {
    Route::get('/absence/create', [AttendanceController::class, 'absenceCreate'])->name('absence.create');
    Route::post('/absence', [AttendanceController::class, 'absenceStore'])->name('absence.store');
});

Route::resource('work', WorkController::class)
->middleware(['auth:users']);

Route::resource('profile', ProfileController::class)
->middleware('auth:users');

Route::resource('task',TaskController::class)
->middleware('auth:users');

Route::resource('top', TopPageController::class)
->middleware('auth:users');

Route::get('/', function () {
    // return view('user.welcome');
    return redirect()->route('user.login');
});

Route::get('/dashboard', function () {
    return abort(404);
})->middleware(['auth:users'])->name('dashboard');

require __DIR__.'/auth.php';
