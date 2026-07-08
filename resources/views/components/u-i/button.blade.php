@props([
    'type' => 'button',
    'color' => 'primary',
])

@php

$colors = [

'primary' => 'bg-green-600 hover:bg-green-700 text-white',

'secondary' => 'bg-slate-700 hover:bg-slate-800 text-white',

'danger' => 'bg-red-600 hover:bg-red-700 text-white',

'warning' => 'bg-yellow-500 hover:bg-yellow-600 text-white',

];

@endphp

<button
type="{{ $type }}"
{{ $attributes->merge([
'class'=>"px-4 py-2 rounded-xl transition shadow font-medium ".$colors[$color]
]) }}>

{{ $slot }}

</button>