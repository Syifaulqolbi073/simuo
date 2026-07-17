<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ExamScheduleStoreRequest;
use App\Http\Requests\Admin\ExamScheduleUpdateRequest;
use App\Models\ExamSchedule;
use App\Models\ExamType;
use App\Models\QuestionBank;
use App\Models\TeacherSubject;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ExamScheduleController extends Controller
{
    /**
     * Daftar jadwal ujian.
     */
    public function index(): View
    {
        $search = request('search');

        $examSchedules = ExamSchedule::with([
                'teacherSubject.teacher',
                'teacherSubject.subject',
                'teacherSubject.classroom',
                'examType',
                'questionBank',
            ])
            ->when($search, function ($query) use ($search) {

                $query->where('title', 'like', "%{$search}%")

                    ->orWhereHas('teacherSubject.teacher', function ($q) use ($search) {
                        $q->where('name', 'like', "%{$search}%");
                    })

                    ->orWhereHas('teacherSubject.subject', function ($q) use ($search) {
                        $q->where('name', 'like', "%{$search}%");
                    })

                    ->orWhereHas('teacherSubject.classroom', function ($q) use ($search) {
                        $q->where('name', 'like', "%{$search}%");
                    });

            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view(
            'admin.exam-schedules.index',
            compact('examSchedules')
        );
    }

    /**
     * Form tambah.
     */
    public function create(): View
    {
        $teacherSubjects = TeacherSubject::with([
                'teacher',
                'subject',
                'classroom',
            ])
            ->orderBy('id')
            ->get();

        $examTypes = ExamType::where('is_active', true)
            ->orderBy('name')
            ->get();

        $questionBanks = QuestionBank::where('is_active', true)
            ->orderBy('title')
            ->get();

        return view(
            'admin.exam-schedules.create',
            compact(
                'teacherSubjects',
                'examTypes',
                'questionBanks'
            )
        );
    }

    /**
     * Simpan.
     */
    public function store(
        ExamScheduleStoreRequest $request
    ): RedirectResponse {

        $data = $request->validated();

        if (empty($data['token'])) {
            $data['token'] = random_int(100000, 999999);
        }

        foreach ([
            'token_required',
            'shuffle_question',
            'shuffle_option',
            'show_score',
            'show_answer',
            'fullscreen_mode',
            'one_device_only',
            'auto_submit',
            'allow_retry',
            'show_timer',
            'is_published',
            'is_active',
        ] as $field) {
            $data[$field] = $request->boolean($field);
        }

        ExamSchedule::create($data);

        return redirect()
            ->route('exam-schedules.index')
            ->with(
                'success',
                'Jadwal ujian berhasil ditambahkan.'
            );
    }

    /**
     * Detail.
     */
    public function show(ExamSchedule $examSchedule)
    {
        abort(404);
    }

    /**
     * Form edit.
     */
    public function edit(
        ExamSchedule $examSchedule
    ): View {

        $teacherSubjects = TeacherSubject::with([
                'teacher',
                'subject',
                'classroom',
            ])
            ->orderBy('id')
            ->get();

        $examTypes = ExamType::where('is_active', true)
            ->orderBy('name')
            ->get();

        $questionBanks = QuestionBank::where('is_active', true)
            ->orderBy('title')
            ->get();

        return view(
            'admin.exam-schedules.edit',
            compact(
                'examSchedule',
                'teacherSubjects',
                'examTypes',
                'questionBanks'
            )
        );
    }

    /**
     * Update.
     */
    public function update(
        ExamScheduleUpdateRequest $request,
        ExamSchedule $examSchedule
    ): RedirectResponse {

        $data = $request->validated();
        

        if (empty($data['token'])) {
            $data['token'] = random_int(100000, 999999);
        }

        foreach ([
            'token_required',
            'shuffle_question',
            'shuffle_option',
            'show_score',
            'show_answer',
            'fullscreen_mode',
            'one_device_only',
            'auto_submit',
            'allow_retry',
            'show_timer',
            'is_published',
            'is_active',
        ] as $field) {
            $data[$field] = $request->boolean($field);
        }

        $examSchedule->update($data);

        return redirect()
            ->route('exam-schedules.index')
            ->with(
                'success',
                'Jadwal ujian berhasil diperbarui.'
            );
    }

    /**
     * Publish / Unpublish Jadwal.
     */
    public function publish(
        ExamSchedule $examSchedule
    ): RedirectResponse {

        $examSchedule->update([
            'is_published' => ! $examSchedule->is_published,
        ]);

        return back()->with(
            'success',
            $examSchedule->is_published
                ? 'Jadwal ujian berhasil dipublikasikan.'
                : 'Jadwal ujian berhasil disembunyikan.'
        );
    }

    /**
     * Generate token baru.
     */
    public function generateToken(
        ExamSchedule $examSchedule
    ): RedirectResponse {

        $examSchedule->update([
            'token' => (string) random_int(100000, 999999),
        ]);

        return back()->with(
            'success',
            'Token ujian berhasil dibuat.'
        );
    }

    /**
     * Duplikasi jadwal ujian.
     */
    public function duplicate(
        ExamSchedule $examSchedule
    ): RedirectResponse {

        $newExam = $examSchedule->replicate();

        $newExam->id = (string) Str::ulid();
        $newExam->title = $examSchedule->title . ' (Copy)';
        $newExam->token = random_int(100000, 999999);
        $newExam->status = 'Draft';
        $newExam->is_published = false;
        $newExam->created_at = now();
        $newExam->updated_at = now();

        $newExam->save();

        return redirect()
            ->route('exam-schedules.edit', $newExam)
            ->with(
                'success',
                'Jadwal ujian berhasil diduplikasi.'
            );
    }

    /**
     * Hapus.
     */
    public function destroy(
        ExamSchedule $examSchedule
    ): RedirectResponse {

        $examSchedule->delete();

        return redirect()
            ->route('exam-schedules.index')
            ->with(
                'success',
                'Jadwal ujian berhasil dihapus.'
            );
    }
}