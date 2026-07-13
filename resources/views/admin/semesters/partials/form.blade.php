@csrf

<div class="grid grid-cols-1 gap-6">

    {{-- Tahun Pelajaran --}}
    <div>

        <label class="mb-2 block font-medium">
            Tahun Pelajaran
        </label>

        <select
            name="academic_year_id"
            class="w-full rounded-xl border-gray-300">

            <option value="">
                -- Pilih Tahun Pelajaran --
            </option>

            @foreach($academicYears as $academicYear)

                <option
                    value="{{ $academicYear->id }}"
                    @selected(old('academic_year_id', $semester->academic_year_id ?? '') == $academicYear->id)>

                    {{ $academicYear->name }}

                </option>

            @endforeach

        </select>

        @error('academic_year_id')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror

    </div>

    {{-- Kode --}}
    <div>

        <label class="mb-2 block font-medium">
            Kode
        </label>

        <input
            type="text"
            name="code"
            value="{{ old('code', $semester->code ?? '') }}"
            placeholder="GJ / GP"
            class="w-full rounded-xl border-gray-300">

        @error('code')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror

    </div>

    {{-- Nama Semester --}}
    <div>

        <label class="mb-2 block font-medium">
            Semester
        </label>

        <select
            name="order"
            class="w-full rounded-xl border-gray-300">

            <option value="">
                -- Pilih Semester --
            </option>

            <option
                value="1"
                @selected(old('order', $semester->order ?? '') == 1)>

                Ganjil

            </option>

            <option
                value="2"
                @selected(old('order', $semester->order ?? '') == 2)>

                Genap

            </option>

        </select>

        @error('order')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror

    </div>

    {{-- Nama --}}
    <div>

        <label class="mb-2 block font-medium">
            Nama Semester
        </label>

        <input
            type="text"
            name="name"
            value="{{ old('name', $semester->name ?? '') }}"
            placeholder="Semester Ganjil"
            class="w-full rounded-xl border-gray-300">

        @error('name')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror

    </div>

    {{-- Status --}}
    <div>

        <label class="inline-flex items-center gap-2">

            <input
                type="checkbox"
                name="is_active"
                value="1"
                {{ old('is_active', $semester->is_active ?? false) ? 'checked' : '' }}>

            <span>
                Jadikan Semester Aktif
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

    <a href="{{ route('semesters.index') }}">

        <x-ui.button variant="secondary">

            Batal

        </x-ui.button>

    </a>

</div>