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
    public function index(QuestionBank $questionBank): View
    {
        $questions = $questionBank
            ->questions()
            ->latest()
            ->paginate(20);

        return view(
            'admin.question-banks.questions.index',
            compact(
                'questionBank',
                'questions'
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