<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\ExamAttempt;
use Illuminate\View\View;

class ExamController extends Controller
{
    /**
     * CBT Player
     */
    
public function show(
    ExamAttempt $attempt
): View {

    $attempt->load([

        'examSchedule',

        'examPackage',

        'answers.packageQuestion.question.options',

        'answers.packageQuestion.question.media',

    ]);

    $current = request()->integer('q', 1);

    $answers = $attempt->answers;

    if ($current < 1) {
        $current = 1;
    }

    if ($current > $answers->count()) {
        $current = $answers->count();
    }

    $answer = $answers[$current - 1];

    return view(
        'student.exams.show',
        compact(
            'attempt',
            'answers',
            'answer',
            'current'
        )
    );
}
}