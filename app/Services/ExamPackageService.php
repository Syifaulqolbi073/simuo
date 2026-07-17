<?php

namespace App\Services;

use App\Models\ExamPackage;
use App\Models\ExamPackageQuestion;
use App\Models\ExamSchedule;
use Illuminate\Support\Facades\DB;

class ExamPackageService
{
    /**
     * Generate Paket Ujian
     */
    public function generate(
        ExamSchedule $examSchedule
    ): ExamPackage {

        return DB::transaction(function () use ($examSchedule) {

            // Ambil Bank Soal
            $questionBank = $examSchedule->questionBank;

            if (! $questionBank) {
                throw new \Exception('Bank soal belum dipilih.');
            }

            // Ambil seluruh soal aktif
            $questions = $questionBank
                ->questions()
                ->where('is_active', true)
                ->get();
                if ($questions->isEmpty()) {

    throw new \Exception(
        'Bank soal belum memiliki soal aktif.'
    );

}

if ($questions->count() < 5) {

    throw new \Exception(
        'Minimal terdapat 5 soal aktif pada bank soal.'
    );

}

            // Acak soal jika diaktifkan
            if ($examSchedule->shuffle_question) {
                $questions = $questions->shuffle();
            }

            // Hapus paket lama
            $examSchedule->packages()->delete();

            // Buat Paket A
            $package = $examSchedule->packages()->create([

                'package_code' => 'A',

                'package_name' => 'Paket A',

                'total_question' => $questions->count(),

                'total_score' => $questions->sum('score'),

                'is_random_question' => $examSchedule->shuffle_question,

                'is_random_option' => $examSchedule->shuffle_option,

                'is_active' => true,

            ]);

            foreach ($questions->values() as $index => $question) {

                $options = $question
                    ->options()
                    ->pluck('option_key')
                    ->toArray();

                if ($examSchedule->shuffle_option) {
                    shuffle($options);
                }

                ExamPackageQuestion::create([

                    'exam_package_id' => $package->id,

                    'question_id' => $question->id,

                    'question_order' => $index + 1,

                    'option_order' => $options,

                ]);

            }

            return $package;

        });

    }
}