<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LeaveBalanceController;
use App\Http\Controllers\LeaveCategoryController;
use App\Http\Controllers\LeaveReportController;
use App\Http\Controllers\LeaveRequestController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login-request', [AuthController::class, 'loginRequest'])->name('login.request');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register-request', [AuthController::class, 'registerRequest'])->name('register.request');
});

Route::middleware(['auth'])->group(function () {
    // logout route
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    // admin panel routes
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // user type routes
    Route::get('/admin/user', [UserController::class, 'index'])->name('admin.user');
    Route::post('/admin/user', [UserController::class, 'store'])->name('admin.user.store');
    Route::get('/admin/user/{id}', [UserController::class, 'edit'])->name('admin.user.edit');
    Route::put('/admin/user/{id}', [UserController::class, 'update'])->name('admin.user.update');
    Route::delete('/admin/user/{id}', [UserController::class, 'destroy'])->name('admin.user.destroy');
    // leave_category type routes
    Route::get('/admin/leave_category', [LeaveCategoryController::class, 'index'])->name('admin.leave_category');
    Route::post('/admin/leave_category', [LeaveCategoryController::class, 'store'])->name('admin.leave_category.store');
    Route::get('/admin/leave_category/{id}', [LeaveCategoryController::class, 'edit'])->name('admin.leave_category.edit');
    Route::put('/admin/leave_category/{id}', [LeaveCategoryController::class, 'update'])->name('admin.leave_category.update');
    Route::delete('/admin/leave_category/{id}', [LeaveCategoryController::class, 'destroy'])->name('admin.leave_category.destroy');
    // leave_request type routes
    Route::get('/admin/leave_request', [LeaveRequestController::class, 'index'])->name('admin.leave_request');
    Route::get('/admin/leave_request/create', [LeaveRequestController::class, 'create'])->name('admin.leave_request.create');
    Route::get('/admin/leave_request/show/{id}', [LeaveRequestController::class, 'show'])->name('admin.leave_request.show');
    Route::post('/admin/leave_request/approveOrReject/{id}', [LeaveRequestController::class, 'approveOrReject'])->name('admin.leave_request.approveOrReject');
    Route::post('/admin/leave_request', [LeaveRequestController::class, 'store'])->name('admin.leave_request.store');
    Route::get('/admin/leave_request/{id}', [LeaveRequestController::class, 'edit'])->name('admin.leave_request.edit');
    Route::put('/admin/leave_request/{id}', [LeaveRequestController::class, 'update'])->name('admin.leave_request.update');
    Route::delete('/admin/leave_request/{id}', [LeaveRequestController::class, 'destroy'])->name('admin.leave_request.destroy');

    Route::get('/admin/leave_balance', [LeaveBalanceController::class, 'index'])->name('admin.leave_balance');

    Route::get('/admin/leave_report', [LeaveReportController::class, 'index'])->name('admin.leave_report');
});