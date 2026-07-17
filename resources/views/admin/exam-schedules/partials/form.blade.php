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

            <option value="">-- Pilih Guru Mengajar --</option>

            @foreach($teacherSubjects as $item)

                <option
                    value="{{ $item->id }}"
                    @selected(old('teacher_subject_id', $examSchedule->teacher_subject_id ?? '') == $item->id)>

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

            <option value="">-- Pilih Jenis Ujian --</option>

            @foreach($examTypes as $item)

                <option
                    value="{{ $item->id }}"
                    @selected(old('exam_type_id', $examSchedule->exam_type_id ?? '') == $item->id)>

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
    
    {{-- Bank Soal --}}
<div>

    <label class="mb-2 block font-medium">
        Bank Soal
    </label>

    <select
        name="question_bank_id"
        class="w-full rounded-lg border-gray-300"
        required>

        <option value="">
            -- Pilih Bank Soal --
        </option>

        @foreach($questionBanks as $item)

            <option
                value="{{ $item->id }}"
                @selected(old(
                    'question_bank_id',
                    $examSchedule->question_bank_id ?? ''
                ) == $item->id)>

                {{ $item->title }}
                ({{ $item->total_question }} soal)

            </option>

        @endforeach

    </select>

    @error('question_bank_id')

        <p class="mt-1 text-sm text-red-600">
            {{ $message }}
        </p>

    @enderror

</div>

    {{-- Judul --}}
    <div class="md:col-span-2">

        <label class="mb-2 block font-medium">
            Judul Ujian
        </label>

        <input
            type="text"
            name="title"
            value="{{ old('title', $examSchedule->title ?? '') }}"
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
            rows="3"
            class="w-full rounded-lg border-gray-300">{{ old('description', $examSchedule->description ?? '') }}</textarea>

    </div>

</div>

<hr class="my-8">

<h3 class="mb-4 text-lg font-semibold">
    Jadwal Ujian
</h3>

<div class="grid grid-cols-1 gap-6 md:grid-cols-3">
        {{-- Tanggal --}}
    <div>

        <label class="mb-2 block font-medium">
            Tanggal Ujian
        </label>

        <input
            type="date"
            name="exam_date"
            value="{{ old('exam_date', isset($examSchedule) ? $examSchedule->exam_date?->format('Y-m-d') : '') }}"
            class="w-full rounded-lg border-gray-300"
            required>

        @error('exam_date')
            <p class="mt-1 text-sm text-red-600">
                {{ $message }}
            </p>
        @enderror

    </div>

    {{-- Jam Mulai --}}
    <div>

        <label class="mb-2 block font-medium">
            Jam Mulai
        </label>

        <input
            type="time"
            name="start_time"
            value="{{ old('start_time', $examSchedule->start_time ?? '') }}"
            class="w-full rounded-lg border-gray-300"
            required>

        @error('start_time')
            <p class="mt-1 text-sm text-red-600">
                {{ $message }}
            </p>
        @enderror

    </div>

    {{-- Durasi --}}
    <div>

        <label class="mb-2 block font-medium">
            Durasi (Menit)
        </label>

        <input
            type="number"
            name="duration"
            min="1"
            max="300"
            value="{{ old('duration', $examSchedule->duration ?? 90) }}"
            class="w-full rounded-lg border-gray-300"
            required>

        @error('duration')
            <p class="mt-1 text-sm text-red-600">
                {{ $message }}
            </p>
        @enderror

    </div>

</div>

<hr class="my-8">

<h3 class="mb-4 text-lg font-semibold">
    Pengaturan Dasar
</h3>

<div class="grid grid-cols-1 gap-6 md:grid-cols-2">

    {{-- Token --}}
    <div>

        <label class="mb-2 block font-medium">
            Token Ujian
        </label>

        <input
            type="text"
            name="token"
            maxlength="10"
            value="{{ old('token', $examSchedule->token ?? '') }}"
            class="w-full rounded-lg border-gray-300">

        <p class="mt-1 text-xs text-slate-500">
            Kosongkan jika ingin dibuat otomatis oleh sistem.
        </p>

        @error('token')
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
            name="status"
            class="w-full rounded-lg border-gray-300"
            required>

            @foreach(\App\Models\ExamSchedule::STATUSES as $status)

                <option
                    value="{{ $status }}"
                    @selected(old('status', $examSchedule->status ?? 'Draft') == $status)>

                    {{ $status }}

                </option>

            @endforeach

        </select>

        @error('status')
            <p class="mt-1 text-sm text-red-600">
                {{ $message }}
            </p>
        @enderror

    </div>

    {{-- Toleransi Terlambat --}}
    <div>

        <label class="mb-2 block font-medium">
            Toleransi Terlambat (Menit)
        </label>

        <input
            type="number"
            name="late_tolerance"
            min="0"
            max="60"
            value="{{ old('late_tolerance', $examSchedule->late_tolerance ?? 0) }}"
            class="w-full rounded-lg border-gray-300">

    </div>

    {{-- Maksimal Percobaan --}}
    <div>

        <label class="mb-2 block font-medium">
            Maksimal Percobaan
        </label>

        <input
            type="number"
            name="max_attempt"
            min="1"
            max="10"
            value="{{ old('max_attempt', $examSchedule->max_attempt ?? 1) }}"
            class="w-full rounded-lg border-gray-300">

    </div>

</div>

<hr class="my-8">

<h3 class="mb-4 text-lg font-semibold">
    Pengaturan CBT
</h3>

<div class="grid grid-cols-1 gap-4 md:grid-cols-2">

    <label class="flex items-center gap-3">
        <input
            type="checkbox"
            name="token_required"
            value="1"
            @checked(old('token_required', $examSchedule->token_required ?? true))>

        <span>Gunakan Token</span>
    </label>

    <label class="flex items-center gap-3">
        <input
            type="checkbox"
            name="shuffle_question"
            value="1"
            @checked(old('shuffle_question', $examSchedule->shuffle_question ?? true))>

        <span>Acak Soal</span>
    </label>

    <label class="flex items-center gap-3">
        <input
            type="checkbox"
            name="shuffle_option"
            value="1"
            @checked(old('shuffle_option', $examSchedule->shuffle_option ?? true))>

        <span>Acak Pilihan Jawaban</span>
    </label>

    <label class="flex items-center gap-3">
        <input
            type="checkbox"
            name="show_timer"
            value="1"
            @checked(old('show_timer', $examSchedule->show_timer ?? true))>

        <span>Tampilkan Timer</span>
    </label>

    <label class="flex items-center gap-3">
        <input
            type="checkbox"
            name="one_device_only"
            value="1"
            @checked(old('one_device_only', $examSchedule->one_device_only ?? true))>

        <span>Satu Perangkat Saja</span>
    </label>

    <label class="flex items-center gap-3">
        <input
            type="checkbox"
            name="auto_submit"
            value="1"
            @checked(old('auto_submit', $examSchedule->auto_submit ?? true))>

        <span>Auto Submit Saat Waktu Habis</span>
    </label>

    <label class="flex items-center gap-3">
        <input
            type="checkbox"
            name="fullscreen_mode"
            value="1"
            @checked(old('fullscreen_mode', $examSchedule->fullscreen_mode ?? false))>

        <span>Mode Layar Penuh (Desktop/PWA)</span>
    </label>

    <label class="flex items-center gap-3">
        <input
            type="checkbox"
            name="allow_retry"
            value="1"
            @checked(old('allow_retry', $examSchedule->allow_retry ?? false))>

        <span>Izinkan Mengulang Ujian</span>
    </label>

    <label class="flex items-center gap-3">
        <input
            type="checkbox"
            name="show_score"
            value="1"
            @checked(old('show_score', $examSchedule->show_score ?? false))>

        <span>Tampilkan Nilai Setelah Ujian</span>
    </label>

    <label class="flex items-center gap-3">
        <input
            type="checkbox"
            name="show_answer"
            value="1"
            @checked(old('show_answer', $examSchedule->show_answer ?? false))>

        <span>Tampilkan Kunci Jawaban</span>
    </label>

    <label class="flex items-center gap-3">
        <input
            type="checkbox"
            name="is_published"
            value="1"
            @checked(old('is_published', $examSchedule->is_published ?? false))>

        <span>Publish ke Siswa</span>
    </label>

    <label class="flex items-center gap-3">
        <input
            type="checkbox"
            name="is_active"
            value="1"
            @checked(old('is_active', $examSchedule->is_active ?? true))>

        <span>Status Aktif</span>
    </label>

</div>

<hr class="my-8">

<div class="flex items-center gap-3">

    <x-ui.button type="submit">
        Simpan
    </x-ui.button>

    <a href="{{ route('exam-schedules.index') }}">

        <x-ui.button
            type="button"
            variant="secondary">

            Batal

        </x-ui.button>

    </a>

</div>