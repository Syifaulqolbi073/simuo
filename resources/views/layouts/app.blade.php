<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title','SIMUO')</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-slate-100" x-data="{ sidebar:false }">
    
    @if(session('success'))
    <div
        id="toast-message"
        data-type="success"
        data-message="{{ session('success') }}">
    </div>
@endif

@if(session('error'))
    <div
        id="toast-message"
        data-type="error"
        data-message="{{ session('error') }}">
    </div>
@endif

@if(session('warning'))
    <div
        id="toast-message"
        data-type="warning"
        data-message="{{ session('warning') }}">
    </div>
@endif

@if(session('info'))
    <div
        id="toast-message"
        data-type="info"
        data-message="{{ session('info') }}">
    </div>
@endif
    
    
    
<div class="min-h-screen flex">

    {{-- Sidebar Desktop --}}
    <div class="hidden lg:block">
        <x-layout.sidebar />
    </div>

    {{-- Sidebar Mobile --}}
    <div
        x-show="sidebar"
        x-transition
        class="fixed inset-0 z-50 flex lg:hidden">

        <div class="w-72">
            <x-layout.sidebar />
        </div>

        <div
            class="flex-1 bg-black/50"
            @click="sidebar=false">
        </div>

    </div>

    <div class="flex flex-1 flex-col">

        <x-layout.navbar />

        <main class="flex-1 p-4 lg:p-8">

            <div class="mx-auto max-w-7xl">

                @yield('content')

            </div>

        </main>

    </div>

</div>

</body>
</html>