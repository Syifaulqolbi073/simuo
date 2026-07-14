<?php

namespace Database\Seeders;

use App\Models\AcademicYear;
use App\Models\Classroom;
use App\Models\Semester;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\TeacherSubject;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TeacherSubjectSeeder extends Seeder
{
    public function run(): void
    {
        $academicYear = AcademicYear::where('is_active', true)->first();

        $semester = Semester::where('academic_year_id', $academicYear->id)
            ->where('is_active', true)
            ->first();

        $teachers = Teacher::orderBy('name')->get();
        $subjects = Subject::orderBy('name')->get();
        $classrooms = Classroom::orderBy('name')->get();

        $teacherIndex = 0;

        foreach ($classrooms as $classroom) {

            foreach ($subjects as $subject) {

                TeacherSubject::create([

                    'id' => (string) Str::ulid(),

                    'teacher_id' => $teachers[$teacherIndex % $teachers->count()]->id,

                    'subject_id' => $subject->id,

                    'classroom_id' => $classroom->id,

                    'academic_year_id' => $academicYear->id,

                    'semester_id' => $semester->id,

                    'is_active' => true,

                ]);

                $teacherIndex++;

            }
        }
    }
}