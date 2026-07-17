<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\ExamSchedule;
use App\Models\Student;
use App\Services\ExamAttemptService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ExamAuthController extends Controller
{
    /**
     * Form Token Ujian
     */
    public function index(
        ExamSchedule $examSchedule
    ): View {

        return view(
            'student.exams.token',
            compact('examSchedule')
        );

    }

    /**
     * Mulai Ujian
     */
    public function start(
        Request $request,
        ExamSchedule $examSchedule,
        ExamAttemptService $service
    ): RedirectResponse {

        $request->validate([

            'token' => [
                'required',
                'string',
            ],

        ]);

        if (
            $examSchedule->token_required &&
            $request->token !== $examSchedule->token
        ) {

            return back()->withErrors([

                'token' => 'Token ujian tidak valid.',

            ]);

        }

        /**
         * Sementara
         *
         * Nanti kita ganti dengan
         * auth()->user()->student
         */
        $student = Student::first();

        $attempt = $service->create(
            $examSchedule,
            $student
        );

        return redirect()->route(
            'student.exams.show',
            $attempt
        );

    }
}