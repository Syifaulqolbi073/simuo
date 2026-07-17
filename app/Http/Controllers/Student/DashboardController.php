<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\ExamSchedule;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Dashboard Siswa
     */
    public function index(): View
    {
        $examSchedules = ExamSchedule::with([
                'examType',
                'teacherSubject.subject',
                'teacherSubject.teacher',
                'teacherSubject.classroom',
            ])
            ->where('is_active', true)
            ->where('is_published', true)
            ->orderBy('exam_date')
            ->get();

        return view(
            'student.dashboard.index',
            compact('examSchedules')
        );
    }
}