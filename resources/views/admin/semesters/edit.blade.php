@extends('layouts.app')

@section('title','Edit Semester')

@section('content')

<div class="max-w-3xl mx-auto">

    <div class="mb-6">

        <h1 class="text-2xl font-bold text-slate-800">
            Edit Semester
        </h1>

        <p class="mt-1 text-sm text-slate-500">
            Perbarui data Semester.
        </p>

    </div>

    <x-ui.card>

        <form
            action="{{ route('semesters.update', $semester) }}"
            method="POST">

            @csrf
            @method('PUT')

            @include('admin.semesters.partials.form')

        </form>

    </x-ui.card>

</div>

@endsection