@extends('layouts.app')

@section('title','Tambah Bank Soal')

@section('content')

<x-layout.page-header
    title="Tambah Bank Soal"
    subtitle="Membuat bank soal baru"/>

<x-ui.card>

    <form
        action="{{ route('question-banks.store') }}"
        method="POST">

        @include('admin.question-banks._form')

    </form>

</x-ui.card>

@endsection