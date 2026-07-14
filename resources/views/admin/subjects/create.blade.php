@extends('layouts.app')

@section('title','Tambah Mata Pelajaran')

@section('content')

<div class="max-w-3xl mx-auto">

    <h1 class="text-2xl font-bold mb-6">
        Tambah Mata Pelajaran
    </h1>

    <x-ui.card>

        <form
            action="{{ route('subjects.store') }}"
            method="POST">

            @include('admin.subjects.partials.form')

        </form>

    </x-ui.card>

</div>

@endsection