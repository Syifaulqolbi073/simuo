@props([
    'variant' => 'primary',
    'type' => 'submit',
])

@php

$classes = match ($variant) {

    'primary'   => 'bg-emerald-600 hover:bg-emerald-700 text-white',

    'secondary' => 'bg-slate-200 hover:bg-slate-300 text-slate-800',

    'success'   => 'bg-green-600 hover:bg-green-700 text-white',

    'danger'    => 'bg-red-600 hover:bg-red-700 text-white',

    'warning'   => 'bg-amber-500 hover:bg-amber-600 text-white',

    default     => 'bg-emerald-600 hover:bg-emerald-700 text-white',

};

@endphp

<button
    type="{{ $type }}"
    {{ $attributes->merge([
        'class' => "inline-flex items-center justify-center gap-2 rounded-xl px-4 py-2 text-sm font-semibold transition duration-200 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 {$classes}"
    ]) }}>

    {{ $slot }}

</button>