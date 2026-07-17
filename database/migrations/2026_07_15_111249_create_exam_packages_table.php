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
        Schema::create('exam_packages', function (Blueprint $table) {

            // Primary Key
            $table->ulid('id')->primary();

            // Jadwal Ujian
            $table->foreignUlid('exam_schedule_id')
                ->constrained('exam_schedules')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            // Kode Paket
            $table->string('package_code', 10);

            // Nama Paket
            $table->string('package_name');

            // Statistik
            $table->unsignedSmallInteger('total_question')
                ->default(0);

            $table->unsignedSmallInteger('total_score')
                ->default(0);

            // Pengaturan Acak
            $table->boolean('is_random_question')
                ->default(true);

            $table->boolean('is_random_option')
                ->default(true);

            // Status
            $table->boolean('is_active')
                ->default(true);

            $table->timestamps();

            $table->softDeletes();

            $table->index('exam_schedule_id');
            $table->index('package_code');
            $table->index('is_active');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exam_packages');
    }
};