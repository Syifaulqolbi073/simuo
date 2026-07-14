@extends('layouts.app')

@section('title','Edit Bank Soal')

@section('content')

<x-layout.page-header
    title="Edit Bank Soal"
    subtitle="Perbarui data bank soal"/>

<x-ui.card>

    <form
        action="{{ route('question-banks.update',$questionBank) }}"
        method="POST">

        @csrf

        @method('PUT')

        @include('admin.question-banks._form')

    </form>

</x-ui.card>

@endsection