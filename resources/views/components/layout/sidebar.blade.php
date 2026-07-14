<aside
    class="sticky top-0 h-screen w-72 shrink-0 overflow-y-auto border-r border-slate-800 bg-slate-900 text-slate-200">

    {{-- Logo --}}
    <div class="flex h-16 items-center border-b border-slate-800 px-6">

        <div>

            <h1 class="text-2xl font-bold text-white">
                SIMUO
            </h1>

            <p class="text-xs text-slate-400">
                Sistem Ujian Online
            </p>

        </div>

    </div>

    {{-- Menu --}}
    <nav class="px-4 py-6">

        {{-- Dashboard --}}


<x-layout.sidebar-item
    route="dashboard"
    icon="home"
    label="Dashboard" />

        {{-- Master Akademik --}}
        <p class="mt-6 mb-2 px-3 text-xs font-semibold uppercase tracking-widest text-slate-500">
            Master Akademik
        </p>

<x-layout.sidebar-item
    route="academic-years.index"
    icon="calendar-days"
    label="Tahun Pelajaran" />

<x-layout.sidebar-item
    route="semesters.index"
    icon="calendar"
    label="Semester" />

<x-layout.sidebar-item
    route="grades.index"
    icon="academic-cap"
    label="Tingkat" />

<x-layout.sidebar-item
    route="classrooms.index"
    icon="building-office-2"
    label="Kelas" />

<x-layout.sidebar-item
    route="subjects.index"
    icon="book-open"
    label="Mata Pelajaran" />

        {{-- Master Pengguna --}}
        <p class="mt-6 mb-2 px-3 text-xs font-semibold uppercase tracking-widest text-slate-500">
            Master Pengguna
        </p>

<x-layout.sidebar-item
    route="teachers.index"
    icon="user-group"
    label="Guru" />
    <x-layout.sidebar-item
    route="students.index"
    icon="users"
    label="Siswa" />
<p class="mt-6 mb-2 px-3 text-xs font-semibold uppercase tracking-widest text-slate-500">
    Relasi Akademik
</p>

<x-layout.sidebar-item
    route="student-classrooms.index"
    icon="user-plus"
    label="Penempatan Siswa" />

<x-layout.sidebar-item
    route="homeroom-teachers.index"
    icon="identification"
    label="Wali Kelas" />
    <x-layout.sidebar-item
    route="teacher-subjects.index"
    icon="book-open"
    label="Guru Mengajar" />
    
    
{{-- Ujian --}}
<p class="mt-6 mb-2 px-3 text-xs font-semibold uppercase tracking-widest text-slate-500">
    Ujian
</p>

<x-layout.sidebar-item
    route="exam-types.index"
    icon="clipboard-document-list"
    label="Jenis Ujian" />

<x-layout.sidebar-item
    route="exam-schedules.index"
    icon="calendar-days"
    label="Jadwal Ujian" />

<x-layout.sidebar-item
    route="question-banks.index"
    icon="clipboard-document-list"
    label="Bank Soal" />

<x-layout.sidebar-disabled
    icon="document-duplicate"
    label="Paket Soal" />

<x-layout.sidebar-disabled
    icon="play-circle"
    label="Pelaksanaan Ujian" />

<x-layout.sidebar-disabled
    icon="chart-bar-square"
    label="Nilai Ujian" />
    
    
    
<p class="mt-6 mb-2 px-3 text-xs font-semibold uppercase tracking-widest text-slate-500">
    Administrasi
</p>

<x-layout.sidebar-disabled
    icon="shield-check"
    label="Hak Akses" />

<x-layout.sidebar-disabled
    icon="users"
    label="Pengguna" />

        {{-- Sistem --}}
        <p class="mt-6 mb-2 px-3 text-xs font-semibold uppercase tracking-widest text-slate-500">
            Sistem
        </p>

      <x-layout.sidebar-disabled
    icon="cog-6-tooth"
    label="Pengaturan" />


    </nav>

</aside>