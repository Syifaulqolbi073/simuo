@extends('layouts.app')

@section('title', 'Edit Wali Kelas')

@section('content')

<div class="max-w-4xl mx-auto">

    <h1 class="mb-6 text-2xl font-bold">
        Edit Wali Kelas
    </h1>

    <x-ui.card>

        <form
            action="{{ route('homeroom-teachers.update',$homeroomTeacher) }}"
            method="POST">

            @method('PUT')

            @include('admin.homeroom-teachers.partials.form')

        </form>

    </x-ui.card>

</div>

@endsection