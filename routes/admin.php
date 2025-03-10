<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\Admin\UserController;
use App\Http\Controllers\Dashboard\Admin\OverviewController;

    
Route::prefix('admin')->middleware(['auth', 'verified'])->group(function() {
    
    Route::get('/', [OverviewController::class, 'index'])->name('admin.dashboard');
    Route::get('/users', [UserController::class, 'index'])->name('admin.dashboard.users');

});
    