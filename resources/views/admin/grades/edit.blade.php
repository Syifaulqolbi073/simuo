@extends('layouts.app')

@section('title','Edit Tingkat')

@section('content')

<div class="max-w-3xl mx-auto">

    <div class="mb-6">

        <h1 class="text-2xl font-bold text-slate-800">
            Edit Tingkat
        </h1>

        <p class="mt-1 text-sm text-slate-500">
            Perbarui data Tingkat.
        </p>

    </div>

    <x-ui.card>

        <form
            action="{{ route('grades.update',$grade) }}"
            method="POST">

            @csrf
            @method('PUT')

            @include('admin.grades.partials.form')

        </form>

    </x-ui.card>

</div>

@endsection