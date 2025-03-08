<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\Student\OverviewController;

Route::prefix('dashboard')->middleware(['auth', 'verified'])->group(function() {
    Route::get('', [OverviewController::class])->name('student.dashboard');
});
