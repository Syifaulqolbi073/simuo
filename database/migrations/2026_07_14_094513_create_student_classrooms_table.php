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
        Schema::create('student_classrooms', function (Blueprint $table) {

            $table->ulid('id')->primary();

            $table->foreignUlid('student_id')
                ->constrained()
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreignUlid('classroom_id')
                ->constrained()
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreignUlid('academic_year_id')
                ->constrained()
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreignUlid('semester_id')
                ->constrained()
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->boolean('is_active')
                ->default(true);

            $table->timestamps();

            $table->softDeletes();

            $table->unique([
                'student_id',
                'academic_year_id',
                'semester_id',
            ], 'student_class_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_classrooms');
    }
};