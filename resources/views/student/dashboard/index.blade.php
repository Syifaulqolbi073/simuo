@extends('layouts.app')

@section('title', 'Dashboard Siswa')

@section('content')

<div class="space-y-6">

    <x-layout.page-header
        title="Dashboard Siswa"
        subtitle="Daftar ujian yang tersedia"/>

    <x-ui.card>

        @if($examSchedules->isEmpty())

            <p class="text-slate-500">

                Belum ada ujian yang tersedia.

            </p>

        @else

            <div class="space-y-4">

                @foreach($examSchedules as $exam)

                    <div class="rounded-xl border p-4">

                        <h3 class="font-bold">

                            {{ $exam->title }}

                        </h3>

                        <p class="text-sm text-slate-500">

                            {{ $exam->teacherSubject->subject->name }}
                            •
                            {{ $exam->teacherSubject->classroom->name }}

                        </p>

                        <div class="mt-4">

                            <a
                                href="{{ route('student.exams.token', $exam) }}">

                                <x-ui.button>

                                    Masuk Ujian

                                </x-ui.button>

                            </a>

                        </div>

                    </div>

                @endforeach

            </div>

        @endif

    </x-ui.card>

</div>

@endsection