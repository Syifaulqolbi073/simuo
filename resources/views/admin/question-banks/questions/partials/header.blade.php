{{-- Informasi Soal --}}
<x-ui.card>

    <div class="border-b border-slate-200 px-6 py-4">
        <h3 class="font-semibold text-slate-800">
            Informasi Soal
        </h3>
    </div>

    <div class="grid grid-cols-1 gap-6 p-6 md:grid-cols-3">

        {{-- Jenis --}}
        <div>

            <label class="mb-2 block text-sm font-medium">
                Jenis Soal
            </label>

            <select
                name="question_type"
                class="w-full rounded-lg border-slate-300">

                @foreach(config('question.types') as $value => $label)

                    <option
                        value="{{ $value }}"
                        @selected(old('question_type', $question->question_type ?? 'MCQ') == $value)>

                        {{ $label }}

                    </option>

                @endforeach

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

        {{-- Kesulitan --}}
        <div>

            <label class="mb-2 block text-sm font-medium">
                Kesulitan
            </label>

            <select
                name="difficulty"
                class="w-full rounded-lg border-slate-300">

                @foreach(config('question.difficulty') as $difficulty)

                    <option
                        value="{{ $difficulty }}"
                        @selected(old('difficulty', $question->difficulty ?? 'Sedang') == $difficulty)>

                        {{ $difficulty }}

                    </option>

                @endforeach

            </select>

        </div>

    </div>

</x-ui.card>