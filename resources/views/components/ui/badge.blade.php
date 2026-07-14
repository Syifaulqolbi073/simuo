@props([
    'type' => 'success'
])

@php

$class = match($type) {

    'success' => 'bg-green-100 text-green-700',

    'danger'  => 'bg-red-100 text-red-700',

    'warning' => 'bg-yellow-100 text-yellow-700',

    'info'    => 'bg-blue-100 text-blue-700',

    'secondary' => 'bg-slate-100 text-slate-700',

    default   => 'bg-slate-100 text-slate-700',

};

@endphp

<span {{ $attributes->merge([
    'class' => "inline-flex items-center rounded-full px-2 py-1 text-xs font-medium $class"
]) }}>
    {{ $slot }}
</span>