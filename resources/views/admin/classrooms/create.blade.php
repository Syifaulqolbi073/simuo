@extends('layouts.app')

@section('title','Tambah Kelas')

@section('content')

<div class="max-w-3xl mx-auto">

    <div class="mb-6">

       <h1 class="text-2xl font-bold text-slate-800">
    Tambah Kelas
</h1>
        <p class="mt-1 text-sm text-slate-500">
            Tambahkan data Tingkat baru.
        </p>

    </div>

    <x-ui.card>

        <form
            action="{{ route('classrooms.store') }}"
            method="POST">

            @include('admin.classrooms.partials.form')
        </form>

    </x-ui.card>

</div>

@endsection