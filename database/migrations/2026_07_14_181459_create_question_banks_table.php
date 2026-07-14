<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('question_banks', function (Blueprint $table) {

            // Primary Key
            $table->ulid('id')->primary();

            // Guru Mengajar
            $table->foreignUlid('teacher_subject_id')
                ->constrained('teacher_subjects')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            // Jenis Ujian
            $table->foreignUlid('exam_type_id')
                ->constrained('exam_types')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            // Nama Bank Soal
            $table->string('title', 150);

            // Deskripsi
            $table->text('description')
                ->nullable();

            // Cache
            $table->unsignedSmallInteger('total_question')
                ->default(0);

            $table->unsignedSmallInteger('total_score')
                ->default(0);

            // Status
            $table->boolean('is_active')
                ->default(true);

            $table->timestamps();

            $table->softDeletes();

            $table->index('teacher_subject_id');
            $table->index('exam_type_id');
            $table->index('is_active');

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('question_banks');
    }
};