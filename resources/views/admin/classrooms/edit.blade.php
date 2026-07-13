@extends('layouts.app')

@section('title','Edit Kelas')

@section('content')

<div class="max-w-3xl mx-auto">

    <div class="mb-6">

        <h1 class="text-2xl font-bold text-slate-800">
            Edit Kelas
        </h1>

        <p class="mt-1 text-sm text-slate-500">
            Perbarui data Kelas.
        </p>

    </div>

    <x-ui.card>

        <form
            action="{{ route('classrooms.update',$classroom) }}"
            method="POST">

            @csrf
            @method('PUT')

            @include('admin.classrooms.partials.form')

        </form>

    </x-ui.card>

</div>

@endsection