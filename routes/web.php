<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UserProfileController;
use App\Http\Controllers\Admin\StaffScheduleController;
use App\Http\Controllers\Admin\CustomerAppointmentController;
use App\Http\Controllers\ListingController;

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
    Route::get('/logout', [AdminAuthController::class, 'admin_logout'])->name('admin.logout');

    // Admin Protected Routes with JWT
    Route::middleware([TokenVerificationMiddleware::class])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
        Route::resource('staff', StaffController::class);
        Route::resource('customer', CustomerController::class);
        Route::resource('user', UserController::class);

        Route::get('/servicePage',[ServiceController::class,'servicePage']);
        Route::resource('service', ServiceController::class);
        Route::post('/update-service',[ServiceController::class,'updateService']);

        Route::get('/schedulePage',[StaffScheduleController::class,'schedulePage']);
        Route::resource('staff-schedule', StaffScheduleController::class);
        //Route::post('/update-schedule',[StaffScheduleController::class,'updateSchedule']);

        Route::get('/appointmentPage',[CustomerAppointmentController::class,'appointmentPage']);
        Route::resource('/customer-appointment', CustomerAppointmentController::class);

        Route::resource('permissions', PermissionController::class);
        Route::resource('roles', RoleController::class);

        Route::get('/userProfile',[UserProfileController::class,'ProfilePage']);
        Route::get('/user-profile',[UserProfileController::class,'UserProfile']);
        Route::post('/user-update',[UserProfileController::class,'UpdateProfile']);

        Route::get('/user-password',[UserProfileController::class,'PasswordPage']);
        Route::post('/user-password-update',[UserProfileController::class,'UpdatePassword']);
    });
});

// Listing Routes
Route::get('/get-staff-list', [ListingController::class, 'getStaffList']);
Route::get('/get-staff-by-date', [ListingController::class, 'getStaffByDate']);
Route::get('/get-schedule-time', [ListingController::class, 'getScheduleTime']);
Route::get('/get-customer-list', [ListingController::class, 'getCustomerList']);
Route::get('/get-update-schedule-time', [ListingController::class, 'getUpdateScheduleTime']);

// Staff Routes
Route::prefix('staff')->middleware([TokenVerificationMiddleware::class])->group(function () {
    Route::resource('schedule', ScheduleController::class);
});

// Customer Routes
Route::prefix('customer')->middleware([TokenVerificationMiddleware::class])->group(function () {
    Route::resource('appointment', AppointmentController::class);
});
