<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            AcademicYearSeeder::class,
            SemesterSeeder::class,
            GradeSeeder::class,
            ClassroomSeeder::class,
            SubjectSeeder::class,
            TeacherSeeder::class,
            StudentSeeder::class,
            StudentClassroomSeeder::class,
            HomeroomTeacherSeeder::class,
            TeacherSubjectSeeder::class,
            ExamTypeSeeder::class,
            ExamScheduleSeeder::class,
        ]);
    }
}