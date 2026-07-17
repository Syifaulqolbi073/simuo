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
        Schema::table('exam_schedules', function (Blueprint $table) {

            $table->foreignUlid('question_bank_id')
                ->nullable()
                ->after('exam_type_id')
                ->constrained('question_banks')
                ->cascadeOnUpdate()
                ->nullOnDelete();

            $table->index('question_bank_id');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('exam_schedules', function (Blueprint $table) {

            $table->dropForeign(['question_bank_id']);

            $table->dropColumn('question_bank_id');

        });
    }
};