@csrf

<div class="grid grid-cols-1 gap-6">

    <div>
        <label class="block mb-2 font-medium">Kode</label>
        <input
            type="text"
            name="code"
            value="{{ old('code', $academicYear->code ?? '') }}"
            class="w-full rounded-lg border-gray-300"
            required>

        @error('code')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block mb-2 font-medium">Nama Tahun Pelajaran</label>
        <input
            type="text"
            name="name"
            value="{{ old('name', $academicYear->name ?? '') }}"
            class="w-full rounded-lg border-gray-300"
            required>

        @error('name')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="grid md:grid-cols-2 gap-4">

        <div>
            <label class="block mb-2 font-medium">Tanggal Mulai</label>
            <input
                type="date"
                name="start_date"
                value="{{ old('start_date', isset($academicYear) ? $academicYear->start_date->format('Y-m-d') : '') }}"
                class="w-full rounded-lg border-gray-300"
                required>
        </div>

        <div>
            <label class="block mb-2 font-medium">Tanggal Selesai</label>
            <input
                type="date"
                name="end_date"
                value="{{ old('end_date', isset($academicYear) ? $academicYear->end_date->format('Y-m-d') : '') }}"
                class="w-full rounded-lg border-gray-300"
                required>
        </div>

    </div>

    <div>
        <label class="inline-flex items-center gap-2">
            <input
                type="checkbox"
                name="is_active"
                value="1"
                {{ old('is_active', $academicYear->is_active ?? false) ? 'checked' : '' }}>
            <span>Jadikan Tahun Pelajaran Aktif</span>
        </label>
    </div>

</div>

<div class="mt-8 flex gap-3">

    <button
        type="submit"
        class="bg-green-700 hover:bg-green-800 text-white px-5 py-2 rounded-lg">

        Simpan

    </button>

    <a href="{{ route('academic-years.index') }}"
       class="bg-gray-500 hover:bg-gray-600 text-white px-5 py-2 rounded-lg">

        Batal

    </a>

</div>