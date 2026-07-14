@extends('layouts.app')

@section('title', 'Edit Guru Mengajar')

@section('content')

<div class="max-w-4xl mx-auto">

    <h1 class="mb-6 text-2xl font-bold">
        Edit Guru Mengajar
    </h1>

    <x-ui.card>

        <form
            action="{{ route('teacher-subjects.update', $teacherSubject) }}"
            method="POST">

            @method('PUT')

            @include('admin.teacher-subjects.partials.form')

        </form>

    </x-ui.card>

</div>

@endsection