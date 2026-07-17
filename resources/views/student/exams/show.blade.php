@extends('layouts.app')

@section('title', 'CBT Player')

@section('content')

<div
    id="cbt-player"
    class="space-y-6"
    data-attempt="{{ $attempt->id }}">

    <x-layout.page-header
        :title="$attempt->examSchedule->title"
        subtitle="CBT Player"/>

    <x-ui.card>

        <div class="grid grid-cols-1 gap-6 lg:grid-cols-4">

            {{-- Sidebar --}}
            <div class="lg:col-span-1">

                <h3 class="mb-4 font-semibold">

                    Nomor Soal

                </h3>

                <div class="grid grid-cols-5 gap-2">

                    @foreach($attempt->answers as $answer)

                        <button
                            class="rounded-lg border p-2 hover:bg-blue-50">

                            {{ $loop->iteration }}

                        </button>

                    @endforeach

                </div>

            </div>

{{-- Area Soal --}}
<div class="lg:col-span-3">

    <div class="flex items-center justify-between mb-6">

        <h2 class="text-xl font-bold">

            Soal {{ $current }}

        </h2>

        <span class="text-sm text-slate-500">

            {{ $current }} / {{ $answers->count() }}

        </span>

    </div>

    <div class="prose max-w-none">

        {!! $answer->question->question_text !!}

    </div>

    <div class="mt-8 space-y-3">

        @foreach($answer->question->options as $option)

            <label
                class="flex items-start gap-3 rounded-lg border p-4 hover:bg-slate-50 cursor-pointer">

                <input
                    type="radio"
                    name="answer"
                    value="{{ $option->id }}"
                    {{ $answer->answer == $option->id ? 'checked' : '' }}>

                <div>

<strong>

    {{ $option->option_key }}.

</strong>

{!! $option->option_text !!}

                </div>

            </label>

        @endforeach

    </div>

    <div class="mt-8 flex justify-between">

        @if($current > 1)

            <a
                href="{{ route('student.exams.show', [$attempt, 'q' => $current - 1]) }}">

                <x-ui.button>

                    ← Sebelumnya

                </x-ui.button>

            </a>

        @else

            <div></div>

        @endif

        @if($current < $answers->count())

            <a
                href="{{ route('student.exams.show', [$attempt, 'q' => $current + 1]) }}">

                <x-ui.button>

                    Berikutnya →

                </x-ui.button>

            </a>

        @endif

    </div>

</div>

        </div>

    </x-ui.card>

</div>

@endsection