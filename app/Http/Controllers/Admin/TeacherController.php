<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TeacherStoreRequest;
use App\Http\Requests\Admin\TeacherUpdateRequest;
use App\Models\Teacher;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $teachers = Teacher::query()

            ->when(request('search'), function ($query) {

                $query->where('nip', 'like', '%' . request('search') . '%')
                      ->orWhere('name', 'like', '%' . request('search') . '%')
                      ->orWhere('email', 'like', '%' . request('search') . '%');

            })

            ->orderBy('name')

            ->paginate(10)

            ->withQueryString();

        return view(
            'admin.teachers.index',
            compact('teachers')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        TeacherStoreRequest $request
    ): RedirectResponse {

        $data = $request->validated();

        $data['is_active'] = $request->boolean('is_active');

        Teacher::create($data);

        return redirect()
            ->route('teachers.index')
            ->with('success', 'Guru berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(
        Teacher $teacher
    ): View {

        return view(
            'admin.teachers.edit',
            compact('teacher')
        );

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        TeacherUpdateRequest $request,
        Teacher $teacher
    ): RedirectResponse {

        $data = $request->validated();

        $data['is_active'] = $request->boolean('is_active');

        $teacher->update($data);

        return redirect()
            ->route('teachers.index')
            ->with('success', 'Guru berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Teacher $teacher
    ): RedirectResponse {

        $teacher->delete();

        return redirect()
            ->route('teachers.index')
            ->with('success', 'Guru berhasil dihapus.');
    }
   


}