@csrf

<div class="grid grid-cols-1 gap-6 md:grid-cols-2">

    {{-- Guru Mengajar --}}
    <div>

        <label class="mb-2 block font-medium">

            Guru Mengajar

        </label>

        <select
            name="teacher_subject_id"
            class="w-full rounded-lg border-gray-300"
            required>

            <option value="">
                -- Pilih Guru Mengajar --
            </option>

            @foreach($teacherSubjects as $item)

                <option
                    value="{{ $item->id }}"
                    @selected(old('teacher_subject_id', $questionBank->teacher_subject_id ?? '') == $item->id)>

                    {{ $item->teacher->name }}
                    -
                    {{ $item->subject->name }}
                    -
                    {{ $item->classroom->name }}

                </option>

            @endforeach

        </select>

        @error('teacher_subject_id')

            <p class="mt-1 text-sm text-red-600">

                {{ $message }}

            </p>

        @enderror

    </div>

    {{-- Jenis Ujian --}}
    <div>

        <label class="mb-2 block font-medium">

            Jenis Ujian

        </label>

        <select
            name="exam_type_id"
            class="w-full rounded-lg border-gray-300"
            required>

            <option value="">
                -- Pilih Jenis Ujian --
            </option>

            @foreach($examTypes as $item)

                <option
                    value="{{ $item->id }}"
                    @selected(old('exam_type_id', $questionBank->exam_type_id ?? '') == $item->id)>

                    {{ $item->name }}

                </option>

            @endforeach

        </select>

        @error('exam_type_id')

            <p class="mt-1 text-sm text-red-600">

                {{ $message }}

            </p>

        @enderror

    </div>

    {{-- Nama Bank Soal --}}
    <div class="md:col-span-2">

        <label class="mb-2 block font-medium">

            Nama Bank Soal

        </label>

        <input
            type="text"
            name="title"
            value="{{ old('title', $questionBank->title ?? '') }}"
            class="w-full rounded-lg border-gray-300"
            required>

        @error('title')

            <p class="mt-1 text-sm text-red-600">

                {{ $message }}

            </p>

        @enderror

    </div>

    {{-- Deskripsi --}}
    <div class="md:col-span-2">

        <label class="mb-2 block font-medium">

            Deskripsi

        </label>

        <textarea
            name="description"
            rows="4"
            class="w-full rounded-lg border-gray-300">{{ old('description', $questionBank->description ?? '') }}</textarea>

        @error('description')

            <p class="mt-1 text-sm text-red-600">

                {{ $message }}

            </p>

        @enderror

    </div>

    {{-- Status --}}
    <div>

        <label class="mb-2 block font-medium">

            Status

        </label>

        <select
            name="is_active"
            class="w-full rounded-lg border-gray-300">

            <option
                value="1"
                @selected(old('is_active', $questionBank->is_active ?? true))>

                Aktif

            </option>

            <option
                value="0"
                @selected(old('is_active', $questionBank->is_active ?? true) == false)>

                Nonaktif

            </option>

        </select>

    </div>

</div>

<div class="mt-8 flex justify-end gap-3">

    <a
        href="{{ route('question-banks.index') }}"
        class="rounded-lg border border-slate-300 px-5 py-2 font-medium hover:bg-slate-100">

        Batal

    </a>

    <x-ui.button>

        Simpan

    </x-ui.button>

</div>