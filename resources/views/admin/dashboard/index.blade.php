@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

{{-- Welcome Card --}}
<div class="mb-6 rounded-2xl bg-gradient-to-r from-emerald-600 to-emerald-500 p-6 text-white shadow-lg">

    <h1 class="text-3xl font-bold">
        Selamat Datang, {{ auth()->user()->name }}
    </h1>

    <p class="mt-2 text-emerald-100">
        Sistem Ujian Online (SIMUO)
        MTs Al Fattah Juwana
    </p>

</div>

@php

use App\Models\AcademicYear;
use App\Models\Semester;
use App\Models\Grade;
use App\Models\Classroom;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Subject;
use App\Models\TeacherSubject;
use App\Models\ExamType;
use App\Models\ExamSchedule;

@endphp

{{-- Statistik --}}
<div class="grid grid-cols-2 gap-4 xl:grid-cols-4">

    <x-ui.stat-card
        title="Tahun Pelajaran"
        :value="AcademicYear::count()" />

    <x-ui.stat-card
        title="Semester"
        :value="Semester::count()" />

    <x-ui.stat-card
        title="Guru"
        :value="Teacher::count()" />

    <x-ui.stat-card
        title="Siswa"
        :value="Student::count()" />

    <x-ui.stat-card
        title="Tingkat"
        :value="Grade::count()" />

    <x-ui.stat-card
        title="Kelas"
        :value="Classroom::count()" />

    <x-ui.stat-card
        title="Mata Pelajaran"
        :value="Subject::count()" />

    <x-ui.stat-card
        title="Guru Mengajar"
        :value="TeacherSubject::count()" />

    <x-ui.stat-card
        title="Jenis Ujian"
        :value="ExamType::count()" />

    <x-ui.stat-card
        title="Jadwal Ujian"
        :value="ExamSchedule::count()" />

</div>

{{-- Jadwal Ujian Terdekat --}}
<div class="mt-8">

    <div class="mb-4 flex items-center justify-between">

        <h2 class="text-xl font-bold text-slate-800">

            Jadwal Ujian Terdekat

        </h2>

    </div>
    
    @php

$upcomingExams = ExamSchedule::with([
    'teacherSubject.teacher',
    'teacherSubject.subject',
    'teacherSubject.classroom',
    'examType',
])
->orderBy('exam_date')
->orderBy('start_time')
->take(10)
->get();

@endphp

<div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">

    <table class="min-w-full">

        <thead class="bg-slate-100">

            <tr>

                <th class="px-4 py-3 text-left text-sm font-semibold">
                    Judul
                </th>

                <th class="px-4 py-3 text-left text-sm font-semibold">
                    Guru
                </th>

                <th class="px-4 py-3 text-left text-sm font-semibold">
                    Kelas
                </th>

                <th class="px-4 py-3 text-left text-sm font-semibold">
                    Jenis
                </th>

                <th class="px-4 py-3 text-left text-sm font-semibold">
                    Tanggal
                </th>

                <th class="px-4 py-3 text-left text-sm font-semibold">
                    Jam
                </th>

                <th class="px-4 py-3 text-center text-sm font-semibold">
                    Status
                </th>

            </tr>

        </thead>

        <tbody>

            @forelse($upcomingExams as $exam)

                <tr class="border-t">

                    <td class="px-4 py-3">

                        <div class="font-semibold">

                            {{ $exam->title }}

                        </div>

                        <div class="text-sm text-slate-500">

                            {{ $exam->teacherSubject->subject->name }}

                        </div>

                    </td>

                    <td class="px-4 py-3">

                        {{ $exam->teacherSubject->teacher->name }}

                    </td>

                    <td class="px-4 py-3">

                        {{ $exam->teacherSubject->classroom->name }}

                    </td>

                    <td class="px-4 py-3">

                        {{ $exam->examType->code }}

                    </td>

                    <td class="px-4 py-3">

                        {{ $exam->exam_date->format('d M Y') }}

                    </td>

                    <td class="px-4 py-3">

                        {{ \Carbon\Carbon::parse($exam->start_time)->format('H:i') }}

                        <br>

                        <small class="text-slate-500">

                            {{ $exam->duration }} menit

                        </small>

                    </td>

                    <td class="px-4 py-3 text-center">

                        @switch($exam->status)

                            @case('Draft')
                                <span class="rounded bg-yellow-100 px-2 py-1 text-xs font-medium text-yellow-800">
                                    Draft
                                </span>
                                @break

                            @case('Terjadwal')
                                <span class="rounded bg-blue-100 px-2 py-1 text-xs font-medium text-blue-800">
                                    Terjadwal
                                </span>
                                @break

                            @case('Berlangsung')
                                <span class="rounded bg-green-100 px-2 py-1 text-xs font-medium text-green-800">
                                    Berlangsung
                                </span>
                                @break

                            @case('Selesai')
                                <span class="rounded bg-slate-200 px-2 py-1 text-xs font-medium text-slate-700">
                                    Selesai
                                </span>
                                @break

                            @default
                                <span class="rounded bg-red-100 px-2 py-1 text-xs font-medium text-red-700">
                                    Ditutup
                                </span>

                        @endswitch

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="7" class="px-4 py-10 text-center text-slate-500">

                        Belum ada jadwal ujian.

                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

</div>

<div class="mt-8">
    
    {{-- Informasi Sistem --}}
<div class="grid grid-cols-1 gap-6 lg:grid-cols-2">

    {{-- Tahun Pelajaran Aktif --}}
    <div class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm">

        <h3 class="mb-4 text-lg font-semibold text-slate-800">
            Informasi Akademik
        </h3>

        @php

            $academicYear = AcademicYear::where('is_active', true)->first();

            $semester = Semester::where('is_active', true)->first();

        @endphp

        <div class="space-y-4">

            <div>

                <p class="text-sm text-slate-500">
                    Tahun Pelajaran Aktif
                </p>

                <p class="font-semibold text-slate-800">
                    {{ $academicYear?->name ?? '-' }}
                </p>

            </div>

            <div>

                <p class="text-sm text-slate-500">
                    Semester Aktif
                </p>

                <p class="font-semibold text-slate-800">
                    {{ $semester?->name ?? '-' }}
                </p>

            </div>

            <div>

                <p class="text-sm text-slate-500">
                    Total Jadwal Ujian
                </p>

                <p class="font-semibold text-slate-800">
                    {{ ExamSchedule::count() }}
                </p>

            </div>

        </div>

    </div>

    {{-- Aktivitas --}}
    <div class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm">

        <h3 class="mb-4 text-lg font-semibold text-slate-800">
            Aktivitas Terbaru
        </h3>

        <div class="rounded-lg border border-dashed border-slate-300 p-8 text-center">

            <p class="text-slate-500">
                Modul aktivitas akan tersedia pada versi berikutnya.
            </p>

            <p class="mt-2 text-sm text-slate-400">
                Aktivitas operator, guru, ujian, dan peserta akan ditampilkan di sini.
            </p>

        </div>

    </div>

</div>

{{-- Footer --}}
<div class="mt-8 rounded-xl bg-white p-5 text-center text-sm text-slate-500 shadow-sm">

    <p>
        Sistem Ujian Online (SIMUO)
    </p>

    <p class="mt-1">
        MTs Al Fattah Juwana
    </p>

    <p class="mt-1">
        Version 1.0.0
    </p>

</div>

@endsection