<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'SIMUO') }}</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-slate-100">

<div class="flex min-h-screen">

    {{-- Sidebar --}}
    <x-layout.sidebar />

    {{-- Content --}}
    <div class="flex-1">

        <x-layout.navbar />

        <main class="p-6">

            @yield('content')

        </main>

    </div>

</div>

</body>
</html>