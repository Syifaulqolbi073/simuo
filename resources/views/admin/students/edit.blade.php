@extends('layouts.app')

@section('title', 'Edit Siswa')

@section('content')

<div class="max-w-5xl mx-auto">

    <h1 class="mb-6 text-2xl font-bold">
        Edit Siswa
    </h1>

    <x-ui.card>

        <form
            action="{{ route('students.update', $student) }}"
            method="POST">

            @csrf
            @method('PUT')

            @include('admin.students.partials.form')

        </form>

    </x-ui.card>

</div>

@endsection