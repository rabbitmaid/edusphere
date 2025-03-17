<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\Admin\MarkController;
use App\Http\Controllers\Dashboard\Admin\UserController;
use App\Http\Controllers\Dashboard\Admin\ClassController;
use App\Http\Controllers\Dashboard\Admin\StudentController;
use App\Http\Controllers\Dashboard\Admin\SubjectController;
use App\Http\Controllers\Dashboard\Admin\OverviewController;

Route::prefix('admin')->middleware(['auth', 'verified', 'role:administrator'])->group(function() {
    
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

    Route::get('classes/student/list/{id}', [ClassController::class, 'list'])->name('admin.dashboard.classes.list');

    Route::get('/subjects', [SubjectController::class, 'index'])->name('admin.dashboard.subjects');
    Route::get('/subjects/create', [SubjectController::class, 'create'])->name('admin.dashboard.subjects.create');
    Route::get('/subjects/edit/{id}', [SubjectController::class, 'edit'])->name('admin.dashboard.subjects.edit');

    Route::get('/marks', [MarkController::class, 'index'])->name('admin.dashboard.marks');
    Route::get('/marks/sequences/{class}', [MarkController::class, 'sequence'])->name('admin.dashboard.marks.sequences');

    Route::get('/marks/sequences/subjects/{sequence}/{class}', [MarkController::class, 'subject'])->name('admin.dashboard.marks.sequences.subjects');

    Route::get('/marks/sequence/fill/{sequence}/{class}/{subject}', [MarkController::class, 'fill'])->name('admin.dashboard.marks.sequence.fill');

    Route::post('/marks/sequence/fill/store', [MarkController::class, 'storeMark'])->name('admin.dashboard.marks.sequence.fill.store');

});
    