@extends('layouts.app')

@section('title', 'Tambah Wali Kelas')

@section('content')

<div class="max-w-4xl mx-auto">

    <h1 class="mb-6 text-2xl font-bold">
        Tambah Wali Kelas
    </h1>

    <x-ui.card>

        <form
            action="{{ route('homeroom-teachers.store') }}"
            method="POST">

            @include('admin.homeroom-teachers.partials.form')

        </form>

    </x-ui.card>

</div>

@endsection