@extends('layouts.app')

@section('title', 'Tambah Penempatan Siswa')

@section('content')

<div class="max-w-5xl mx-auto">

    <h1 class="mb-6 text-2xl font-bold">
        Tambah Penempatan Siswa
    </h1>

    <x-ui.card>

        <form
            action="{{ route('student-classrooms.store') }}"
            method="POST">

            @include('admin.student-classrooms.partials.form')

        </form>

    </x-ui.card>

</div>

@endsection