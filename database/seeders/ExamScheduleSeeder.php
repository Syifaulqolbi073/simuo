<?php

namespace Database\Seeders;

use App\Models\ExamSchedule;
use App\Models\ExamType;
use App\Models\TeacherSubject;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ExamScheduleSeeder extends Seeder
{
    public function run(): void
    {
        $teacherSubjects = TeacherSubject::all();

        $examTypes = ExamType::all()->keyBy('code');

        foreach ($teacherSubjects as $teacherSubject) {

            ExamSchedule::create([

                'id' => (string) Str::ulid(),

                'teacher_subject_id' => $teacherSubject->id,

                'exam_type_id' => $examTypes['UH']->id,

                'title' => 'UH 1 - ' .
                    $teacherSubject->subject->name .
                    ' ' .
                    $teacherSubject->classroom->name,

                'description' => 'Ulangan Harian 1',

                'exam_date' => now()->addDays(7)->toDateString(),

                'start_time' => '08:00',

                'duration' => 90,

                'token' => random_int(100000,999999),

                'token_required' => true,

                'shuffle_question' => true,

                'shuffle_option' => true,

                'show_score' => false,

                'show_answer' => false,

                'fullscreen_mode' => false,

                'one_device_only' => true,

                'auto_submit' => true,

                'allow_retry' => false,

                'max_attempt' => 1,

                'show_timer' => true,

                'late_tolerance' => 10,

                'is_published' => true,

                'status' => 'Terjadwal',

                'is_active' => true,

            ]);

        }
    }
}