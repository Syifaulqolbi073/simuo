@csrf

<div class="grid grid-cols-1 gap-6">

    {{-- Kode --}}
    <div>

        <label class="block mb-2 font-medium">
            Kode
        </label>

        <input
            type="text"
            name="code"
            value="{{ old('code', $subject->code ?? '') }}"
            class="w-full rounded-lg border-gray-300"
            required>

        @error('code')
            <p class="mt-1 text-sm text-red-600">
                {{ $message }}
            </p>
        @enderror

    </div>

    {{-- Nama --}}
    <div>

        <label class="block mb-2 font-medium">
            Nama Mata Pelajaran
        </label>

        <input
            type="text"
            name="name"
            value="{{ old('name', $subject->name ?? '') }}"
            class="w-full rounded-lg border-gray-300"
            required>

        @error('name')
            <p class="mt-1 text-sm text-red-600">
                {{ $message }}
            </p>
        @enderror

    </div>

    {{-- Kelompok --}}
    <div>

        <label class="block mb-2 font-medium">
            Kelompok Mata Pelajaran
        </label>

        <select
            name="subject_group"
            class="w-full rounded-lg border-gray-300"
            required>

            <option value="">
                -- Pilih Kelompok --
            </option>

            @foreach(\App\Models\Subject::GROUPS as $group)

                <option
                    value="{{ $group }}"
                    @selected(old('subject_group', $subject->subject_group ?? '') == $group)>

                    {{ $group }}

                </option>

            @endforeach

        </select>

        @error('subject_group')
            <p class="mt-1 text-sm text-red-600">
                {{ $message }}
            </p>
        @enderror

    </div>

    {{-- KKM --}}
    <div>

        <label class="block mb-2 font-medium">
            KKM
        </label>

        <input
            type="number"
            name="minimum_score"
            min="0"
            max="100"
            value="{{ old('minimum_score', $subject->minimum_score ?? 75) }}"
            class="w-full rounded-lg border-gray-300"
            required>

        @error('minimum_score')
            <p class="mt-1 text-sm text-red-600">
                {{ $message }}
            </p>
        @enderror

    </div>

    {{-- Status --}}
    <div>

        <label class="inline-flex items-center gap-2">

            <input
                type="checkbox"
                name="is_active"
                value="1"
                {{ old('is_active', $subject->is_active ?? true) ? 'checked' : '' }}>

            <span>
                Mata Pelajaran Aktif
            </span>

        </label>

    </div>

</div>

<div class="mt-8 flex gap-3">

    <x-ui.button
        type="submit"
        variant="primary">

        Simpan

    </x-ui.button>

    <a href="{{ route('subjects.index') }}">

        <x-ui.button
            type="button"
            variant="secondary">

            Batal

        </x-ui.button>

    </a>

</div>