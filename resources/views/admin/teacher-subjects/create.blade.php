@extends('layouts.app')

@section('title', 'Tambah Guru Mengajar')

@section('content')

<div class="max-w-4xl mx-auto">

    <h1 class="mb-6 text-2xl font-bold">
        Tambah Guru Mengajar
    </h1>

    <x-ui.card>

        <form
            action="{{ route('teacher-subjects.store') }}"
            method="POST">

            @include('admin.teacher-subjects.partials.form')

        </form>

    </x-ui.card>

</div>

@endsection