@csrf

<div class="grid grid-cols-1 gap-6">

    <div>
        <label class="mb-2 block font-medium">
            Kode
        </label>

        <input
            type="text"
            name="code"
            value="{{ old('code', $grade->code ?? '') }}"
            placeholder="VII"
            class="w-full rounded-xl border-gray-300">

        @error('code')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="mb-2 block font-medium">
            Nama Tingkat
        </label>

        <input
            type="text"
            name="name"
            value="{{ old('name', $grade->name ?? '') }}"
            placeholder="Kelas VII"
            class="w-full rounded-xl border-gray-300">

        @error('name')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>

        <label class="mb-2 block font-medium">
            Urutan
        </label>

        <input
            type="number"
            name="order"
            value="{{ old('order', $grade->order ?? '') }}"
            placeholder="7"
            class="w-full rounded-xl border-gray-300">

        @error('order')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror

    </div>

    <div>

        <label class="inline-flex items-center gap-2">

            <input
                type="checkbox"
                name="is_active"
                value="1"
                {{ old('is_active', $grade->is_active ?? false) ? 'checked' : '' }}>

            <span>
                Jadikan Tingkat Aktif
            </span>

        </label>

    </div>

</div>

<div class="mt-8 flex flex-col gap-3 md:flex-row">

    <x-ui.button
        variant="primary"
        type="submit">

        Simpan

    </x-ui.button>

    <a href="{{ route('grades.index') }}">

        <x-ui.button variant="secondary">

            Batal

        </x-ui.button>

    </a>

</div>