<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TeacherSubjectStoreRequest;
use App\Http\Requests\Admin\TeacherSubjectUpdateRequest;
use App\Models\AcademicYear;
use App\Models\Classroom;
use App\Models\Semester;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\TeacherSubject;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TeacherSubjectController extends Controller
{
    public function index(): View
    {
        $teacherSubjects = TeacherSubject::with([
                'teacher',
                'subject',
                'classroom',
                'academicYear',
                'semester',
            ])
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view(
            'admin.teacher-subjects.index',
            compact('teacherSubjects')
        );
    }

    public function create(): View
    {
        return view(
            'admin.teacher-subjects.create',
            [
                'teachers' => Teacher::orderBy('name')->get(),
                'subjects' => Subject::orderBy('name')->get(),
                'classrooms' => Classroom::orderBy('name')->get(),
                'academicYears' => AcademicYear::orderByDesc('name')->get(),
                'semesters' => Semester::orderBy('order')->get(),
            ]
        );
    }

    public function store(
        TeacherSubjectStoreRequest $request
    ): RedirectResponse {

        $data = $request->validated();

        $data['is_active'] = $request->boolean('is_active');

        TeacherSubject::create($data);

        return redirect()
            ->route('teacher-subjects.index')
            ->with('success', 'Guru mengajar berhasil ditambahkan.');
    }

    public function show(TeacherSubject $teacherSubject)
    {
        abort(404);
    }

    public function edit(
        TeacherSubject $teacherSubject
    ): View {

        return view(
            'admin.teacher-subjects.edit',
            [
                'teacherSubject' => $teacherSubject,
                'teachers' => Teacher::orderBy('name')->get(),
                'subjects' => Subject::orderBy('name')->get(),
                'classrooms' => Classroom::orderBy('name')->get(),
                'academicYears' => AcademicYear::orderByDesc('name')->get(),
                'semesters' => Semester::orderBy('order')->get(),
            ]
        );
    }

    public function update(
        TeacherSubjectUpdateRequest $request,
        TeacherSubject $teacherSubject
    ): RedirectResponse {

        $data = $request->validated();

        $data['is_active'] = $request->boolean('is_active');

        $teacherSubject->update($data);

        return redirect()
            ->route('teacher-subjects.index')
            ->with('success', 'Guru mengajar berhasil diperbarui.');
    }

    public function destroy(
        TeacherSubject $teacherSubject
    ): RedirectResponse {

        $teacherSubject->delete();

        return redirect()
            ->route('teacher-subjects.index')
            ->with('success', 'Guru mengajar berhasil dihapus.');
    }
}