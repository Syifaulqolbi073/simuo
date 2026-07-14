@extends('layouts.app')

@section('title','Edit Jadwal Ujian')

@section('content')

<div class="max-w-6xl mx-auto">

    <h1 class="mb-6 text-2xl font-bold">
        Edit Jadwal Ujian
    </h1>

    <x-ui.card>

        <form
            action="{{ route('exam-schedules.update',$examSchedule) }}"
            method="POST">

            @method('PUT')

            @include('admin.exam-schedules.partials.form')

        </form>

    </x-ui.card>

</div>

@endsection