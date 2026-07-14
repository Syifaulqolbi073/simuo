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
        Schema::create('teacher_subjects', function (Blueprint $table) {

            $table->ulid('id')->primary();

            $table->foreignUlid('teacher_id')
                ->constrained('teachers')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreignUlid('subject_id')
                ->constrained('subjects')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreignUlid('classroom_id')
                ->constrained('classrooms')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreignUlid('academic_year_id')
                ->constrained('academic_years')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreignUlid('semester_id')
                ->constrained('semesters')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->boolean('is_active')
                ->default(true);

            $table->timestamps();

            $table->softDeletes();

            // Satu mapel pada satu kelas hanya boleh diajar satu guru
            $table->unique([
                'subject_id',
                'classroom_id',
                'academic_year_id',
                'semester_id',
            ], 'unique_subject_class');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teacher_subjects');
    }
};