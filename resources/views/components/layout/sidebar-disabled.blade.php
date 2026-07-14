@props([
    'icon',
    'label',
])

<div
    class="mb-1 flex cursor-not-allowed items-center gap-3 rounded-xl px-4 py-3 text-slate-500">

    <x-dynamic-component
        :component="'heroicon-o-'.$icon"
        class="h-5 w-5"/>

    <span>{{ $label }}</span>

</div>