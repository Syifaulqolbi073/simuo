<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Student\DashboardController;
use App\Http\Controllers\Student\ExamAuthController;
use App\Http\Controllers\Student\ExamController;
use App\Http\Controllers\Student\ExamQuestionController;
use App\Http\Controllers\Student\ExamAnswerController;

/*
|--------------------------------------------------------------------------
| Student CBT
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])
    ->prefix('student')
    ->name('student.')
    ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | Dashboard
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/',
            [DashboardController::class, 'index']
        )->name('dashboard');

        /*
        |--------------------------------------------------------------------------
        | Authentication Ujian
        |--------------------------------------------------------------------------
        */

        Route::get(
            'exams/{examSchedule}/token',
            [ExamAuthController::class, 'index']
        )->name('exams.token');

        Route::post(
            'exams/{examSchedule}/start',
            [ExamAuthController::class, 'start']
        )->name('exams.start');
        
        Route::get(
    'attempts/{attempt}',
    [ExamController::class, 'show']
)->name('exams.show');

Route::get(
    'attempts/{attempt}/questions/{number}',
    [ExamQuestionController::class, 'show']
)->name('exams.questions.show');

Route::post(
    'attempts/{attempt}/answers/{answer}',
    [ExamAnswerController::class, 'store']
)->name('exams.answers.store');



    });