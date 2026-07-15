@extends('layouts.app')

@section('title', 'Preview Soal')

@section('content')

<div class="space-y-6">

    <x-layout.page-header
        title="Preview Soal"
        :subtitle="$questionBank->title">

        <a href="{{ route('question-banks.questions.index', $questionBank) }}">
            <x-ui.button variant="secondary">
                Kembali
            </x-ui.button>
        </a>

    </x-layout.page-header>

    <x-question.preview
        :question="$question" />

</div>

@endsection