<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\HomeroomTeacherStoreRequest;
use App\Http\Requests\Admin\HomeroomTeacherUpdateRequest;
use App\Models\AcademicYear;
use App\Models\Classroom;
use App\Models\HomeroomTeacher;
use App\Models\Semester;
use App\Models\Teacher;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class HomeroomTeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $homeroomTeachers = HomeroomTeacher::with([
                'teacher',
                'classroom',
                'academicYear',
                'semester',
            ])
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view(
            'admin.homeroom-teachers.index',
            compact('homeroomTeachers')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view(
            'admin.homeroom-teachers.create',
            [
                'teachers' => Teacher::orderBy('name')->get(),
                'classrooms' => Classroom::orderBy('name')->get(),
                'academicYears' => AcademicYear::orderByDesc('name')->get(),
                'semesters' => Semester::orderBy('order')->get(),
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        HomeroomTeacherStoreRequest $request
    ): RedirectResponse {

        $data = $request->validated();

        $data['is_active'] = $request->boolean('is_active');

        HomeroomTeacher::create($data);

        return redirect()
            ->route('homeroom-teachers.index')
            ->with('success', 'Wali kelas berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(HomeroomTeacher $homeroomTeacher)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(
        HomeroomTeacher $homeroomTeacher
    ): View {

        return view(
            'admin.homeroom-teachers.edit',
            [
                'homeroomTeacher' => $homeroomTeacher,
                'teachers' => Teacher::orderBy('name')->get(),
                'classrooms' => Classroom::orderBy('name')->get(),
                'academicYears' => AcademicYear::orderByDesc('name')->get(),
                'semesters' => Semester::orderBy('order')->get(),
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        HomeroomTeacherUpdateRequest $request,
        HomeroomTeacher $homeroomTeacher
    ): RedirectResponse {

        $data = $request->validated();

        $data['is_active'] = $request->boolean('is_active');

        $homeroomTeacher->update($data);

        return redirect()
            ->route('homeroom-teachers.index')
            ->with('success', 'Wali kelas berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        HomeroomTeacher $homeroomTeacher
    ): RedirectResponse {

        $homeroomTeacher->delete();

        return redirect()
            ->route('homeroom-teachers.index')
            ->with('success', 'Wali kelas berhasil dihapus.');
    }
}