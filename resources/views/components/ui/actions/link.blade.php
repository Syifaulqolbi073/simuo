@props([
    'href'
])

<a
    href="{{ $href }}"
    class="flex w-full items-center gap-3 px-4 py-3 text-sm text-slate-700 transition hover:bg-slate-100">

    {{ $slot }}

</a>