@csrf

<div class="grid grid-cols-1 gap-6">

    {{-- NIP --}}
    <div>

        <label class="mb-2 block font-medium">
            NIP / NUPTK
        </label>

        <input
            type="text"
            name="nip"
            value="{{ old('nip', $teacher->nip ?? '') }}"
            class="w-full rounded-lg border-gray-300">

        @error('nip')
            <p class="mt-1 text-sm text-red-600">
                {{ $message }}
            </p>
        @enderror

    </div>

    {{-- Nama --}}
    <div>

        <label class="mb-2 block font-medium">
            Nama Guru
        </label>

        <input
            type="text"
            name="name"
            value="{{ old('name', $teacher->name ?? '') }}"
            class="w-full rounded-lg border-gray-300"
            required>

        @error('name')
            <p class="mt-1 text-sm text-red-600">
                {{ $message }}
            </p>
        @enderror

    </div>

    {{-- Gelar --}}
    <div>

        <label class="mb-2 block font-medium">
            Gelar
        </label>

        <input
            type="text"
            name="title"
            value="{{ old('title', $teacher->title ?? '') }}"
            class="w-full rounded-lg border-gray-300">

        @error('title')
            <p class="mt-1 text-sm text-red-600">
                {{ $message }}
            </p>
        @enderror

    </div>

    {{-- Jenis Kelamin --}}
    <div>

        <label class="mb-2 block font-medium">
            Jenis Kelamin
        </label>

        <select
            name="gender"
            class="w-full rounded-lg border-gray-300"
            required>

            <option value="">
                -- Pilih Jenis Kelamin --
            </option>

            @foreach(\App\Models\Teacher::GENDERS as $value => $label)

                <option
                    value="{{ $value }}"
                    @selected(old('gender', $teacher->gender ?? '') == $value)>

                    {{ $label }}

                </option>

            @endforeach

        </select>

        @error('gender')
            <p class="mt-1 text-sm text-red-600">
                {{ $message }}
            </p>
        @enderror

    </div>

    {{-- Email --}}
    <div>

        <label class="mb-2 block font-medium">
            Email
        </label>

        <input
            type="email"
            name="email"
            value="{{ old('email', $teacher->email ?? '') }}"
            class="w-full rounded-lg border-gray-300">

        @error('email')
            <p class="mt-1 text-sm text-red-600">
                {{ $message }}
            </p>
        @enderror

    </div>

    {{-- Nomor HP --}}
    <div>

        <label class="mb-2 block font-medium">
            Nomor HP
        </label>

        <input
            type="text"
            name="phone"
            value="{{ old('phone', $teacher->phone ?? '') }}"
            class="w-full rounded-lg border-gray-300">

        @error('phone')
            <p class="mt-1 text-sm text-red-600">
                {{ $message }}
            </p>
        @enderror

    </div>

    {{-- Alamat --}}
    <div>

        <label class="mb-2 block font-medium">
            Alamat
        </label>

        <textarea
            name="address"
            rows="3"
            class="w-full rounded-lg border-gray-300">{{ old('address', $teacher->address ?? '') }}</textarea>

        @error('address')
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
                {{ old('is_active', $teacher->is_active ?? true) ? 'checked' : '' }}>

            <span>
                Guru Aktif
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

    <a href="{{ route('teachers.index') }}">

        <x-ui.button
            type="button"
            variant="secondary">

            Batal

        </x-ui.button>

    </a>

</div>