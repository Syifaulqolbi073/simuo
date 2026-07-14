@props([
    'title' => 'Belum ada data',
    'description' => null,
])

<div class="flex flex-col items-center justify-center py-12">

    <x-heroicon-o-folder-open
        class="h-16 w-16 text-slate-300" />

    <h3 class="mt-4 text-lg font-semibold text-slate-700">
        {{ $title }}
    </h3>

    @if($description)

        <p class="mt-2 max-w-md text-center text-sm text-slate-500">
            {{ $description }}
        </p>

    @endif

</div>