@csrf

<div class="space-y-8">

    {{-- ================= IDENTITAS ================= --}}
    <div>

        <h3 class="mb-4 border-b pb-2 text-lg font-semibold text-slate-700">
            Identitas Siswa
        </h3>

        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

            {{-- NIS --}}
            <div>

                <label class="mb-2 block font-medium">
                    NIS
                </label>

                <input
                    type="text"
                    name="nis"
                    value="{{ old('nis', $student->nis ?? '') }}"
                    class="w-full rounded-lg border-gray-300">

                @error('nis')
                    <p class="mt-1 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror

            </div>

            {{-- NISN --}}
            <div>

                <label class="mb-2 block font-medium">
                    NISN
                </label>

                <input
                    type="text"
                    name="nisn"
                    value="{{ old('nisn', $student->nisn ?? '') }}"
                    class="w-full rounded-lg border-gray-300">

                @error('nisn')
                    <p class="mt-1 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror

            </div>

            {{-- Nama --}}
            <div class="md:col-span-2">

                <label class="mb-2 block font-medium">
                    Nama Siswa
                </label>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name', $student->name ?? '') }}"
                    class="w-full rounded-lg border-gray-300"
                    required>

                @error('name')
                    <p class="mt-1 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror

            </div>

        </div>

    </div>

    {{-- ================= BIODATA ================= --}}
    <div>

        <h3 class="mb-4 border-b pb-2 text-lg font-semibold text-slate-700">
            Biodata
        </h3>

        <div class="grid grid-cols-1 gap-6 md:grid-cols-3">

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

                    @foreach(\App\Models\Student::GENDERS as $value => $label)

                        <option
                            value="{{ $value }}"
                            @selected(old('gender', $student->gender ?? '') == $value)>

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

            {{-- Tempat Lahir --}}
            <div>

                <label class="mb-2 block font-medium">
                    Tempat Lahir
                </label>

                <input
                    type="text"
                    name="birth_place"
                    value="{{ old('birth_place', $student->birth_place ?? '') }}"
                    class="w-full rounded-lg border-gray-300">

                @error('birth_place')
                    <p class="mt-1 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror

            </div>

            {{-- Tanggal Lahir --}}
            <div>

                <label class="mb-2 block font-medium">
                    Tanggal Lahir
                </label>

                <input
                    type="date"
                    name="birth_date"
                    value="{{ old('birth_date', isset($student) && $student->birth_date ? $student->birth_date->format('Y-m-d') : '') }}"
                    class="w-full rounded-lg border-gray-300">

                @error('birth_date')
                    <p class="mt-1 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror

            </div>

        </div>

    </div>

    {{-- ================= KONTAK ================= --}}
    <div>

        <h3 class="mb-4 border-b pb-2 text-lg font-semibold text-slate-700">
            Kontak
        </h3>

        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

            {{-- Nomor HP --}}
            <div>

                <label class="mb-2 block font-medium">
                    Nomor HP
                </label>

                <input
                    type="text"
                    name="phone"
                    value="{{ old('phone', $student->phone ?? '') }}"
                    class="w-full rounded-lg border-gray-300">

                @error('phone')
                    <p class="mt-1 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror

            </div>

            {{-- Nama Orang Tua --}}
            <div>

                <label class="mb-2 block font-medium">
                    Nama Orang Tua / Wali
                </label>

                <input
                    type="text"
                    name="parent_name"
                    value="{{ old('parent_name', $student->parent_name ?? '') }}"
                    class="w-full rounded-lg border-gray-300">

                @error('parent_name')
                    <p class="mt-1 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror

            </div>

            {{-- Alamat --}}
            <div class="md:col-span-2">

                <label class="mb-2 block font-medium">
                    Alamat
                </label>

                <textarea
                    name="address"
                    rows="3"
                    class="w-full rounded-lg border-gray-300">{{ old('address', $student->address ?? '') }}</textarea>

                @error('address')
                    <p class="mt-1 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror

            </div>

        </div>

    </div>

    {{-- ================= STATUS ================= --}}
    <div>

        <h3 class="mb-4 border-b pb-2 text-lg font-semibold text-slate-700">
            Status
        </h3>

        <label class="inline-flex items-center gap-2">

            <input
                type="checkbox"
                name="is_active"
                value="1"
                {{ old('is_active', $student->is_active ?? true) ? 'checked' : '' }}>

            <span>
                Siswa Aktif
            </span>

        </label>

    </div>

</div>

{{-- Tombol --}}
<div class="mt-8 flex gap-3">

    <x-ui.button
        type="submit"
        variant="primary"
        icon="save"
        loading="Menyimpan...">

        Simpan

    </x-ui.button>

    <a href="{{ route('students.index') }}">

        <x-ui.button
            type="button"
            variant="secondary">

            Batal

        </x-ui.button>

    </a>

</div>