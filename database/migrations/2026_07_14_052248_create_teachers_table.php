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
        Schema::create('teachers', function (Blueprint $table) {

            $table->ulid('id')->primary();

            $table->string('nip', 30)
                  ->nullable();

            $table->string('name', 100);
            
            $table->string('title', 30)
      ->nullable();

            $table->enum('gender', [
                'L',
                'P',
            ]);

            $table->string('email', 100)
                  ->nullable();

            $table->string('phone', 20)
                  ->nullable();

            $table->text('address')
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
        Schema::dropIfExists('teachers');
    }
};