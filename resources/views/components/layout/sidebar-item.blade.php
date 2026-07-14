@props([
    'route',
    'icon',
    'label',
])

@php
    $routePattern = preg_replace('/\.index$/', '.*', $route);
@endphp

<a href="{{ route($route) }}"
   class="mb-1 flex items-center gap-3 rounded-xl px-4 py-3 transition
   {{ request()->routeIs($routePattern)
        ? 'bg-emerald-600 text-white shadow'
        : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">

    <x-dynamic-component
        :component="'heroicon-o-'.$icon"
        class="h-5 w-5" />

    <span>{{ $label }}</span>

</a>