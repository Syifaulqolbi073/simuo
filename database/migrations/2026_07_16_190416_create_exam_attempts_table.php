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
        Schema::create('exam_attempts', function (Blueprint $table) {

            // Primary Key
            $table->ulid('id')->primary();

            // Jadwal Ujian
            $table->foreignUlid('exam_schedule_id')
                ->constrained('exam_schedules')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            // Paket Ujian
            $table->foreignUlid('exam_package_id')
                ->constrained('exam_packages')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            // Siswa
            $table->foreignUlid('student_id')
                ->constrained('students')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            // Token yang digunakan
            $table->string('token', 10)->nullable();

            // Waktu
            $table->timestamp('started_at')->nullable();
            $table->timestamp('finished_at')->nullable();
            $table->timestamp('submitted_at')->nullable();

            // Durasi (detik)
            $table->unsignedInteger('duration_used')->default(0);

            // Nilai
            $table->decimal('score', 6, 2)->default(0);

            // Status
            $table->enum('status', [
                'Waiting',
                'Started',
                'Submitted',
                'Finished',
                'Expired',
                'Cancelled',
            ])->default('Waiting');

            // Informasi Perangkat
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();

            // Keamanan
            $table->boolean('is_locked')->default(false);

            $table->timestamps();
            $table->softDeletes();

            // Index
            $table->index('exam_schedule_id');
            $table->index('exam_package_id');
            $table->index('student_id');
            $table->index('status');

            // Satu siswa hanya satu attempt per jadwal
            $table->unique([
                'exam_schedule_id',
                'student_id',
            ], 'exam_attempt_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exam_attempts');
    }
};