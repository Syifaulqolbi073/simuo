@extends('layouts.app')

@section('content')

<div class="grid grid-cols-4 gap-6">

    <x-ui.stat-card
        title="Guru"
        value="35"
    />

    <x-ui.stat-card
        title="Siswa"
        value="520"
    />

    <x-ui.stat-card
        title="Mapel"
        value="18"
    />

    <x-ui.stat-card
        title="Ujian"
        value="7"
    />

</div>

@endsection