@props([
    'type' => 'primary',
])

@php
$classes = match($type) {
    'primary' => 'bg-emerald-600 hover:bg-emerald-700 text-white',
    'secondary' => 'bg-slate-200 hover:bg-slate-300 text-slate-800',
    'danger' => 'bg-red-600 hover:bg-red-700 text-white',
    default => 'bg-emerald-600 hover:bg-emerald-700 text-white',
};
@endphp

<button {{ $attributes->merge([
'class'=>"inline-flex items-center rounded-xl px-4 py-2 text-sm font-semibold transition {$classes}"
]) }}>
    {{ $slot }}
</button>