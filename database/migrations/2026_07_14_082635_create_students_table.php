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
        Schema::create('students', function (Blueprint $table) {

            $table->ulid('id')->primary();

            $table->string('nis', 30)
                  ->nullable();

            $table->string('nisn', 20)
                  ->nullable();

            $table->string('name', 100);

            $table->enum('gender', [
                'L',
                'P',
            ]);

            $table->string('birth_place', 100)
                  ->nullable();

            $table->date('birth_date')
                  ->nullable();

            $table->text('address')
                  ->nullable();

            $table->string('phone', 20)
                  ->nullable();

            $table->string('parent_name', 100)
                  ->nullable();

            $table->string('photo')
                  ->nullable();

            $table->boolean('is_active')
                  ->default(true);

            $table->timestamps();

            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};