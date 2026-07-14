@props([
    'href',
])

<a
    href="{{ $href }}"
    {{ $attributes->merge([
        'class' => 'flex items-center gap-3 px-4 py-2 text-sm text-slate-700 transition hover:bg-slate-100'
    ]) }}>

    {{ $slot }}

</a>