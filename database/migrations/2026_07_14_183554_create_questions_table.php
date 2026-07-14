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
        Schema::create('questions', function (Blueprint $table) {

            // Primary Key
            $table->ulid('id')->primary();

            // Bank Soal
            $table->foreignUlid('question_bank_id')
                ->constrained('question_banks')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            // Jenis Soal
            $table->enum('question_type', [
                'MCQ',
                'ESSAY',
                'TRUE_FALSE',
                'MATCHING',
                'SHORT_ANSWER',
            ])->default('MCQ');

            // Isi Soal
            $table->longText('question_text');

            // Pembahasan
            $table->longText('discussion')
                ->nullable();

            // Bobot Nilai
            $table->unsignedSmallInteger('score')
                ->default(1);

            // Tingkat Kesulitan
            $table->enum('difficulty', [
                'Mudah',
                'Sedang',
                'Sulit',
            ])->default('Sedang');

            // Urutan Soal
            $table->unsignedSmallInteger('sort_order')
                ->default(1);

            // Status
            $table->boolean('is_active')
                ->default(true);

            $table->timestamps();

            $table->softDeletes();

            // Index
            $table->index('question_bank_id');
            $table->index('question_type');
            $table->index('difficulty');
            $table->index('is_active');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};