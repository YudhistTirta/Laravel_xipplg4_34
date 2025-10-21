<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaandingController;
use App\Http\Controllers\Admin\DashboardController;

Route::get('/', [LaandingController::class, 'index'])->name('landing');

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
});