@extends('layouts.app')

@section('title','Dashboard')

@section('content')

{{-- Welcome Card --}}
<div class="mb-6 rounded-2xl bg-gradient-to-r from-emerald-600 to-emerald-500 p-6 text-white shadow-lg">

    <h1 class="text-2xl font-bold">
        Selamat Datang, {{ auth()->user()->name }} 👋
    </h1>

    <p class="mt-2 text-emerald-100">
        Selamat datang di Sistem Ujian Online MTs Al Fattah Juwana.
    </p>

</div>

{{-- Statistik --}}
<div class="grid grid-cols-2 gap-4 lg:grid-cols-4">

    <x-ui.stat-card
        title="Guru"
        value="35" />

    <x-ui.stat-card
        title="Siswa"
        value="520" />

    <x-ui.stat-card
        title="Mapel"
        value="18" />

    <x-ui.stat-card
        title="Ujian"
        value="7" />

</div>

{{-- Quick Menu --}}
<div class="mt-8">

    <h2 class="mb-4 text-xl font-bold text-slate-800">
        Quick Menu
    </h2>

    <div class="grid grid-cols-2 gap-4 lg:grid-cols-4">

        <a href="{{ route('academic-years.create') }}"
           class="rounded-xl bg-white p-5 shadow hover:shadow-lg transition">

            <div class="text-3xl">📅</div>

            <h3 class="mt-3 font-semibold">
                Tahun Pelajaran
            </h3>

            <p class="text-sm text-slate-500">
                Tambah Tahun Pelajaran
            </p>

        </a>

        <a href="#"
           class="rounded-xl bg-white p-5 shadow hover:shadow-lg transition">

            <div class="text-3xl">📖</div>

            <h3 class="mt-3 font-semibold">
                Semester
            </h3>

            <p class="text-sm text-slate-500">
                Kelola Semester
            </p>

        </a>

        <a href="#"
           class="rounded-xl bg-white p-5 shadow hover:shadow-lg transition">

            <div class="text-3xl">👨‍🏫</div>

            <h3 class="mt-3 font-semibold">
                Guru
            </h3>

            <p class="text-sm text-slate-500">
                Data Guru
            </p>

        </a>

        <a href="#"
           class="rounded-xl bg-white p-5 shadow hover:shadow-lg transition">

            <div class="text-3xl">👨‍🎓</div>

            <h3 class="mt-3 font-semibold">
                Siswa
            </h3>

            <p class="text-sm text-slate-500">
                Data Siswa
            </p>

        </a>

    </div>

</div>

@endsection