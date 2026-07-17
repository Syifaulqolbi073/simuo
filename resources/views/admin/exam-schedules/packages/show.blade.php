@extends('layouts.app')

@section('title','Preview Paket')

@section('content')

<div class="space-y-6">

    @include(
        'admin.exam-schedules.packages.partials.header'
    )

    @foreach($package->questions as $question)

        @include(
            'admin.exam-schedules.packages.partials.question'
        )

    @endforeach

    @include(
        'admin.exam-schedules.packages.partials.footer'
    )

</div>

@endsection