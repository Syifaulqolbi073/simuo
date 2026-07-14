<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StudentStoreRequest;
use App\Http\Requests\Admin\StudentUpdateRequest;
use App\Models\Student;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $students = Student::query()

            ->when(request('search'), function ($query) {

                $query->where('nis', 'like', '%' . request('search') . '%')
                      ->orWhere('nisn', 'like', '%' . request('search') . '%')
                      ->orWhere('name', 'like', '%' . request('search') . '%');

            })

            ->orderBy('name')

            ->paginate(10)

            ->withQueryString();

        return view(
            'admin.students.index',
            compact('students')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        StudentStoreRequest $request
    ): RedirectResponse {

        $data = $request->validated();

        $data['is_active'] = $request->boolean('is_active');

        Student::create($data);

        return redirect()
            ->route('students.index')
            ->with('success', 'Siswa berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(
        Student $student
    ): View {

        return view(
            'admin.students.edit',
            compact('student')
        );

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        StudentUpdateRequest $request,
        Student $student
    ): RedirectResponse {

        $data = $request->validated();

        $data['is_active'] = $request->boolean('is_active');

        $student->update($data);

        return redirect()
            ->route('students.index')
            ->with('success', 'Siswa berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Student $student
    ): RedirectResponse {

        $student->delete();

        return redirect()
            ->route('students.index')
            ->with('success', 'Siswa berhasil dihapus.');
    }
}