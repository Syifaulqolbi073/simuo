@extends('layouts.app')
@section('title','Tambah Tahun Pelajaran')
@section('content')

<div class="max-w-3xl mx-auto">

    <h1 class="text-2xl font-bold mb-6">
        Tambah Tahun Pelajaran
    </h1>

    <div class="bg-white rounded-xl shadow p-6">

        <form
            action="{{ route('academic-years.store') }}"
            method="POST">

            @include('admin.academic-years.partials.form')

        </form>

    </div>

</div>

@endsection