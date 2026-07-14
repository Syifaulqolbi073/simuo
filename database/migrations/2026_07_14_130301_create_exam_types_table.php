<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('exam_types', function (Blueprint $table) {

            $table->ulid('id')->primary();

            $table->string('code',20)->unique();

            $table->string('name',100);

            $table->enum('category',[
                'Harian',
                'Semester',
                'Tahunan',
                'Latihan',
                'Praktik',
                'Tahfidz',
                'Lainnya',
            ]);

            $table->text('description')->nullable();

            $table->boolean('is_active')
                ->default(true);

            $table->timestamps();

            $table->softDeletes();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('exam_types');
    }
};