<?php

namespace Database\Seeders;

use App\Models\AcademicYear;
use App\Models\Classroom;
use App\Models\Semester;
use App\Models\Student;
use App\Models\StudentClassroom;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class StudentClassroomSeeder extends Seeder
{
    public function run(): void
    {
        $academicYear = AcademicYear::where('is_active', true)->first();

        $semester = Semester::where('academic_year_id', $academicYear->id)
            ->where('is_active', true)
            ->first();

        $classrooms = Classroom::orderBy('name')->get()->values();

        $students = Student::orderBy('name')->get()->values();

        $perClass = 10;

        foreach ($students as $index => $student) {

            $classroom = $classrooms[intdiv($index, $perClass)];

            StudentClassroom::create([
                'id' => (string) Str::ulid(),
                'student_id' => $student->id,
                'classroom_id' => $classroom->id,
                'academic_year_id' => $academicYear->id,
                'semester_id' => $semester->id,
                'is_active' => true,
            ]);
        }
    }
}