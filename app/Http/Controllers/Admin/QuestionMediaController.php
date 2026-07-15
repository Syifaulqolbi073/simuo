<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\QuestionMediaStoreRequest;
use App\Models\Question;
use App\Models\QuestionBank;
use App\Models\QuestionMedia;
use App\Services\MediaService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class QuestionMediaController extends Controller
{
    /**
     * Daftar Media
     */
    public function index(
        QuestionBank $questionBank,
        Question $question
    ): View {

        abort_if(
            $question->question_bank_id !== $questionBank->id,
            404
        );

        $media = $question
            ->media()
            ->latest()
            ->get();

        return view(
            'admin.question-banks.questions.media.index',
            compact(
                'questionBank',
                'question',
                'media'
            )
        );
    }

    /**
     * Form Upload
     */
    public function create(
        QuestionBank $questionBank,
        Question $question
    ): View {

        abort_if(
            $question->question_bank_id !== $questionBank->id,
            404
        );

        return view(
            'admin.question-banks.questions.media.create',
            compact(
                'questionBank',
                'question'
            )
        );
    }

/**
 * Upload Media
 */
public function store(
    QuestionMediaStoreRequest $request,
    QuestionBank $questionBank,
    Question $question,
    MediaService $mediaService
): RedirectResponse {

    

    $data = $request->validated();

    $folder = match ($data['media_type']) {
        'IMAGE' => 'images',
        'AUDIO' => 'audio',
        'VIDEO' => 'video',
        default => 'documents',
    };

    $upload = $mediaService->upload(
        $request->file('file'),
        $folder
    );

    $question->media()->create([
        'media_type' => $data['media_type'],
        'file_name'  => $upload['file_name'],
        'file_path'  => $upload['file_path'],
        'mime_type'  => $upload['mime_type'],
        'file_size'  => $upload['file_size'],
        'sort_order' => $data['sort_order'] ?? 1,
        'is_active'  => $data['is_active'] ?? true,
    ]);

    return redirect()
        ->route(
            'question-banks.questions.media.index',
            [$questionBank, $question]
        )
        ->with('success', 'Media berhasil diunggah.');
}

    /**
     * Hapus Media
     */
    public function destroy(
        QuestionBank $questionBank,
        Question $question,
        QuestionMedia $media,
        MediaService $mediaService
    ): RedirectResponse {

        // kita isi nanti

        return back()
            ->with(
                'success',
                'Media berhasil dihapus.'
            );
    }
}