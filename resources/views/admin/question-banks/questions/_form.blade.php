@csrf

<div class="grid grid-cols-1 gap-6">

    {{-- Jenis Soal --}}
    <div>

        <label class="mb-2 block text-sm font-medium text-slate-700">

            Jenis Soal

        </label>

        <select
            name="question_type"
            class="w-full rounded-lg border-slate-300">

            <option value="MCQ"
                @selected(old('question_type', $question->question_type ?? '') == 'MCQ')>

                Pilihan Ganda

            </option>

            <option value="ESSAY"
                @selected(old('question_type', $question->question_type ?? '') == 'ESSAY')>

                Essay

            </option>

        </select>

    </div>

    {{-- Bobot --}}
    <div>

        <label class="mb-2 block text-sm font-medium">

            Bobot

        </label>

        <input
            type="number"
            name="score"
            min="1"
            value="{{ old('score', $question->score ?? 1) }}"
            class="w-full rounded-lg border-slate-300">

    </div>

    {{-- Tingkat Kesulitan --}}
    <div>

        <label class="mb-2 block text-sm font-medium">

            Tingkat Kesulitan

        </label>

        <select
            name="difficulty"
            class="w-full rounded-lg border-slate-300">

            <option value="Mudah"
                @selected(old('difficulty', $question->difficulty ?? '') == 'Mudah')>

                Mudah

            </option>

            <option value="Sedang"
                @selected(old('difficulty', $question->difficulty ?? 'Sedang') == 'Sedang')>

                Sedang

            </option>

            <option value="Sulit"
                @selected(old('difficulty', $question->difficulty ?? '') == 'Sulit')>

                Sulit

            </option>

        </select>

    </div>

    {{-- Isi Soal --}}
    <div>

        <label class="mb-2 block text-sm font-medium">

            Isi Soal

        </label>

        <textarea
            name="question_text"
            rows="8"
            class="w-full rounded-lg border-slate-300">{{ old('question_text', $question->question_text ?? '') }}</textarea>

    </div>

    {{-- Pembahasan --}}
    <div>

        <label class="mb-2 block text-sm font-medium">

            Pembahasan

        </label>

        <textarea
            name="discussion"
            rows="6"
            class="w-full rounded-lg border-slate-300">{{ old('discussion', $question->discussion ?? '') }}</textarea>

    </div>

    {{-- Status --}}
    <div>

        <label class="mb-2 block text-sm font-medium">

            Status

        </label>

        <select
            name="is_active"
            class="w-full rounded-lg border-slate-300">

            <option value="1"
                @selected(old('is_active', $question->is_active ?? true))>

                Aktif

            </option>

            <option value="0"
                @selected(old('is_active', $question->is_active ?? false) == false)>

                Nonaktif

            </option>

        </select>

    </div>

</div>

<div class="mt-8 flex justify-end gap-3">

    <a
        href="{{ route('question-banks.questions.index', $questionBank) }}"
        class="rounded-lg border border-slate-300 px-4 py-2 hover:bg-slate-100">

        Batal

    </a>

    <x-ui.button>

        Simpan

    </x-ui.button>

</div>