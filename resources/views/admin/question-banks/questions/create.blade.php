@extends('layouts.app')

@section('title', 'Tambah Soal')

@section('content')

<div class="space-y-6">

    <x-layout.page-header
        title="Tambah Soal"
        :subtitle="$questionBank->title">

        <a href="{{ route('question-banks.questions.index', $questionBank) }}">

            <x-ui.button variant="secondary">

                Kembali

            </x-ui.button>

        </a>

    </x-layout.page-header>

    <x-ui.card>

        <form
            action="{{ route('question-banks.questions.store', $questionBank) }}"
            method="POST">

            @include('admin.question-banks.questions._form')

        </form>

    </x-ui.card>

</div>

@endsection