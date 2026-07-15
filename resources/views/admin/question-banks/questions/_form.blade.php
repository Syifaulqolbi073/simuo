@csrf

<div class="space-y-8">

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
                            @selected(old('question_type',$question->question_type ?? 'MCQ')==$value)>

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
                    value="{{ old('score',$question->score ?? 1) }}"
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
                            @selected(old('difficulty',$question->difficulty ?? 'Sedang')==$difficulty)>

                            {{ $difficulty }}

                        </option>

                    @endforeach

                </select>

            </div>

        </div>

    </x-ui.card>

    {{-- Isi Soal --}}
    <x-ui.card>

        <div class="border-b border-slate-200 px-6 py-4">

            <h3 class="font-semibold">

                Isi Soal

            </h3>

        </div>

        <div class="p-6">

            <textarea
                name="question_text"
                rows="8"
                class="w-full rounded-lg border-slate-300">{{ old('question_text',$question->question_text ?? '') }}</textarea>

        </div>

    </x-ui.card>

{{-- Pilihan Jawaban --}}
<x-ui.card>

    <div class="border-b border-slate-200 px-6 py-4">

        <h3 class="font-semibold">
            Pilihan Jawaban
        </h3>

        <p class="text-sm text-slate-500">
            Pilih satu jawaban yang benar.
        </p>

    </div>

    <div class="space-y-4 p-6">

       @foreach(['A','B','C','D','E'] as $huruf)

    @php
        $option = $question?->option($huruf);

        $value = old(
            'option_' . strtolower($huruf),
            data_get($option, 'option_text')
        );

        $correct = old(
            'correct_answer',
            $question?->correctOption()?->option_key
        );
    @endphp

            <div class="flex items-start gap-4">

                <input
    type="radio"
    name="correct_answer"
    value="{{ $huruf }}"
    class="mt-3 h-5 w-5"
    @checked($correct === $huruf)
>

                <div class="w-8 pt-2 font-semibold">

                    {{ $huruf }}

                </div>

               <textarea
    rows="2"
    name="option_{{ strtolower($huruf) }}"
    class="flex-1 rounded-lg border-slate-300"
    placeholder="Pilihan {{ $huruf }}"
>{{ $value }}</textarea>

            </div>

        @endforeach

    </div>

</x-ui.card>

    {{-- Pembahasan --}}
    <x-ui.card>

        <div class="border-b border-slate-200 px-6 py-4">

            <h3 class="font-semibold">

                Pembahasan

            </h3>

        </div>

        <div class="p-6">

            <textarea
                name="discussion"
                rows="6"
                class="w-full rounded-lg border-slate-300">{{ old('discussion',$question->discussion ?? '') }}</textarea>

        </div>

    </x-ui.card>

    {{-- Status --}}
    <x-ui.card>

        <div class="grid grid-cols-1 gap-6 p-6 md:grid-cols-2">

            <div>

                <label class="mb-2 block text-sm font-medium">

                    Status

                </label>

                <select
                    name="is_active"
                    class="w-full rounded-lg border-slate-300">

                    <option value="1">Aktif</option>

                    <option value="0">Nonaktif</option>

                </select>

            </div>

        </div>

    </x-ui.card>

</div>

<div class="mt-8 flex items-center justify-end gap-3">

    <x-ui.button
        type="button"
        variant="secondary"
        onclick="history.back()">

        <x-heroicon-o-arrow-left class="h-5 w-5"/>

        Batal

    </x-ui.button>

    <x-ui.button>

        <x-heroicon-o-check class="h-5 w-5"/>

        Simpan

    </x-ui.button>

</div>