<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\StaffScheduleController;

use App\Http\Controllers\Customer\AppointmentController;
use App\Http\Controllers\Staff\ScheduleController;
use App\Http\Middleware\TokenVerificationMiddleware;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', function () {
    return view('welcome');
});

// Admin Routes
Route::prefix('admin')->group(function () {
    // Authentication Routes
    Route::get('/login', [AdminAuthController::class, 'admin_login_view'])->name('admin.login_view');
    Route::post('/login', [AdminAuthController::class, 'admin_login'])->name('admin.login');


    // Admin Protected Routes with JWT
    Route::middleware([TokenVerificationMiddleware::class])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/logout', [AdminAuthController::class, 'admin_logout'])->name('admin.logout');


        Route::resource('staff', StaffController::class);
        Route::resource('customer', CustomerController::class);
        Route::resource('user', UserController::class);
        Route::resource('service', ServiceController::class);

        Route::resource('staff-schedule', StaffScheduleController::class);
        Route::get('/schedulePage', [StaffScheduleController::class, 'schedulePage']);
        Route::get('/staffList', [StaffScheduleController::class,'staffList']);

        Route::resource('permissions', PermissionController::class);
        Route::resource('roles', RoleController::class);

        route::get('/all-users',[UserController::class,'get_users']);


        //Views

        Route::get('/users',[UserController::class,'user_index'])->name('user.all');
        Route::get('/staff-list',[StaffController::class,'staff_index'])->name('staff.all');

    });
});

// Staff Routes
Route::prefix('staff')->middleware([TokenVerificationMiddleware::class])->group(function () {
    Route::resource('schedule', ScheduleController::class);
});

// Customer Routes
Route::prefix('customer')->middleware([TokenVerificationMiddleware::class])->group(function () {
    Route::resource('appointment', AppointmentController::class);
});
