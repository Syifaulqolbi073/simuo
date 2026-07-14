<aside class="w-72 shrink-0 min-h-screen border-r border-slate-800 bg-slate-900 text-slate-200">

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
     

        {{-- Ujian --}}
        <p class="mt-6 mb-2 px-3 text-xs font-semibold uppercase tracking-widest text-slate-500">
            Ujian
        </p>

<x-layout.sidebar-disabled
    icon="clipboard-document-list"
    label="Bank Soal" />

<x-layout.sidebar-disabled
    icon="document-text"
    label="Paket Ujian" />

<x-layout.sidebar-disabled
    icon="play-circle"
    label="Pelaksanaan" />

<x-layout.sidebar-disabled
    icon="chart-bar-square"
    label="Nilai" />
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