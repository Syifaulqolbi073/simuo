<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\QuestionBank;
use Illuminate\Http\Request;
use Illuminate\View\View;

class QuestionController extends Controller
{
    /**
     * Daftar Soal
     */
    public function index(
        QuestionBank $questionBank
    ): View {

        $questions = $questionBank
            ->questions()
            ->latest()
            ->paginate(20);

        return view(
            'admin.question-banks.questions.index',
            compact(
                'questionBank',
                'questions'
            )
        );
    }

    /**
     * Form Tambah
     */
    public function create(
        QuestionBank $questionBank
    ): View {

        return view(
            'admin.question-banks.questions.create',
            compact('questionBank')
        );
    }

    /**
     * Form Edit
     */
    public function edit(
        QuestionBank $questionBank,
        Question $question
    ): View {

        return view(
            'admin.question-banks.questions.edit',
            compact(
                'questionBank',
                'question'
            )
        );
    }
}