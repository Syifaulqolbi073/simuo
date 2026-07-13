<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AcademicYearStoreRequest;
use App\Http\Requests\Admin\AcademicYearUpdateRequest;
use App\Models\AcademicYear;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AcademicYearController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->string('search')->toString();

        $academicYears = AcademicYear::query()
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('code', 'like', "%{$search}%")
                      ->orWhere('name', 'like', "%{$search}%");
                });
            })
            ->latest('start_date')
            ->paginate(10)
            ->withQueryString();

        return view('admin.academic-years.index', compact(
            'academicYears',
            'search'
        ));
    }

    public function create(): View
    {
        return view('admin.academic-years.create');
    }

    public function store(AcademicYearStoreRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $data['is_active'] = $request->boolean('is_active');

        if ($data['is_active']) {
            AcademicYear::query()->update([
                'is_active' => false,
            ]);
        }

        AcademicYear::create($data);

        return redirect()
            ->route('academic-years.index')
            ->with('success', 'Tahun pelajaran berhasil ditambahkan.');
    }

    public function edit(AcademicYear $academicYear): View
    {
        return view('admin.academic-years.edit', compact('academicYear'));
    }

    public function update(
        AcademicYearUpdateRequest $request,
        AcademicYear $academicYear
    ): RedirectResponse {

        $data = $request->validated();

        $data['is_active'] = $request->boolean('is_active');

        if ($data['is_active']) {
            AcademicYear::query()->update([
                'is_active' => false,
            ]);
        }

        $academicYear->update($data);

        return redirect()
            ->route('academic-years.index')
            ->with('success', 'Tahun pelajaran berhasil diperbarui.');
    }

    public function destroy(AcademicYear $academicYear): RedirectResponse
    {
        if ($academicYear->is_active) {
            return redirect()
                ->route('academic-years.index')
                ->with('error', 'Tahun pelajaran aktif tidak dapat dihapus.');
        }

        $academicYear->delete();

        return redirect()
            ->route('academic-years.index')
            ->with('success', 'Tahun pelajaran berhasil dihapus.');
    }

    public function activate(AcademicYear $academicYear): RedirectResponse
    {
        AcademicYear::query()->update([
            'is_active' => false,
        ]);

        $academicYear->update([
            'is_active' => true,
        ]);

        return redirect()
            ->route('academic-years.index')
            ->with('success', 'Tahun pelajaran berhasil diaktifkan.');
    }
}