<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\Admin\OverviewController;

    
Route::prefix('admin')->middleware(['auth', 'verified'])->group(function() {
    
    Route::get('', [OverviewController::class, 'index'])->name('admin.dashboard');

});
    