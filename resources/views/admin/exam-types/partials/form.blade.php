@csrf

<div class="grid grid-cols-1 gap-6">

    {{-- Kode --}}
    <div>

        <label class="mb-2 block font-medium">
            Kode
        </label>

        <input
            type="text"
            name="code"
            value="{{ old('code', $examType->code ?? '') }}"
            class="w-full rounded-lg border-gray-300"
            maxlength="20"
            required>

        @error('code')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror

    </div>

    {{-- Nama --}}
    <div>

        <label class="mb-2 block font-medium">
            Nama Jenis Ujian
        </label>

        <input
            type="text"
            name="name"
            value="{{ old('name', $examType->name ?? '') }}"
            class="w-full rounded-lg border-gray-300"
            maxlength="100"
            required>

        @error('name')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror

    </div>

    {{-- Kategori --}}
    <div>

        <label class="mb-2 block font-medium">
            Kategori
        </label>

        <select
            name="category"
            class="w-full rounded-lg border-gray-300"
            required>

            <option value="">-- Pilih Kategori --</option>

            @foreach(\App\Models\ExamType::CATEGORIES as $value)

                <option
                    value="{{ $value }}"
                    @selected(old('category', $examType->