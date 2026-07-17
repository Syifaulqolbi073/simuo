@extends('layouts.app')

@section('title', 'Masuk Ujian')

@section('content')

<div class="mx-auto max-w-xl">

    <x-ui.card>

        <div class="text-center">

            <h1 class="text-2xl font-bold">

                {{ $examSchedule->title }}

            </h1>

            <p class="mt-2 text-slate-500">

                {{ $examSchedule->teacherSubject->subject->name }}

            </p>

            <p class="text-sm text-slate-500">

                {{ $examSchedule->teacherSubject->classroom->name }}

            </p>

        </div>

        <form
            action="{{ route('student.exams.start', $examSchedule) }}"
            method="POST"
            class="mt-8 space-y-6">

            @csrf

            @if($examSchedule->token_required)

                <div>

                    <label class="mb-2 block font-medium">

                        Token Ujian

                    </label>

                    <input
                        type="text"
                        name="token"
                        autofocus
                        class="w-full rounded-lg border-gray-300">

                    @error('token')

                        <p class="mt-2 text-sm text-red-600">

                            {{ $message }}

                        </p>

                    @enderror

                </div>

            @endif

            <div class="flex justify-end">

                <x-ui.button>

                    Mulai Ujian

                </x-ui.button>

            </div>

        </form>

    </x-ui.card>

</div>

@endsection