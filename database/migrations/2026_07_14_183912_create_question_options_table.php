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
        Schema::create('question_options', function (Blueprint $table) {

            // Primary Key
            $table->ulid('id')->primary();

            // Soal
            $table->foreignUlid('question_id')
                ->constrained('questions')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            // A, B, C, D, E
            $table->string('option_key', 5);

            // Isi Pilihan
            $table->longText('option_text');

            // Kunci Jawaban
            $table->boolean('is_correct')
                ->default(false);

            // Urutan
            $table->unsignedTinyInteger('sort_order')
                ->default(1);

            // Aktif
            $table->boolean('is_active')
                ->default(true);

            $table->timestamps();

            $table->softDeletes();

            $table->index('question_id');
            $table->index('option_key');
            $table->index('is_correct');
            $table->index('is_active');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('question_options');
    }
};