<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ExamPackage;
use App\Models\ExamSchedule;
use App\Services\ExamPackageService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ExamPackageController extends Controller
{
    /**
     * Daftar Paket
     */
    public function index(
        ExamSchedule $examSchedule
    ): View {

        $packages = $examSchedule
            ->packages()
            ->latest()
            ->paginate(20);

        return view(
            'admin.exam-schedules.packages.index',
            compact(
                'examSchedule',
                'packages'
            )
        );

    }

    /**
     * Preview Paket
     */
    public function show(
    ExamSchedule $examSchedule,
    ExamPackage $package
): View {

    abort_if(
        $package->exam_schedule_id !== $examSchedule->id,
        404
    );

    $package->load([
        'questions.question.options',
        'questions.question.media',
    ]);

    return view(
        'admin.exam-schedules.packages.show',
        compact(
            'examSchedule',
            'package'
        )
    );

}

    /**
     * Generate Paket
     */
    public function generate(
    ExamSchedule $examSchedule,
    ExamPackageService $service
): RedirectResponse {

    try {

        $service->generate($examSchedule);

        return back()->with(
            'success',
            'Paket ujian berhasil dibuat.'
        );

    } catch (\Throwable $e) {

        return back()->with(
            'error',
            $e->getMessage()
        );

    }

}

    /**
     * Regenerate Paket
     */
    public function regenerate(
    ExamSchedule $examSchedule,
    ExamPackageService $service
): RedirectResponse {

    try {

        $service->generate($examSchedule);

        return back()->with(
            'success',
            'Paket ujian berhasil dibuat ulang.'
        );

    } catch (\Throwable $e) {

        return back()->with(
            'error',
            $e->getMessage()
        );

    }

}

    /**
     * Hapus Paket
     */
    public function destroy(
        ExamSchedule $examSchedule,
        ExamPackage $package
    ): RedirectResponse {

        abort_if(
            $package->exam_schedule_id !== $examSchedule->id,
            404
        );

        $package->delete();

        return back()
            ->with(
                'success',
                'Paket ujian berhasil dihapus.'
            );

    }
}