<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AcademicYearController;
use App\Http\Controllers\Admin\SemesterController;
use App\Http\Controllers\Admin\GradeController;

Route::middleware(['auth'])->group(function () {

    Route::view('/dashboard', 'admin.dashboard.index')
        ->name('dashboard');

    Route::resource('academic-years', AcademicYearController::class);
    Route::patch(
    'academic-years/{academicYear}/activate',
    [AcademicYearController::class, 'activate']
)->name('academic-years.activate');
Route::resource('semesters', \App\Http\Controllers\Admin\SemesterController::class);
Route::patch(
    'semesters/{semester}/activate',
    [SemesterController::class, 'activate']
)->name('semesters.activate');

Route::resource('grades', GradeController::class);

Route::patch(
    'grades/{grade}/activate',
    [GradeController::class, 'activate']
)->name('grades.activate');

});

Route::middleware(['auth'])->group(function () {

    Route::view('/dashboard', 'admin.dashboard.index')
        ->name('dashboard');

});
Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
