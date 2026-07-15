<x-ui.card>

    <div class="p-6 space-y-6">

        {{-- Nomor Soal --}}
        <div class="flex items-center justify-between">

            <h2 class="text-lg font-bold">

                Soal

            </h2>

            <div class="flex gap-2">

                <x-ui.badge type="info">
                    {{ $question->question_type }}
                </x-ui.badge>

                <x-ui.badge type="success">
                    {{ $question->difficulty }}
                </x-ui.badge>

            </div>

        </div>

        {{-- Isi Soal --}}
        <div class="prose max-w-none">

            {!! $question->question_text !!}

        </div>

        {{-- Pilihan Jawaban --}}
        @if($question->question_type === 'MCQ')

            <div class="space-y-3">

                @foreach($question->options as $option)

                    <label
                        class="flex items-start gap-3 rounded-lg border border-slate-200 p-3">

                        <input
                            type="radio"
                            disabled>

                        <div>

                            <strong>

                                {{ $option->option_key }}.

                            </strong>

                            {!! $option->option_text !!}

                        </div>

                    </label>

                @endforeach

            </div>

        @endif

        {{-- Pembahasan --}}
        @if($question->discussion)

            <div class="rounded-lg bg-emerald-50 p-4">

                <div class="mb-2 font-semibold">

                    Pembahasan

                </div>

                {!! $question->discussion !!}

            </div>

        @endif

    </div>

</x-ui.card>