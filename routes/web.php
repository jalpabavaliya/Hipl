<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\LoginHistoryController;
use App\Http\Controllers\CasualLeaveController;
<<<<<<< Updated upstream
=======
use App\Http\Controllers\RoleController;
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
// dd(auth()->user());
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
});
=======

Route::resource('roles', RoleController::class);
Route::resource('users', UserController::class);
Route::resource('products', ProductController::class);
>>>>>>> Stashed changes

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/profile', function () { return view('admin.profile.profile'); });
Route::post('/employee', 'App\Http\Controllers\EmployeeController@index')->name('employee');
Route::get('employee/list', [EmployeeController::class, 'getEmployee'])->name('employee.list');
Route::post('employee/store', [EmployeeController::class, 'store'])->name('employee.store');
Route::get('/department', 'App\Http\Controllers\DepartmentController@index');
Route::get('department/list', [DepartmentController::class, 'getDepartment'])->name('department.list');
Route::post('/department/store', 'App\Http\Controllers\DepartmentController@store')->name('department.store');
Route::get('/project', 'App\Http\Controllers\ProjectController@index');
Route::get('project/list', [ProjectController::class, 'getProject'])->name('project.list');
<<<<<<< Updated upstream
Route::post('/project/store', 'App\Http\Controllers\ProjectController@store')->name('project.store');
 
=======
>>>>>>> Stashed changes
Route::get('/salary', 'App\Http\Controllers\SalaryController@index');
Route::get('salary/list', [SalaryController::class, 'getSalary'])->name('salary.list');
<<<<<<< Updated upstream
=======

Route::get('/login-history', 'App\Http\Controllers\LoginHistoryController@index');
Route::get('login-history/list', [LoginHistoryController::class, 'getLoginHistory'])->name('login_history.list');

>>>>>>> Stashed changes
Route::get('/casual-leave', 'App\Http\Controllers\CasualLeaveController@index');
Route::post('/casual-leave/store', [CasualLeaveController::class, 'store'])->name('casual.store');

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
Route::get('/leave-policy', function () {
    return view('admin.leavePolicy.index');
});




