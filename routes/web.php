<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\Admin\AcademicYearController;
use App\Http\Controllers\Admin\SemesterController;
use App\Http\Controllers\Admin\GradeController;
use App\Http\Controllers\Admin\ClassroomController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\StudentClassroomController;
use App\Http\Controllers\Admin\HomeroomTeacherController;
use App\Http\Controllers\Admin\TeacherSubjectController;
use App\Http\Controllers\Admin\ExamTypeController;
use App\Http\Controllers\Admin\ExamScheduleController;
use App\Http\Controllers\Admin\QuestionBankController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\QuestionMediaController;

/*
|--------------------------------------------------------------------------
| Public
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Dashboard & Admin
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    Route::view('/dashboard', 'admin.dashboard.index')
        ->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | Master Akademik
    |--------------------------------------------------------------------------
    */

    Route::resource('academic-years', AcademicYearController::class);

    Route::patch(
        'academic-years/{academicYear}/activate',
        [AcademicYearController::class, 'activate']
    )->name('academic-years.activate');

    Route::resource('semesters', SemesterController::class);

    Route::patch(
        'semesters/{semester}/activate',
        [SemesterController::class, 'activate']
    )->name('semesters.activate');

    Route::resource('grades', GradeController::class);

    Route::patch(
        'grades/{grade}/activate',
        [GradeController::class, 'activate']
    )->name('grades.activate');

    Route::resource('classrooms', ClassroomController::class);

    Route::resource('subjects', SubjectController::class);
    
    

    /*
    |--------------------------------------------------------------------------
    | Master Pengguna
    |--------------------------------------------------------------------------
    */

    Route::resource('teachers', TeacherController::class);

    Route::resource('students', StudentController::class);

    /*
    |--------------------------------------------------------------------------
    | Relasi Akademik
    |--------------------------------------------------------------------------
    */

    Route::resource('student-classrooms', StudentClassroomController::class);

    Route::resource('homeroom-teachers', HomeroomTeacherController::class);
    
    Route::resource('teacher-subjects', TeacherSubjectController::class);
    
    Route::resource('exam-types', ExamTypeController::class);
    
    Route::resource(
    'exam-schedules',
    ExamScheduleController::class);
    
    Route::patch(
    'exam-schedules/{examSchedule}/publish',
    [ExamScheduleController::class, 'publish']
)->name('exam-schedules.publish');

Route::patch(
    'exam-schedules/{examSchedule}/generate-token',
    [ExamScheduleController::class, 'generateToken']
)->name('exam-schedules.generate-token');
Route::post(
    'exam-schedules/{examSchedule}/duplicate',
    [ExamScheduleController::class, 'duplicate']
)->name('exam-schedules.duplicate');


Route::resource(
    'question-banks',
    QuestionBankController::class
);

Route::resource(
    'question-banks.questions',
    QuestionController::class
);
Route::post(
    'question-banks/{question_bank}/questions/{question}/duplicate',
    [QuestionController::class, 'duplicate']
)->name('question-banks.questions.duplicate');
    
Route::resource(
    'question-banks.questions.media',
    QuestionMediaController::class
)->only([
    'index',
    'create',
    'store',
    'destroy',
]);
    
});

/*
|--------------------------------------------------------------------------
| Profile
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

require __DIR__.'/auth.php';