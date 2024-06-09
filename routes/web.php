<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\StaffController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuthControlle;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Middleware\TokenVerificationMiddleware;

Route::get('/', function () {
    return view('welcome');
});

//Admin Routes
Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', [AdminAuthControlle::class, 'admin_login_view'])->name('admin.login_view');
    Route::post('/login', [AdminAuthControlle::class, 'admin_login'])->name('admin.login');
    Route::post('/logout', [AdminAuthControlle::class, 'admin_logout'])->name('admin.logout');

    //Admin Protected Routes with JWT
    Route::get('/dashboard', [DashboardController::class,'dashboard'])->name('admin.dashboard');

    Route::middleware([TokenVerificationMiddleware::class])->group(function () {

        //Admin

        Route::resource('/staff', StaffController::class);
        Route::resource('/customer', CustomerController::class);
        Route::resource('/user', UserController::class);

        Route::resource('/permissions', PermissionController::class);
        Route::resource('/roles', RoleController::class);

    });
});