<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\ExamAttempt;
use Illuminate\Http\JsonResponse;

class ExamQuestionController extends Controller
{
    public function show(
        ExamAttempt $attempt,
        int $number
    ): JsonResponse {

        $attempt->load([
            'answers.packageQuestion.question.options',
            'answers.packageQuestion.question.media',
        ]);

        $answers = $attempt->answers->values();

        abort_if(
            $number < 1 || $number > $answers->count(),
            404
        );

        $answer = $answers[$number - 1];

        return response()->json([
            'number' => $number,
            'total' => $answers->count(),
            'answer' => $answer,
        ]);
    }
}