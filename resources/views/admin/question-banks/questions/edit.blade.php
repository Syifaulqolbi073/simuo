@extends('layouts.app')

@section('title', 'Edit Soal')

@section('content')

<div class="space-y-6">

    <x-layout.page-header
        title="Edit Soal"
        :subtitle="$questionBank->title">

        <a href="{{ route('question-banks.questions.index', $questionBank) }}">

            <x-ui.button variant="secondary">

                Kembali

            </x-ui.button>

        </a>

    </x-layout.page-header>

    <x-ui.card>

        <form
            action="{{ route('question-banks.questions.update', [$questionBank, $question]) }}"
            method="POST">

            @csrf
            @method('PUT')

            @include('admin.question-banks.questions._form')

        </form>

    </x-ui.card>

</div>

@endsection