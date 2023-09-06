<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\LoginHistoryController;
use App\Http\Controllers\CasualLeaveController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\MyProfileController;
use App\Http\Controllers\LeavePolicyController;
use Illuminate\Support\Facades\Auth;

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
// Route::get('/', [AuthController::class, 'login'])->name('login');
Route::get('/', function () { return view('auth.login'); });
Route::get('/login', function () { return view('auth.login'); });
Route::post('/login', [AuthController::class, 'store'])->name('login');

Auth::routes();
// dd(auth()->user());
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('roles', RoleController::class);



// Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
// Route::get('/profile', function () { return view('admin.profile.profile'); });

// Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
// Route::get('/profile', function () { return view('admin.profile.profile'); });
Route::get('/profile', 'App\Http\Controllers\MyProfileController@index')->name('profile');
Route::post('profile/store', [MyProfileController::class, 'store'])->name('profile.store');

Route::post('/employee', 'App\Http\Controllers\EmployeeController@index')->name('employee');
Route::get('employee/list', [EmployeeController::class, 'getEmployee'])->name('employee.list');
Route::post('employee/store', [EmployeeController::class, 'store'])->name('employee.store');
Route::get('/employee/edit/{id}', 'App\Http\Controllers\EmployeeController@edit')->name('employee.edit');
Route::post('employee/edit/{id}', 'App\Http\Controllers\EmployeeController@update');
Route::delete('employee/delete/{id}', 'App\Http\Controllers\EmployeeController@destroy')->name('employee.delete');

Route::get('/department', 'App\Http\Controllers\DepartmentController@index');
Route::get('department/list', [DepartmentController::class, 'getDepartment'])->name('department.list');
Route::post('/department/store', 'App\Http\Controllers\DepartmentController@store')->name('department.store');
Route::delete('/department/{id}','App\Http\Controllers\DepartmentController@destroy')->name('department.destroy');
Route::get('/department/edit/{id}', 'App\Http\Controllers\DepartmentController@edit')->name('department.edit');

Route::get('/project', 'App\Http\Controllers\ProjectController@index');
Route::get('project/list', [ProjectController::class, 'getProject'])->name('project.list');
Route::post('/project/store', 'App\Http\Controllers\ProjectController@store')->name('project.store');
Route::get('/project/edit/{id}', 'App\Http\Controllers\ProjectController@edit')->name('project.edit');
Route::delete('/project/delete/{id}', 'App\Http\Controllers\ProjectController@destroy');

Route::get('/salary', 'App\Http\Controllers\SalaryController@index');
Route::get('salary/list', [SalaryController::class, 'getSalary'])->name('salary.list');
Route::post('/salary/store', 'App\Http\Controllers\SalaryController@store')->name('salary.store');
Route::delete('/salary/{id}', 'App\Http\Controllers\SalaryController@destroy');
Route::get('/salary/edit/{id}', 'App\Http\Controllers\SalaryController@edit')->name('salary.edit');

Route::get('/login-history', 'App\Http\Controllers\LoginHistoryController@index');
Route::get('login-history/list', [LoginHistoryController::class, 'getLoginHistory'])->name('login_history.list');

Route::get('/casual-leave', 'App\Http\Controllers\CasualLeaveController@index');
Route::post('/casual-leave/store', [CasualLeaveController::class, 'store'])->name('casual.store');

Route::get('/leave', 'App\Http\Controllers\LeaveController@index')->name('leave');
Route::get('leave/list', [LeaveController::class, 'getLeave'])->name('leave.list');
Route::post('leave/store', [LeaveController::class, 'store'])->name('leave.store');
Route::delete('/leave/{id}','App\Http\Controllers\LeaveController@destroy')->name('leave.destroy');
Route::get('/leave/edit/{id}', 'App\Http\Controllers\LeaveController@edit')->name('leave.edit');

Route::get('/leave-policy', 'App\Http\Controllers\LeavePolicyController@index')->name('leave_policy');
Route::post('leave-policy/store', [LeavePolicyController::class, 'store'])->name('leave_policy.store');


Route::get('/home', function () {
    return view('admin.dashboard');
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
Route::get('/employee/create', function () {
    return view('admin.employee.create');
});
Route::get('/leave', function () {
    return view('admin.leave.index');
});
Route::get('/salary-report', function () {
    return view('admin.salaryReport.index');
});
Route::get('/leave-record', function () {
    return view('admin.leaveRecord.index');
});
Route::get('/documents', function () {
    return view('admin.documents.index');
});





