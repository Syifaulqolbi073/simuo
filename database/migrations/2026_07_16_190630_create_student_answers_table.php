<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('student_answers', function (Blueprint $table) {

            // Primary Key
            $table->ulid('id')->primary();

            // Attempt
            $table->foreignUlid('exam_attempt_id')
                ->constrained('exam_attempts')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            // Paket
            $table->foreignUlid('exam_package_question_id')
                ->constrained('exam_package_questions')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            // Soal
            $table->foreignUlid('question_id')
                ->constrained('questions')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            // Jawaban siswa
            $table->string('answer', 10)
                ->nullable();

            // Essay
            $table->longText('essay_answer')
                ->nullable();

            // Benar / Salah
            $table->boolean('is_correct')
                ->nullable();

            // Nilai
            $table->decimal('score', 6, 2)
                ->default(0);

            // Ragu-ragu
            $table->boolean('is_doubt')
                ->default(false);

            // Waktu menjawab
            $table->timestamp('answered_at')
                ->nullable();

            $table->timestamps();

            $table->softDeletes();

            // Index
            $table->index('exam_attempt_id');
            $table->index('question_id');
            $table->index('is_correct');

            // Satu jawaban untuk satu soal
            $table->unique(
                [
                    'exam_attempt_id',
                    'exam_package_question_id',
                ],
                'student_answer_unique'
            );

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_answers');
    }
};