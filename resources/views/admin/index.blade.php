@extends('layouts.app')

@section('content')

<div class="grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-4">

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