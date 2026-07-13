<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('semesters', function (Blueprint $table) {

            $table->ulid('id')->primary();

            $table->foreignUlid('academic_year_id')
                  ->constrained('academic_years')
                  ->cascadeOnUpdate()
                  ->restrictOnDelete();

            $table->string('code', 10);

            $table->string('name', 20);

            $table->unsignedTinyInteger('order');

            $table->boolean('is_active')
                  ->default(false);

            $table->timestamps();

            $table->softDeletes();

            $table->unique([
                'academic_year_id',
                'order'
            ]);

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('semesters');
    }
};