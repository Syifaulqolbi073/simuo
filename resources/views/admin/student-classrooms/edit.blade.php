@extends('layouts.app')

@section('title', 'Edit Penempatan Siswa')

@section('content')

<div class="max-w-5xl mx-auto">

    <h1 class="mb-6 text-2xl font-bold">
        Edit Penempatan Siswa
    </h1>

    <x-ui.card>

        <form
            action="{{ route('student-classrooms.update', $studentClassroom) }}"
            method="POST">

            @csrf
            @method('PUT')

            @include('admin.student-classrooms.partials.form')

        </form>

    </x-ui.card>

</div>

@endsection