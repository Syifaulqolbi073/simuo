<?php

namespace Database\Seeders;

use App\Models\AcademicYear;
use App\Models\Semester;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SemesterSeeder extends Seeder
{
    public function run(): void
    {
        $academicYears = AcademicYear::all();

        foreach ($academicYears as $academicYear) {

            Semester::create([
                'id' => (string) Str::ulid(),
                'academic_year_id' => $academicYear->id,
                'code' => 'GANJIL',
                'name' => 'Ganjil',
                'order' => 1,
                'is_active' => $academicYear->is_active,
            ]);

            Semester::create([
                'id' => (string) Str::ulid(),
                'academic_year_id' => $academicYear->id,
                'code' => 'GENAP',
                'name' => 'Genap',
                'order' => 2,
                'is_active' => false,
            ]);
        }
    }
}