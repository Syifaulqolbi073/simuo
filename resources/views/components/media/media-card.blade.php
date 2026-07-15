@props([
    'media',
])

<div class="flex items-center justify-between rounded-xl border border-slate-200 p-4">

    <div class="flex items-center gap-3">

        <x-heroicon-o-document class="h-8 w-8 text-slate-500"/>

        <div>

            <div class="font-medium">

                {{ $media->file_name }}

            </div>

            <div class="text-sm text-slate-500">

                {{ number_format($media->file_size / 1024, 1) }} KB

            </div>

        </div>

    </div>

    <x-ui.button
        variant="danger">

        Hapus

    </x-ui.button>

</div>