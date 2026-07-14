<?php

namespace Database\Seeders;

use App\Models\ExamType;
use App\Models\QuestionBank;
use App\Models\TeacherSubject;
use Illuminate\Database\Seeder;

class QuestionBankSeeder extends Seeder
{
    public function run(): void
    {
        $teacherSubjects = TeacherSubject::all();

        $examType = ExamType::where('code', 'UH')->first();

        foreach ($teacherSubjects as $teacherSubject) {

            QuestionBank::create([

                'teacher_subject_id' => $teacherSubject->id,

                'exam_type_id' => $examType->id,

                'title' => 'Bank Soal UH - '
                    . $teacherSubject->subject->name
                    . ' '
                    . $teacherSubject->classroom->name,

                'description' => 'Bank soal otomatis',

                'total_question' => 0,

                'total_score' => 0,

                'is_active' => true,

            ]);

        }
    }
}