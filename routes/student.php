<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\Student\OverviewController;

Route::prefix('dashboard')->middleware(['auth', 'verified', 'role:student'])->group(function() {
    Route::get('', [OverviewController::class, 'index'])->name('student.dashboard');
});
