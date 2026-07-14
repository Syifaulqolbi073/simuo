<?php

namespace Database\Seeders;

use App\Models\AcademicYear;
use Illuminate\Database\Seeder;

class AcademicYearSeeder extends Seeder
{
    public function run(): void
    {
        AcademicYear::insert([

            [
                'id' => (string) \Illuminate\Support\Str::ulid(),
                'code' => '2025',
                'name' => '2025/2026',
                'start_date' => '2025-07-01',
                'end_date' => '2026-06-30',
                'is_active' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => (string) \Illuminate\Support\Str::ulid(),
                'code' => '2026',
                'name' => '2026/2027',
                'start_date' => '2026-07-01',
                'end_date' => '2027-06-30',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}