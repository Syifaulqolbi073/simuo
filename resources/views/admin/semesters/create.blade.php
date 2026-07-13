@extends('layouts.app')

@section('title','Tambah Semester')

@section('content')

<div class="max-w-3xl mx-auto">

    <div class="mb-6">

        <h1 class="text-2xl font-bold text-slate-800">
            Tambah Semester
        </h1>

        <p class="mt-1 text-sm text-slate-500">
            Tambahkan data Semester baru.
        </p>

    </div>

    <x-ui.card>

        <form
            action="{{ route('semesters.store') }}"
            method="POST">

            
@include('admin.semesters.partials.form')
        </form>

    </x-ui.card>

</div>

@endsection