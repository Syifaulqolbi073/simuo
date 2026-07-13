<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('classrooms', function (Blueprint $table) {

            $table->ulid('id')->primary();

            $table->foreignUlid('grade_id')
                  ->constrained('grades')
                  ->cascadeOnUpdate()
                  ->restrictOnDelete();

            $table->string('code', 20)->unique();

            $table->string('name', 100);

            $table->unsignedTinyInteger('capacity')
                  ->default(32);

            $table->boolean('is_active')
                  ->default(true);

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('classrooms');
    }
};