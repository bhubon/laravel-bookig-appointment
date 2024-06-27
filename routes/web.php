<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Staff\ScheduleController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PermissionController;

use App\Http\Middleware\TokenVerificationMiddleware;
use App\Http\Controllers\Admin\UserProfileController;
use App\Http\Controllers\Admin\StaffScheduleController;
//use App\Http\Controllers\Customer\AppointmentController;
use App\Http\Controllers\Admin\CustomerAppointmentController;

//Frontend
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\CustomerAuthControlle;
use App\Http\Controllers\Frontend\AppointmentController;


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

                Route::get('/servicePage', [ServiceController::class, 'servicePage']);
                Route::resource('service', ServiceController::class);
                Route::post('/update-service', [ServiceController::class, 'updateService']);
                Route::get('/servicePage', [ServiceController::class, 'servicePage']);
                Route::resource('service', ServiceController::class);
                Route::post('/update-service', [ServiceController::class, 'updateService']);

                Route::get('/schedulePage', [StaffScheduleController::class, 'schedulePage']);
                Route::resource('staff-schedule', StaffScheduleController::class);

                Route::get('/appointmentPage', [CustomerAppointmentController::class, 'appointmentPage']);
                Route::resource('/customer-appointment', CustomerAppointmentController::class);
                Route::resource('staff-schedule', StaffScheduleController::class);
                Route::get('/schedulePage', [StaffScheduleController::class, 'schedulePage']);
                Route::get('/staffList', [StaffScheduleController::class, 'staffList']);
                Route::get('/schedulePage', [StaffScheduleController::class, 'schedulePage']);
                Route::get('/staffList', [StaffScheduleController::class, 'staffList']);
                Route::post('/update-schedule', [StaffScheduleController::class, 'updateSchedule']);

                Route::resource('permissions', PermissionController::class);
                Route::resource('roles', RoleController::class);

                route::get('/all-users', [UserController::class, 'get_users']);

                Route::get('/userProfile', [UserProfileController::class, 'ProfilePage']);
                Route::get('/user-profile', [UserProfileController::class, 'UserProfile']);
                Route::post('/user-update', [UserProfileController::class, 'UpdateProfile']);

                Route::get('/user-password', [UserProfileController::class, 'PasswordPage']);
                Route::post('/user-password-update', [UserProfileController::class, 'UpdatePassword']);


                //Views

                Route::get('/users', [UserController::class, 'user_index'])->name('user.all');
                Route::get('/staff-list', [StaffController::class, 'staff_index'])->name('staff.all');

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
// Route::prefix('customer')->middleware([TokenVerificationMiddleware::class])->group(function () {
//         Route::resource('appointment', AppointmentController::class);
// });

//Front Area

// Public Routes
Route::get('/', [HomeController::class, 'home'])->name('frontend.home');

Route::get('/registration', [CustomerAuthControlle::class, 'customer_registration'])->name('customer.registration');
Route::post('/registration', [CustomerAuthControlle::class, 'store_customer_registration']);

Route::get('/login', [CustomerAuthControlle::class, 'customer_login'])->name('customer.login');
Route::post('/login', [CustomerAuthControlle::class, 'store_customer_login']);

Route::middleware([TokenVerificationMiddleware::class])->group(function () {
    Route::get('/dashboard', [AppointmentController::class, 'dashboard']);
    Route::get('/appointment', [AppointmentController::class, 'appointment_page'])->name('frontend.appointment');
    Route::post('/my-appointment', [AppointmentController::class, 'store_appointment']);
    Route::get('/logout', [AppointmentController::class, 'logout'])->name('logout');
});