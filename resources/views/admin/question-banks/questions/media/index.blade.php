@extends('layouts.app')

@section('title', 'Media Soal')

@section('content')

<div class="space-y-6">

    <x-layout.page-header
        title="Kelola Media"
        :subtitle="$question->questionBank->title">

        <a
            href="{{ route('question-banks.questions.index', $questionBank) }}">

            <x-ui.button variant="secondary">

                Kembali

            </x-ui.button>

        </a>

    </x-layout.page-header>

    <x-media.upload-card
    :questionBank="$questionBank"
    :question="$question" />

    @if($media->isEmpty())

        <x-media.empty />

    @else

        <div class="space-y-3">

            @foreach($media as $item)

                <x-media.media-card
                    :media="$item" />

            @endforeach

        </div>

    @endif

</div>

@endsection
