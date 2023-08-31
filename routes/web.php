<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
<<<<<<< Updated upstream
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DepartmentController;
=======
use App\Http\Controllers\DepartmentController;

>>>>>>> Stashed changes
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

Route::post('/login', [AuthController::class, 'store'])->name('login');


Route::post('/employee', 'App\Http\Controllers\EmployeeController@index')->name('employee');
Route::get('employee/list', [EmployeeController::class, 'getEmployee'])->name('employee.list');

Route::get('/department', 'App\Http\Controllers\DepartmentController@index');
Route::get('department/list', [DepartmentController::class, 'getDepartment'])->name('department.list');
Route::post('/store', 'App\Http\Controllers\DepartmentController@store')->name('store');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('welcome');
});

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

Route::get('/employee/create', function () {
    return view('admin.employee.create');
});

Route::get('/leave', function () {
    return view('admin.leave.index');
});

Route::get('/project', function () {
    return view('admin.project.index');
});

Route::get('/salary', function () {
    return view('admin.salary.index');
});

Route::get('/salary-report', function () {
    return view('admin.salaryReport.index');
});

Route::get('/leave-record', function () {
    return view('admin.leaveRecord.index');
});

Route::get('/casual-leave', function () {
    return view('admin.casualLeave.index');
});

Route::get('/documents', function () {
    return view('admin.documents.index');
});

Route::get('/leave-policy', function () {
    return view('admin.leavePolicy.index');
});




