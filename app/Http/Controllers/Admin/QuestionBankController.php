<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\QuestionBankStoreRequest;
use App\Http\Requests\Admin\QuestionBankUpdateRequest;
use App\Models\ExamType;
use App\Models\QuestionBank;
use App\Models\TeacherSubject;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class QuestionBankController extends Controller
{
    /**
     * Daftar Bank Soal
     */
    public function index(Request $request): View
    {
        $questionBanks = QuestionBank::query()
            ->with([
                'teacherSubject.teacher',
                'teacherSubject.subject',
                'teacherSubject.classroom',
                'examType',
            ])
            ->when(
                $request->search,
                fn($query) => $query->where(
                    'title',
                    'like',
                    "%{$request->search}%"
                )
            )
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view(
            'admin.question-banks.index',
            compact('questionBanks')
        );
    }

    /**
     * Form tambah
     */
    public function create(): View
    {
        $teacherSubjects = TeacherSubject::with([
            'teacher',
            'subject',
            'classroom',
        ])
        ->orderBy('teacher_id')
        ->get();

        $examTypes = ExamType::orderBy('name')->get();

        return view(
            'admin.question-banks.create',
            compact(
                'teacherSubjects',
                'examTypes'
            )
        );
    }

    /**
     * Simpan
     */
    public function store(
        QuestionBankStoreRequest $request
    ): RedirectResponse {

        QuestionBank::create(

            $request->validated()

        );

        return redirect()
            ->route('question-banks.index')
            ->with(
                'success',
                'Bank soal berhasil ditambahkan.'
            );
    }

    /**
     * Form edit
     */
    public function edit(
        QuestionBank $questionBank
    ): View {

        $teacherSubjects = TeacherSubject::with([
            'teacher',
            'subject',
            'classroom',
        ])
        ->orderBy('teacher_id')
        ->get();

        $examTypes = ExamType::orderBy('name')->get();

        return view(
            'admin.question-banks.edit',
            compact(
                'questionBank',
                'teacherSubjects',
                'examTypes'
            )
        );
    }

    /**
     * Update
     */
    public function update(
        QuestionBankUpdateRequest $request,
        QuestionBank $questionBank
    ): RedirectResponse {

        $questionBank->update(

            $request->validated()

        );

        return redirect()
            ->route('question-banks.index')
            ->with(
                'success',
                'Bank soal berhasil diperbarui.'
            );
    }

    /**
     * Hapus
     */
    public function destroy(
        QuestionBank $questionBank
    ): RedirectResponse {

        $questionBank->delete();

        return back()->with(
            'success',
            'Bank soal berhasil dihapus.'
        );
    }
}