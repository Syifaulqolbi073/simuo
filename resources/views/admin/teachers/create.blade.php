@extends('layouts.app')

@section('title', 'Tambah Guru')

@section('content')

<div class="max-w-4xl mx-auto">

    <h1 class="mb-6 text-2xl font-bold">
        Tambah Guru
    </h1>

    <x-ui.card>

        <form
            action="{{ route('teachers.store') }}"
            method="POST">

            @include('admin.teachers.partials.form')

        </form>

    </x-ui.card>

</div>

@endsection