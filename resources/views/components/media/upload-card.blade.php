@props([
    'questionBank',
    'question',
])

<form
    action="{{ route('question-banks.questions.media.store', [$questionBank, $question]) }}"
    method="POST"
    enctype="multipart/form-data"
    class="rounded-2xl border-2 border-dashed border-slate-300 bg-slate-50 p-10">

    @csrf

    <div class="text-center">

        <x-heroicon-o-cloud-arrow-up
            class="mx-auto h-12 w-12 text-slate-400"/>

        <h3 class="mt-4 text-lg font-semibold">

            Upload Media

        </h3>

        <p class="mt-2 text-sm text-slate-500">

            Pilih gambar, audio, video, atau dokumen.

        </p>

    </div>

    <div class="mt-8 grid grid-cols-1 gap-4 md:grid-cols-2">

        {{-- Jenis Media --}}
        <div>

            <label class="mb-2 block text-sm font-medium">

                Jenis Media

            </label>

            <select
                name="media_type"
                class="w-full rounded-lg border-slate-300">

                <option value="IMAGE">Gambar</option>

                <option value="AUDIO">Audio</option>

                <option value="VIDEO">Video</option>

                <option value="DOCUMENT">Dokumen</option>

            </select>

        </div>

        {{-- File --}}
        <div>

            <label class="mb-2 block text-sm font-medium">

                File

            </label>

            <input
                type="file"
                name="file"
                class="block w-full rounded-lg border border-slate-300">

        </div>

    </div>

    <input
        type="hidden"
        name="is_active"
        value="1">

    <input
        type="hidden"
        name="sort_order"
        value="1">

    <div class="mt-8 flex justify-end">

        <x-ui.button type="submit">

            <x-heroicon-o-cloud-arrow-up class="h-5 w-5"/>

            Upload

        </x-ui.button>

    </div>

    <p class="mt-4 text-center text-xs text-slate-400">

        JPG • PNG • WEBP • GIF • MP3 • WAV • OGG • MP4 • MOV • AVI • PDF

    </p>

</form>