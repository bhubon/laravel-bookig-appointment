<?php

use App\Http\Controllers\Admin\PermissionController;
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
    Route::post('/login', [AdminAuthControlle::class, 'admin_login'])->name('admin.login');
    Route::post('/logout', [AdminAuthControlle::class, 'admin_logout'])->name('admin.logout');
    Route::post('/forgot-password', [AdminAuthControlle::class, 'forgot_password'])->name('forgot-password');
    Route::post('/reset-password', [AdminAuthControlle::class, 'reset_password'])->name('reset-password');

    //Admin Protected Routes with JWT

    Route::middleware([TokenVerificationMiddleware::class])->group(function () {
        Route::resource('/staff', StaffController::class);
        Route::resource('/customer', CustomerController::class);
        Route::resource('/user', UserController::class);

        Route::resource('/permissions', PermissionController::class);

    });
});
