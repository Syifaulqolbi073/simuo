@csrf

<div class="grid grid-cols-1 gap-6">

    <div>
        <label class="mb-2 block font-medium">
            Tingkat
        </label>

        <select
            name="grade_id"
            class="w-full rounded-xl border-gray-300">

            <option value="">-- Pilih Tingkat --</option>

            @foreach($grades as $grade)

                <option
                    value="{{ $grade->id }}"
                    @selected(old('grade_id', $classroom->grade_id ?? '') == $grade->id)>

                    {{ $grade->code }} - {{ $grade->name }}

                </option>

            @endforeach

        </select>

        @error('grade_id')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>

        <label class="mb-2 block font-medium">
            Kode Kelas
        </label>

        <input
            type="text"
            name="code"
            value="{{ old('code', $classroom->code ?? '') }}"
            placeholder="VII-A"
            class="w-full rounded-xl border-gray-300">

        @error('code')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror

    </div>

    <div>

        <label class="mb-2 block font-medium">
            Nama Kelas
        </label>

        <input
            type="text"
            name="name"
            value="{{ old('name', $classroom->name ?? '') }}"
            placeholder="Kelas VII A"
            class="w-full rounded-xl border-gray-300">

        @error('name')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror

    </div>

    <div>

        <label class="mb-2 block font-medium">
            Kapasitas
        </label>

        <input
            type="number"
            name="capacity"
            value="{{ old('capacity', $classroom->capacity ?? 32) }}"
            class="w-full rounded-xl border-gray-300">

        @error('capacity')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror

    </div>

    <div>

        <label class="inline-flex items-center gap-2">

            <input
                type="checkbox"
                name="is_active"
                value="1"
                {{ old('is_active', $classroom->is_active ?? false) ? 'checked' : '' }}>

            <span>
                Jadikan Kelas Aktif
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

    <a href="{{ route('classrooms.index') }}">

        <x-ui.button variant="secondary">

            Batal

        </x-ui.button>

    </a>

</div>