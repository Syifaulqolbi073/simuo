@csrf

<div class="space-y-8">

    @include('admin.question-banks.questions.partials.header')

    {{-- editor --}}
    {{-- options --}}
    {{-- discussion --}}
    {{-- footer --}}

</div>

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
                $option = isset($question)
                    ? $question->option($huruf)
                    : null;
            @endphp

            <div class="flex items-start gap-4">

                <input
                    type="radio"
                    name="correct_answer"
                    value="{{ $huruf }}"
                    class="mt-3 h-5 w-5"

                    @checked(
                        old(
                            'correct_answer',
                            optional($question ?? null)
                                ->correctOption()?->option_key
                        ) == $huruf
                    )
                >

                <div class="w-8 pt-2 font-semibold">

                    {{ $huruf }}

                </div>

                <textarea
                    rows="2"
                    name="option_{{ strtolower($huruf) }}"
                    class="flex-1 rounded-lg border-slate-300"
                    placeholder="Pilihan {{ $huruf }}">{{ old(
                        'option_'.strtolower($huruf),
                        $option?->option_text
                    ) }}</textarea>

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