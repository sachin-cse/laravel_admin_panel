<?php

use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\Dashboard\DashboardController;
use Illuminate\Support\Facades\Route;

Route::prefix('manage')->name('admin.')->group(function () {
    Route::controller(AuthController::class)->group(function(){
        Route::match(['get', 'post'], 'login', 'login')->name('auth.login')->middleware('admin.guest');
        Route::post('logout', 'logout')->name('auth.logout');
    });
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('admin.auth');
    Route::view('users', 'admin.users')->name('users');
    Route::view('pages', 'admin.pages')->name('pages');
});
