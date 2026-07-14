<?php

namespace Database\Seeders;

use App\Models\AcademicYear;
use App\Models\Classroom;
use App\Models\HomeroomTeacher;
use App\Models\Semester;
use App\Models\Teacher;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class HomeroomTeacherSeeder extends Seeder
{
    public function run(): void
    {
        $academicYear = AcademicYear::where('is_active', true)->first();

        $semester = Semester::where('academic_year_id', $academicYear->id)
            ->where('is_active', true)
            ->first();

        $teachers = Teacher::orderBy('name')->take(6)->get();

        $classrooms = Classroom::orderBy('name')->get();

        foreach ($classrooms as $index => $classroom) {

            HomeroomTeacher::create([

                'id' => (string) Str::ulid(),

                'teacher_id' => $teachers[$index]->id,

                'classroom_id' => $classroom->id,

                'academic_year_id' => $academicYear->id,

                'semester_id' => $semester->id,

                'is_active' => true,

            ]);

        }
    }
}