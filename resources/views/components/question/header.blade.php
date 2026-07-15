<div class="grid grid-cols-1 gap-6 rounded-xl border border-slate-200 bg-slate-50 p-6 md:grid-cols-3">

    {{-- Jenis Soal --}}
    <div>

        <label
            for="question_type"
            class="mb-2 block text-sm font-medium text-slate-700">

            Jenis Soal

        </label>

        <select
            id="question_type"
            name="question_type"
            class="w-full rounded-lg border-slate-300 focus:border-emerald-500 focus:ring-emerald-500">

            @foreach(config('question.types') as $value => $label)

                <option
                    value="{{ $value }}"
                    @selected(old('question_type', $question->question_type ?? 'MCQ') == $value)>

                    {{ $label }}

                </option>

            @endforeach

        </select>

        @error('question_type')

            <p class="mt-1 text-sm text-red-600">

                {{ $message }}

            </p>

        @enderror

    </div>

    {{-- Bobot --}}
    <div>

        <label
            for="score"
            class="mb-2 block text-sm font-medium text-slate-700">

            Bobot Nilai

        </label>

        <input
            id="score"
            type="number"
            name="score"
            min="1"
            value="{{ old('score', $question->score ?? 1) }}"
            class="w-full rounded-lg border-slate-300 focus:border-emerald-500 focus:ring-emerald-500">

        @error('score')

            <p class="mt-1 text-sm text-red-600">

                {{ $message }}

            </p>

        @enderror

    </div>

    {{-- Tingkat Kesulitan --}}
    <div>

        <label
            for="difficulty"
            class="mb-2 block text-sm font-medium text-slate-700">

            Tingkat Kesulitan

        </label>

        <select
            id="difficulty"
            name="difficulty"
            class="w-full rounded-lg border-slate-300 focus:border-emerald-500 focus:ring-emerald-500">

            @foreach(config('question.difficulty') as $difficulty)

                <option
                    value="{{ $difficulty }}"
                    @selected(old('difficulty', $question->difficulty ?? 'Sedang') == $difficulty)>

                    {{ $difficulty }}

                </option>

            @endforeach

        </select>

        @error('difficulty')

            <p class="mt-1 text-sm text-red-600">

                {{ $message }}

            </p>

        @enderror

    </div>

</div>