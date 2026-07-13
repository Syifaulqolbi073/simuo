<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SemesterStoreRequest;
use App\Http\Requests\Admin\SemesterUpdateRequest;
use App\Models\AcademicYear;
use App\Models\Semester;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SemesterController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->string('search')->toString();

        $semesters = Semester::with('academicYear')
            ->when($search, function ($query) use ($search) {
                $query->where('code', 'like', "%{$search}%")
                    ->orWhere('name', 'like', "%{$search}%");
            })
            ->orderByDesc('created_at')
            ->paginate(10)
            ->withQueryString();

        return view('admin.semesters.index', compact(
            'semesters',
            'search'
        ));
    }

    public function create(): View
    {
        $academicYears = AcademicYear::orderByDesc('start_date')->get();

        return view('admin.semesters.create', compact('academicYears'));
    }

    public function store(SemesterStoreRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $data['is_active'] = $request->boolean('is_active');

        if ($data['is_active']) {
            Semester::query()->update([
                'is_active' => false,
            ]);
        }

        Semester::create($data);

        return redirect()
            ->route('semesters.index')
            ->with('success', 'Semester berhasil ditambahkan.');
    }

    public function edit(Semester $semester): View
    {
        $academicYears = AcademicYear::orderByDesc('start_date')->get();

        return view('admin.semesters.edit', compact(
            'semester',
            'academicYears'
        ));
    }

    public function update(
        SemesterUpdateRequest $request,
        Semester $semester
    ): RedirectResponse {

        $data = $request->validated();

        $data['is_active'] = $request->boolean('is_active');

        if ($data['is_active']) {
            Semester::query()->update([
                'is_active' => false,
            ]);
        }

        $semester->update($data);

        return redirect()
            ->route('semesters.index')
            ->with('success', 'Semester berhasil diperbarui.');
    }

    public function destroy(Semester $semester): RedirectResponse
    {
        if ($semester->is_active) {
            return redirect()
                ->route('semesters.index')
                ->with('error', 'Semester aktif tidak dapat dihapus.');
        }

        $semester->delete();

        return redirect()
            ->route('semesters.index')
            ->with('success', 'Semester berhasil dihapus.');
    }
    public function activate(Semester $semester): RedirectResponse
{
    Semester::query()->update([
        'is_active' => false,
    ]);

    $semester->update([
        'is_active' => true,
    ]);

    return redirect()
        ->route('semesters.index')
        ->with('success', 'Semester berhasil diaktifkan.');
}
}