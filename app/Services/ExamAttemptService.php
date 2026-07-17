<?php

namespace App\Services;

use App\Models\ExamAttempt;
use App\Models\ExamSchedule;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class ExamAttemptService
{
    /**
     * Membuat attempt baru.
     */
    public function create(
        ExamSchedule $examSchedule,
        Student $student
    ): ExamAttempt {

        return DB::transaction(function () use (
            $examSchedule,
            $student
        ) {

            // Cek apakah sudah pernah memiliki attempt
            $attempt = ExamAttempt::where(
                    'exam_schedule_id',
                    $examSchedule->id
                )
                ->where(
                    'student_id',
                    $student->id
                )
                ->first();

            if ($attempt) {

                return $attempt;

            }

            // Ambil paket pertama
            $package = $examSchedule
                ->packages()
                ->where('is_active', true)
                ->first();

            if (! $package) {

                throw new \Exception(
                    'Paket ujian belum tersedia.'
                );

            }

            // Buat attempt
            $attempt = ExamAttempt::create([

                'exam_schedule_id' => $examSchedule->id,

                'exam_package_id' => $package->id,

                'student_id' => $student->id,

                'token' => $examSchedule->token,

                'started_at' => now(),

                'status' => 'Started',

                'ip_address' => request()->ip(),

                'user_agent' => request()->userAgent(),

            ]);
            
            foreach ($package->questions as $packageQuestion) {

    $attempt->answers()->create([

        'exam_package_question_id' => $packageQuestion->id,

        'question_id' => $packageQuestion->question_id,

        'answer' => null,

        'essay_answer' => null,

        'is_correct' => null,

        'score' => 0,

        'is_doubt' => false,

        'answered_at' => null,

    ]);

}

            return $attempt;

        });

    }
}