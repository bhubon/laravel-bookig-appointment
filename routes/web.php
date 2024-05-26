<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuthControlle;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Middleware\TokenVerificationMiddleware;

Route::get('/', function () {
    return view('welcome');
});

//Admin Routes
Route::group(['prefix' => 'admin'], function () {
    Route::post('/login', [AdminAuthControlle::class, 'admin_login'])->name('admin.login');

    //Admin Protected Routes with JWT

    Route::middleware([TokenVerificationMiddleware::class])->group(function () {
        Route::resource('/staff', StaticMethodFile::class);
        Route::resource('/customer', CustomerController::class);
    });
});