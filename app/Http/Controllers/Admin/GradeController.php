<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GradeStoreRequest;
use App\Http\Requests\Admin\GradeUpdateRequest;
use App\Models\Grade;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class GradeController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->string('search')->toString();

        $grades = Grade::query()
            ->when($search, function ($query) use ($search) {
                $query->where('code', 'like', "%{$search}%")
                      ->orWhere('name', 'like', "%{$search}%");
            })
            ->orderBy('order')
            ->paginate(10)
            ->withQueryString();

        return view('admin.grades.index', compact(
            'grades',
            'search'
        ));
    }

    public function create(): View
    {
        return view('admin.grades.create');
    }

    public function store(GradeStoreRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $data['is_active'] = $request->boolean('is_active');

        if ($data['is_active']) {
            Grade::query()->update([
                'is_active' => false,
            ]);
        }

        Grade::create($data);

        return redirect()
            ->route('grades.index')
            ->with('success', 'Tingkat berhasil ditambahkan.');
    }

    public function edit(Grade $grade): View
    {
        return view('admin.grades.edit', compact('grade'));
    }

    public function update(
        GradeUpdateRequest $request,
        Grade $grade
    ): RedirectResponse {

        $data = $request->validated();

        $data['is_active'] = $request->boolean('is_active');

        if ($data['is_active']) {
            Grade::query()->update([
                'is_active' => false,
            ]);
        }

        $grade->update($data);

        return redirect()
            ->route('grades.index')
            ->with('success', 'Tingkat berhasil diperbarui.');
    }

    public function destroy(Grade $grade): RedirectResponse
    {
        if ($grade->is_active) {
            return redirect()
                ->route('grades.index')
                ->with('error', 'Tingkat aktif tidak dapat dihapus.');
        }

        $grade->delete();

        return redirect()
            ->route('grades.index')
            ->with('success', 'Tingkat berhasil dihapus.');
    }

    public function activate(Grade $grade): RedirectResponse
    {
        Grade::query()->update([
            'is_active' => false,
        ]);

        $grade->update([
            'is_active' => true,
        ]);

        return redirect()
            ->route('grades.index')
            ->with('success', 'Tingkat berhasil diaktifkan.');
    }
}