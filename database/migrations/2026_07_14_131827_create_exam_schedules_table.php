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
        Schema::create('exam_schedules', function (Blueprint $table) {

            /*
            |--------------------------------------------------------------------------
            | Primary Key
            |--------------------------------------------------------------------------
            */
            $table->ulid('id')->primary();

            /*
            |--------------------------------------------------------------------------
            | Relasi
            |--------------------------------------------------------------------------
            */

            // Guru + Mapel + Kelas + Tahun Pelajaran + Semester
            $table->foreignUlid('teacher_subject_id')
                ->constrained('teacher_subjects')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            // Jenis Ujian
            $table->foreignUlid('exam_type_id')
                ->constrained('exam_types')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            /*
            |--------------------------------------------------------------------------
            | Informasi Ujian
            |--------------------------------------------------------------------------
            */

            $table->string('title', 150);

            $table->text('description')
                ->nullable();

            /*
            |--------------------------------------------------------------------------
            | Jadwal
            |--------------------------------------------------------------------------
            */

            $table->date('exam_date');

            $table->time('start_time');

            // Durasi dalam menit
            $table->unsignedSmallInteger('duration');

            /*
            |--------------------------------------------------------------------------
            | Token
            |--------------------------------------------------------------------------
            */

            $table->string('token', 10)
                ->nullable();

            $table->boolean('token_required')
                ->default(true);

            /*
            |--------------------------------------------------------------------------
            | Pengaturan Soal
            |--------------------------------------------------------------------------
            */

            // Acak urutan soal
            $table->boolean('shuffle_question')
                ->default(true);

            // Acak pilihan jawaban
            $table->boolean('shuffle_option')
                ->default(true);

            /*
            |--------------------------------------------------------------------------
            | Pengaturan Hasil
            |--------------------------------------------------------------------------
            */

            // Tampilkan nilai setelah ujian
            $table->boolean('show_score')
                ->default(false);

            // Tampilkan kunci jawaban
            $table->boolean('show_answer')
                ->default(false);

            /*
            |--------------------------------------------------------------------------
            | Pengaturan CBT
            |--------------------------------------------------------------------------
            */

            // Wajib fullscreen (Desktop/PWA)
            $table->boolean('fullscreen_mode')
                ->default(false);

            // Hanya satu perangkat
            $table->boolean('one_device_only')
                ->default(true);

            // Otomatis submit saat waktu habis
            $table->boolean('auto_submit')
                ->default(true);

            // Boleh mengulang ujian
            $table->boolean('allow_retry')
                ->default(false);

            // Maksimal percobaan
            $table->unsignedTinyInteger('max_attempt')
                ->default(1);

            // Tampilkan hitung mundur
            $table->boolean('show_timer')
                ->default(true);

            /*
            |--------------------------------------------------------------------------
            | Pengaturan Lain
            |--------------------------------------------------------------------------
            */

            // Toleransi keterlambatan (menit)
            $table->unsignedTinyInteger('late_tolerance')
                ->default(0);

            // Ditampilkan kepada siswa
            $table->boolean('is_published')
                ->default(false);

            // Status ujian
            $table->enum('status', [
                'Draft',
                'Terjadwal',
                'Berlangsung',
                'Selesai',
                'Ditutup',
            ])->default('Draft');

            $table->boolean('is_active')
                ->default(true);

            /*
            |--------------------------------------------------------------------------
            | Timestamp
            |--------------------------------------------------------------------------
            */

            $table->timestamps();

            $table->softDeletes();

            /*
            |--------------------------------------------------------------------------
            | Index
            |--------------------------------------------------------------------------
            */

            $table->index('exam_date');
            $table->index('status');
            $table->index('teacher_subject_id');
            $table->index('exam_type_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exam_schedules');
    }
};