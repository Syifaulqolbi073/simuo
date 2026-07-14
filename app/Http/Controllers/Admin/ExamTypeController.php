<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ExamTypeStoreRequest;
use App\Http\Requests\Admin\ExamTypeUpdateRequest;
use App\Models\ExamType;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ExamTypeController extends Controller
{
    public function index(): View
    {
        $examTypes = ExamType::latest()
            ->paginate(10)
            ->withQueryString();

        return view(
            'admin.exam-types.index',
            compact('examTypes')
        );
    }

    public function create(): View
    {
        return view('admin.exam-types.create');
    }

    public function store(
        ExamTypeStoreRequest $request
    ): RedirectResponse {

        $data = $request->validated();

        $data['is_active'] = $request->boolean('is_active');

        ExamType::create($data);

        return redirect()
            ->route('exam-types.index')
            ->with('success', 'Jenis ujian berhasil ditambahkan.');
    }

    public function show(ExamType $examType)
    {
        abort(404);
    }

    public function edit(
        ExamType $examType
    ): View {

        return view(
            'admin.exam-types.edit',
            compact('examType')
        );
    }

    public function update(
        ExamTypeUpdateRequest $request,
        ExamType $examType
    ): RedirectResponse {

        $data = $request->validated();

        $data['is_active'] = $request->boolean('is_active');

        $examType->update($data);

        return redirect()
            ->route('exam-types.index')
            ->with('success', 'Jenis ujian berhasil diperbarui.');
    }

    public function destroy(
        ExamType $examType
    ): RedirectResponse {

        $examType->delete();

        return redirect()
            ->route('exam-types.index')
            ->with('success', 'Jenis ujian berhasil dihapus.');
    }
}