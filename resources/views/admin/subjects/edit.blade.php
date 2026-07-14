@extends('layouts.app')

@section('title','Edit Mata Pelajaran')

@section('content')

<div class="max-w-3xl mx-auto">

    <h1 class="text-2xl font-bold mb-6">
        Edit Mata Pelajaran
    </h1>

    <x-ui.card>

        <form
            action="{{ route('subjects.update',$subject) }}"
            method="POST">

            @csrf
            @method('PUT')

            @include('admin.subjects.partials.form')

        </form>

    </x-ui.card>

</div>

@endsection