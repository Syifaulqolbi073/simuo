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
        Schema::create('question_media', function (Blueprint $table) {

            // Primary Key
            $table->ulid('id')->primary();

            // Soal
            $table->foreignUlid('question_id')
                ->constrained('questions')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            // Jenis Media
            $table->enum('media_type', [
                'IMAGE',
                'AUDIO',
                'VIDEO',
                'DOCUMENT',
            ]);

            // Nama File
            $table->string('file_name');

            // Lokasi File
            $table->string('file_path');

            // MIME Type
            $table->string('mime_type')
                ->nullable();

            // Ukuran File (Byte)
            $table->unsignedBigInteger('file_size')
                ->default(0);

            // Urutan
            $table->unsignedTinyInteger('sort_order')
                ->default(1);

            // Aktif
            $table->boolean('is_active')
                ->default(true);

            $table->timestamps();

            $table->softDeletes();

            $table->index('question_id');
            $table->index('media_type');
            $table->index('is_active');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('question_media');
    }
};