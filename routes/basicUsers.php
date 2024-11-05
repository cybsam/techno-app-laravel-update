<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Http\Controllers\User\DashboardController;

Route::prefix('en/User')->middleware(['auth:web','isUser','preventbackhistory','isVerifyEmail'])->group(function() {
    Route::get('Dashboard',[App\Http\Controllers\User\DashboardController::class, 'index'])->name('basicUser.dashboard');
    Route::post('contact/s',[App\Http\Controllers\User\DashboardController::class, 'contactStore'])->name('users.ContactStore');
});