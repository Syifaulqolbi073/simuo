<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ClassroomStoreRequest;
use App\Http\Requests\Admin\ClassroomUpdateRequest;
use App\Models\Classroom;
use App\Models\Grade;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ClassroomController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->string('search')->toString();

        $classrooms = Classroom::with('grade')
            ->when($search, function ($query) use ($search) {
                $query->where('code', 'like', "%{$search}%")
                      ->orWhere('name', 'like', "%{$search}%");
            })
            ->orderBy('name')
            ->paginate(10)
            ->withQueryString();

        return view('admin.classrooms.index', compact(
            'classrooms',
            'search'
        ));
    }

    public function create(): View
    {
        $grades = Grade::where('is_active', true)
            ->orderBy('order')
            ->get();

        return view('admin.classrooms.create', compact('grades'));
    }

    public function store(ClassroomStoreRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $data['is_active'] = $request->boolean('is_active');

       

        Classroom::create($data);

        return redirect()
            ->route('classrooms.index')
            ->with('success', 'Kelas berhasil ditambahkan.');
    }

    public function edit(Classroom $classroom): View
    {
        $grades = Grade::orderBy('order')->get();

        return view(
            'admin.classrooms.edit',
            compact('classroom', 'grades')
        );
    }

    public function update(
        ClassroomUpdateRequest $request,
        Classroom $classroom
    ): RedirectResponse {

        $data = $request->validated();

        $data['is_active'] = $request->boolean('is_active');

        

        $classroom->update($data);

        return redirect()
            ->route('classrooms.index')
            ->with('success', 'Kelas berhasil diperbarui.');
    }

    public function destroy(Classroom $classroom): RedirectResponse
    {
        if ($classroom->is_active) {
            return redirect()
                ->route('classrooms.index')
                ->with('error', 'Kelas aktif tidak dapat dihapus.');
        }

        $classroom->delete();

        return redirect()
            ->route('classrooms.index')
            ->with('success', 'Kelas berhasil dihapus.');
    }

    
}