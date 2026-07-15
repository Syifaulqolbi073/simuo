<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\QuestionStoreRequest;
use App\Http\Requests\Admin\QuestionUpdateRequest;
use App\Models\Question;
use App\Models\QuestionBank;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\QuestionOption;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    /**
     * Daftar Soal
     */
    public function index(
    QuestionBank $questionBank
): View {

    $query = $questionBank->questions();

if (request()->filled('search')) {

    $query->where(function ($q) {

        $q->where(
            'question_text',
            'like',
            '%' . request('search') . '%'
        )

        ->orWhere(
            'discussion',
            'like',
            '%' . request('search') . '%'
        );

    });

}

if (request()->filled('type')) {

    $query->where(
        'question_type',
        request('type')
    );

}

if (request()->filled('difficulty')) {

    $query->where(
        'difficulty',
        request('difficulty')
    );

}

if (request()->filled('status')) {

    $query->where(
        'is_active',
        request('status')
    );

}

$questions = $query
    ->latest()
    ->paginate(20)
    ->withQueryString();

    $statistics = [

    // Menggunakan nilai yang sudah disimpan di tabel question_banks
    'total' => $questionBank->total_question,

    'score' => $questionBank->total_score,

    // Tetap dihitung karena belum ada kolom khusus
    'mcq' => $questionBank
        ->questions()
        ->where('question_type', 'MCQ')
        ->count(),

    'essay' => $questionBank
        ->questions()
        ->where('question_type', 'ESSAY')
        ->count(),

];

    return view(
        'admin.question-banks.questions.index',
        compact(
            'questionBank',
            'questions',
            'statistics'
        )
    );

}

    /**
     * Form Tambah
     */
    public function create(
        QuestionBank $questionBank
    ): View {

        return view(
            'admin.question-banks.questions.create',
            compact('questionBank')
        );
    }

    /**
     * Simpan
     */
    public function store(
    QuestionStoreRequest $request,
    QuestionBank $questionBank
): RedirectResponse {

    DB::transaction(function () use ($request, $questionBank) {

        $data = $request->validated();

        $question = $questionBank->questions()->create([
            'question_type' => $data['question_type'],
            'question_text' => $data['question_text'],
            'discussion'    => $data['discussion'] ?? null,
            'score'         => $data['score'],
            'difficulty'    => $data['difficulty'],
            'sort_order'    => $data['sort_order'] ?? 1,
            'is_active'     => $data['is_active'],
        ]);

        foreach (['A','B','C','D','E'] as $key) {

            $field = 'option_' . strtolower($key);

            if (!empty($data[$field])) {

                QuestionOption::create([

                    'question_id' => $question->id,

                    'option_key'  => $key,

                    'option_text' => $data[$field],

                    'is_correct'  => ($data['correct_answer'] ?? '') === $key,

                    'sort_order'  => ord($key) - 64,

                    'is_active'   => true,

                ]);

            }

        }

        $this->updateQuestionBank($questionBank);

    });

    return redirect()
        ->route('question-banks.questions.index', $questionBank)
        ->with('success', 'Soal berhasil ditambahkan.');
}

    /**
     * Form Edit
     */
    /**
 * Form Edit
 */
public function edit(
    QuestionBank $questionBank,
    Question $question
): View {

    abort_if(
        $question->question_bank_id !== $questionBank->id,
        404
    );

    // Load pilihan jawaban agar langsung tersedia di view
    $question->load('options');

    return view(
        'admin.question-banks.questions.edit',
        compact(
            'questionBank',
            'question'
        )
    );
}

    /**
     * Update
     */
    public function update(
    QuestionUpdateRequest $request,
    QuestionBank $questionBank,
    Question $question
): RedirectResponse {

    abort_if(
        $question->question_bank_id !== $questionBank->id,
        404
    );

    DB::transaction(function () use ($request, $questionBank, $question) {

        $data = $request->validated();

        $question->update([

            'question_type' => $data['question_type'],
            'question_text' => $data['question_text'],
            'discussion'    => $data['discussion'] ?? null,
            'score'         => $data['score'],
            'difficulty'    => $data['difficulty'],
            'sort_order'    => $data['sort_order'] ?? 1,
            'is_active'     => $data['is_active'],

        ]);

        foreach (['A', 'B', 'C', 'D', 'E'] as $key) {

            $field = 'option_' . strtolower($key);

            if (!empty($data[$field])) {

                QuestionOption::updateOrCreate(

                    [
                        'question_id' => $question->id,
                        'option_key'  => $key,
                    ],

                    [
                        'option_text' => $data[$field],
                        'is_correct'  => ($data['correct_answer'] ?? '') === $key,
                        'sort_order'  => ord($key) - 64,
                        'is_active'   => true,
                    ]

                );

            }

        }

        $this->updateQuestionBank($questionBank);

    });

    return redirect()
        ->route(
            'question-banks.questions.index',
            $questionBank
        )
        ->with(
            'success',
            'Soal berhasil diperbarui.'
        );
}
/**
 * Preview Soal
 */
public function show(
    QuestionBank $questionBank,
    Question $question
): View {

    abort_if(
        $question->question_bank_id !== $questionBank->id,
        404
    );

    $question->load('options');

    return view(
        'admin.question-banks.questions.show',
        compact(
            'questionBank',
            'question'
        )
    );
}
/**
 * Duplicate Soal
 */
public function duplicate(
    QuestionBank $questionBank,
    Question $question
): RedirectResponse {

    abort_if(
        $question->question_bank_id !== $questionBank->id,
        404
    );

    DB::transaction(function () use ($questionBank, $question) {

        // Muat semua pilihan jawaban
        $question->load('options');

        // Duplikasi soal
        $newQuestion = $question->replicate();
        $newQuestion->save();

        // Duplikasi semua pilihan jawaban
        foreach ($question->options as $option) {

            $newOption = $option->replicate();

            $newOption->question_id = $newQuestion->id;

            $newOption->save();

        }

        // Update statistik bank soal
        $this->updateQuestionBank($questionBank);

    });

    return redirect()
        ->route(
            'question-banks.questions.index',
            $questionBank
        )
        ->with(
            'success',
            'Soal berhasil diduplikasi.'
        );
}

    /**
     * Hapus
     */
    public function destroy(
        QuestionBank $questionBank,
        Question $question
    ): RedirectResponse {

        abort_if(
            $question->question_bank_id !== $questionBank->id,
            404
        );

        $question->delete();

        $this->updateQuestionBank($questionBank);

        return redirect()
            ->route(
                'question-banks.questions.index',
                $questionBank
            )
            ->with(
                'success',
                'Soal berhasil dihapus.'
            );
    }

    /**
     * Sinkronisasi Statistik Bank Soal
     */
    private function updateQuestionBank(
        QuestionBank $questionBank
    ): void {

        $questionBank->update([

            'total_question' => $questionBank
                ->questions()
                ->count(),

            'total_score' => $questionBank
                ->questions()
                ->sum('score'),

        ]);
    }
}