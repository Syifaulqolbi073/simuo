@props([
    'color' => 'primary',
    'type' => 'button'
])

@php
$colors = [
    'primary' => 'bg-green-600 hover:bg-green-700 text-white',
    'secondary' => 'bg-slate-600 hover:bg-slate-700 text-white',
    'danger' => 'bg-red-600 hover:bg-red-700 text-white',
    'warning' => 'bg-yellow-500 hover:bg-yellow-600 text-white',
];
@endphp

<button
    type="{{ $type }}"
    {{ $attributes->merge([
        'class' => 'px-4 py-2 rounded-xl font-medium transition '.$colors[$color]
    ]) }}>
    {{ $slot }}
</button>