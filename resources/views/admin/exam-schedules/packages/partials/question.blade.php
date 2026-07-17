<x-ui.card>

    {{-- Header Soal --}}
    <div class="flex items-center justify-between border-b border-slate-200 pb-4">

        <div class="flex items-center gap-3">

            <div
                class="flex h-10 w-10 items-center justify-center rounded-full bg-blue-600 text-sm font-bold text-white">

                {{ $loop->iteration }}

            </div>

            <div>

                <p class="font-semibold">

                    Soal {{ $loop->iteration }}

                </p>

                <p class="text-xs text-slate-500">

                    Bobot :
                    {{ $question->question->score }}

                </p>

            </div>

        </div>

        @php
            $badge = match($question->question->difficulty) {
                'Mudah' => 'success',
                'Sedang' => 'warning',
                'Sulit' => 'danger',
                default => 'secondary',
            };
        @endphp

        <x-ui.badge :type="$badge">

            {{ $question->question->difficulty }}

        </x-ui.badge>

    </div>

    {{-- Isi Soal --}}
    <div class="prose mt-6 max-w-none">

        {!! $question->question->question_text !!}

    </div>

    {{-- Media --}}
    @if($question->question->media->count())

        <div class="mt-6 space-y-4">

            @foreach($question->question->media as $media)

                @switch($media->media_type)

                    @case('IMAGE')

                        <img
                            src="{{ asset('storage/'.$media->file_path) }}"
                            class="max-w-xl rounded-xl border">

                        @break

                    @case('AUDIO')

                        <audio controls class="w-full">

                            <source
                                src="{{ asset('storage/'.$media->file_path) }}">

                        </audio>

                        @break

                    @case('VIDEO')

                        <video
                            controls
                            class="max-w-xl rounded-xl">

                            <source
                                src="{{ asset('storage/'.$media->file_path) }}">

                        </video>

                        @break

                    @case('DOCUMENT')

                        <a
                            href="{{ asset('storage/'.$media->file_path) }}"
                            target="_blank"
                            class="inline-flex items-center gap-2 rounded-lg bg-blue-100 px-4 py-2 text-blue-700">

                            <x-heroicon-o-document-text class="h-5 w-5"/>

                            <span>Lihat Dokumen</span>

                        </a>

                        @break

                @endswitch

            @endforeach

        </div>

    @endif

    {{-- Pilihan Jawaban --}}
    <div class="mt-8 space-y-3">

        @foreach($question->question->options as $option)

            <div
                class="rounded-xl border border-slate-200 p-4 transition hover:border-blue-500 hover:bg-blue-50">

                <div class="flex items-start gap-3">

                    <div
                        class="flex h-8 w-8 items-center justify-center rounded-full bg-slate-200 font-bold">

                        {{ $option->option_key }}

                    </div>

                    <div class="flex-1">

                        {!! $option->option_text !!}

                    </div>

                </div>

            </div>

        @endforeach

    </div>

</x-ui.card>