<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\Auth\AuthController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'submit'])->name('submit');




Route::post('/employee', 'App\Http\Controllers\EmployeeController@index')->name('employee');
Route::get('employee/list', [EmployeeController::class, 'getEmployee'])->name('employee.list');
Route::get('/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/employee', function () {
    return view('admin.employee.index');
});

Route::get('/employee', function () {
    return view('admin.employee.index');
});

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
});

Route::get('/get-otp', function () {
    return view('auth.get-otp');
});

Route::get('/set-password', function () {
    return view('auth.set-password');
});

Route::get('/project', function () {
    return view('admin.project.index');
});

Route::get('/profile', function () {
    return view('admin.profile.profile');
});
