@extends('layouts.app')

@section('title','Tambah Jenis Ujian')

@section('content')

<div class="max-w-4xl mx-auto">

    <h1 class="mb-6 text-2xl font-bold">
        Tambah Jenis Ujian
    </h1>

    <x-ui.card>

        <form
            action="{{ route('exam-types.store') }}"
            method="POST">

            @include('admin.exam-types.partials.form')

        </form>

    </x-ui.card>

</div>

@endsection