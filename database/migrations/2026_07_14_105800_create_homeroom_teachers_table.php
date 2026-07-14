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
        Schema::create('homeroom_teachers', function (Blueprint $table) {

            $table->ulid('id')->primary();

            $table->foreignUlid('teacher_id')
                ->constrained('teachers')
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

            // Satu kelas hanya boleh memiliki satu wali
            $table->unique([
                'classroom_id',
                'academic_year_id',
                'semester_id',
            ], 'unique_classroom_homeroom');

            // Satu guru hanya boleh menjadi wali satu kelas
            $table->unique([
                'teacher_id',
                'academic_year_id',
                'semester_id',
            ], 'unique_teacher_homeroom');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homeroom_teachers');
    }
};