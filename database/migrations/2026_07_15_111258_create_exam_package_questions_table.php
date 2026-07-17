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
        Schema::create('exam_package_questions', function (Blueprint $table) {

            // Primary Key
            $table->ulid('id')->primary();

            // Paket
            $table->foreignUlid('exam_package_id')
                ->constrained('exam_packages')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            // Soal
            $table->foreignUlid('question_id')
                ->constrained('questions')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            // Nomor Soal
            $table->unsignedSmallInteger('question_order');

            // Urutan Jawaban (JSON)
            $table->json('option_order')
                ->nullable();

            $table->timestamps();

            $table->softDeletes();

            $table->index('exam_package_id');
            $table->index('question_id');
            $table->index('question_order');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exam_package_questions');
    }
};