@props([
'type'=>'success'
])

@php
$class = match($type){
'success'=>'bg-green-100 text-green-700',
'danger'=>'bg-red-100 text-red-700',
'warning'=>'bg-yellow-100 text-yellow-700',
'default'=>'bg-slate-100 text-slate-700',
};
@endphp

<span class="rounded-full px-3 py-1 text-xs font-semibold {{ $class }}">
    {{ $slot }}
</span>