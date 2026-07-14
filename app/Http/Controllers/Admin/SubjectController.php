<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SubjectStoreRequest;
use App\Http\Requests\Admin\SubjectUpdateRequest;
use App\Models\Subject;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $subjects = Subject::query()

            ->when(request('search'), function ($query) {

                $query->where('code', 'like', '%' . request('search') . '%')
                      ->orWhere('name', 'like', '%' . request('search') . '%');

            })

            ->orderBy('code')

            ->paginate(10)

            ->withQueryString();

        return view(
            'admin.subjects.index',
            compact('subjects')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.subjects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        SubjectStoreRequest $request
    ): RedirectResponse {

        $data = $request->validated();

        $data['is_active'] = $request->boolean('is_active');

        Subject::create($data);

        return redirect()
            ->route('subjects.index')
            ->with('success', 'Mata pelajaran berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(
        Subject $subject
    ): View {

        return view(
            'admin.subjects.edit',
            compact('subject')
        );

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        SubjectUpdateRequest $request,
        Subject $subject
    ): RedirectResponse {

        $data = $request->validated();

        $data['is_active'] = $request->boolean('is_active');

        $subject->update($data);

        return redirect()
            ->route('subjects.index')
            ->with('success', 'Mata pelajaran berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Subject $subject
    ): RedirectResponse {

        $subject->delete();

        return redirect()
            ->route('subjects.index')
            ->with('success', 'Mata pelajaran berhasil dihapus.');
    }
}