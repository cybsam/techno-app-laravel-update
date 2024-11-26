<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Http\Controllers\User\DashboardController;

// 'preventbackhistory',
Route::prefix('en/User')->middleware(['auth:web','preventbackhistory','isUser','isVerifyEmail'])->group(function() {
    Route::get('Dashboard',[App\Http\Controllers\User\DashboardController::class, 'index'])->name('basicUser.dashboard');
    Route::post('contact/s',[App\Http\Controllers\User\DashboardController::class, 'contactStore'])->name('users.ContactStore');
    Route::get('Dashboard/blog/post',[App\Http\Controllers\User\DashboardController::class, 'blogMethod'])->name('users.blogPost');
});