<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\Admin\UserController;
use App\Http\Controllers\Dashboard\Admin\ClassController;
use App\Http\Controllers\Dashboard\Admin\StudentController;
use App\Http\Controllers\Dashboard\Admin\OverviewController;

Route::prefix('admin')->middleware(['auth', 'verified'])->group(function() {
    
    Route::get('/', [OverviewController::class, 'index'])->name('admin.dashboard');
    
    Route::get('/users', [UserController::class, 'index'])->name('admin.dashboard.users');

    Route::get('users/create', [UserController::class, 'create'])->name('admin.dashboard.users.create');

    Route::get('users/edit/{id}', [UserController::class, 'edit'])->name('admin.dashboard.users.edit');
    
    Route::get('users/show/{id}', [UserController::class, 'show'])->name('admin.dashboard.users.show');

    Route::get('/students', [StudentController::class, 'index'])->name('admin.dashboard.students');

    Route::get('/students/create', [StudentController::class, 'create'])->name('admin.dashboard.students.create');

    Route::get('/students/edit/{id}', [StudentController::class, 'edit'])->name('admin.dashboard.students.edit');

    Route::get('/students/view/{id}', [StudentController::class, 'show'])->name('admin.dashboard.students.show');

    Route::get('/classes', [ClassController::class, 'index'])->name('admin.dashboard.classes');

    Route::get('classes/edit/{id}', [ClassController::class, 'edit'])->name('admin.dashboard.classes.edit');

    Route::get('classes/student/{id}', [ClassController::class, 'student'])->name('admin.dashboard.classes.student');



});
    