@csrf

<div class="grid grid-cols-1 gap-6">

    {{-- Guru --}}
    <div>
        <label class="mb-2 block font-medium">
            Guru
        </label>

        <select
            name="teacher_id"
            class="w-full rounded-lg border-gray-300"
            required>

            <option value="">-- Pilih Guru --</option>

            @foreach($teachers as $teacher)
                <option
                    value="{{ $teacher->id }}"
                    @selected(old('teacher_id', $teacherSubject->teacher_id ?? '') == $teacher->id)>
                    {{ $teacher->full_name }}
                </option>
            @endforeach

        </select>

        @error('teacher_id')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    {{-- Mata Pelajaran --}}
    <div>
        <label class="mb-2 block font-medium">
            Mata Pelajaran
        </label>

        <select
            name="subject_id"
            class="w-full rounded-lg border-gray-300"
            required>

            <option value="">-- Pilih Mata Pelajaran --</option>

            @foreach($subjects as $subject)
                <option
                    value="{{ $subject->id }}"
                    @selected(old('subject_id', $teacherSubject->subject_id ?? '') == $subject->id)>
                    {{ $subject->name }}
                </option>
            @endforeach

        </select>

        @error('subject_id')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    {{-- Kelas --}}
    <div>
        <label class="mb-2 block font-medium">
            Kelas
        </label>

        <select
            name="classroom_id"
            class="w-full rounded-lg border-gray-300"
            required>

            <option value="">-- Pilih Kelas --</option>

            @foreach($classrooms as $classroom)
                <option
                    value="{{ $classroom->id }}"
                    @selected(old('classroom_id', $teacherSubject->classroom_id ?? '') == $classroom->id)>
                    {{ $classroom->name }}
                </option>
            @endforeach

        </select>

        @error('classroom_id')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    {{-- Tahun Pelajaran --}}
    <div>
        <label class="mb-2 block font-medium">
            Tahun Pelajaran
        </label>

        <select
            name="academic_year_id"
            class="w-full rounded-lg border-gray-300"
            required>

            <option value="">-- Pilih Tahun Pelajaran --</option>

            @foreach($academicYears as $academicYear)
                <option
                    value="{{ $academicYear->id }}"
                    @selected(old('academic_year_id', $teacherSubject->academic_year_id ?? '') == $academicYear->id)>
                    {{ $academicYear->name }}
                </option>
            @endforeach

        </select>

        @error('academic_year_id')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    {{-- Semester --}}
    <div>
        <label class="mb-2 block font-medium">
            Semester
        </label>

        <select
            name="semester_id"
            class="w-full rounded-lg border-gray-300"
            required>

            <option value="">-- Pilih Semester --</option>

            @foreach($semesters as $semester)
                <option
                    value="{{ $semester->id }}"
                    @selected(old('semester_id', $teacherSubject->semester_id ?? '') == $semester->id)>
                    {{ $semester->name }}
                </option>
            @endforeach

        </select>

        @error('semester_id')
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
                {{ old('is_active', $teacherSubject->is_active ?? true) ? 'checked' : '' }}>

            <span>Aktif</span>
        </label>
    </div>

</div>

<div class="mt-8 flex gap-3">

    <x-ui.button type="submit">
        Simpan
    </x-ui.button>

    <a href="{{ route('teacher-subjects.index') }}">
        <x-ui.button
            type="button"
            variant="secondary">
            Batal
        </x-ui.button>
    </a>

</div>