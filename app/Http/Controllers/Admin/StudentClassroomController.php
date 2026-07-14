<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StudentClassroomStoreRequest;
use App\Http\Requests\Admin\StudentClassroomUpdateRequest;
use App\Models\AcademicYear;
use App\Models\Classroom;
use App\Models\Semester;
use App\Models\Student;
use App\Models\StudentClassroom;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class StudentClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $studentClassrooms = StudentClassroom::with([
            'student',
            'classroom',
            'academicYear',
            'semester',
        ])
        ->latest()
        ->paginate(10);

        return view(
            'admin.student-classrooms.index',
            compact('studentClassrooms')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.student-classrooms.create', [
            'students' => Student::orderBy('name')->get(),
            'classrooms' => Classroom::orderBy('name')->get(),
            'academicYears' => AcademicYear::orderByDesc('start_date')->get(),
            'semesters' => Semester::orderBy('name')->get(),
        ]);
    }

    /**
     * Store a newly created resource.
     */
    public function store(
        StudentClassroomStoreRequest $request
    ): RedirectResponse {

        $data = $request->validated();

        $data['is_active'] = $request->boolean('is_active');

        StudentClassroom::create($data);

        return redirect()
            ->route('student-classrooms.index')
            ->with('success', 'Penempatan siswa berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(StudentClassroom $studentClassroom)
    {
        abort(404);
    }

    /**
     * Show the form for editing.
     */
    public function edit(
        StudentClassroom $studentClassroom
    ): View {

        return view('admin.student-classrooms.edit', [
            'studentClassroom' => $studentClassroom,
            'students' => Student::orderBy('name')->get(),
            'classrooms' => Classroom::orderBy('name')->get(),
            'academicYears' => AcademicYear::orderByDesc('start_date')->get(),
            'semesters' => Semester::orderBy('name')->get(),
        ]);
    }

    /**
     * Update.
     */
    public function update(
        StudentClassroomUpdateRequest $request,
        StudentClassroom $studentClassroom
    ): RedirectResponse {

        $data = $request->validated();

        $data['is_active'] = $request->boolean('is_active');

        $studentClassroom->update($data);

        return redirect()
            ->route('student-classrooms.index')
            ->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Delete.
     */
    public function destroy(
        StudentClassroom $studentClassroom
    ): RedirectResponse {

        $studentClassroom->delete();

        return redirect()
            ->route('student-classrooms.index')
            ->with('success', 'Data berhasil dihapus.');
    }
}