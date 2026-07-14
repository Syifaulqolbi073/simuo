@extends('layouts.app')

@section('title', 'Edit Guru')

@section('content')

<div class="max-w-4xl mx-auto">

    <h1 class="mb-6 text-2xl font-bold">
        Edit Guru
    </h1>

    <x-ui.card>

        <form
            action="{{ route('teachers.update', $teacher) }}"
            method="POST">

            @csrf
            @method('PUT')

            @include('admin.teachers.partials.form')

        </form>

    </x-ui.card>

</div>

@endsection