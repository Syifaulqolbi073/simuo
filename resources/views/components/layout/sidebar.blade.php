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
        <p class="mb-2 px-3 text-xs font-semibold uppercase tracking-widest text-slate-500">
            Dashboard
        </p>

        <a href="{{ route('dashboard') }}"
           class="mb-1 flex items-center gap-3 rounded-xl px-4 py-3 transition
           {{ request()->routeIs('dashboard') ? 'bg-emerald-600 text-white shadow' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">

            <x-heroicon-o-home class="h-5 w-5"/>

            <span>Dashboard</span>

        </a>

        {{-- Master Akademik --}}
        <p class="mt-6 mb-2 px-3 text-xs font-semibold uppercase tracking-widest text-slate-500">
            Master Akademik
        </p>

        <a href="{{ route('academic-years.index') }}"
           class="mb-1 flex items-center gap-3 rounded-xl px-4 py-3 transition
           {{ request()->routeIs('academic-years.*') ? 'bg-emerald-600 text-white shadow' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">

            <x-heroicon-o-calendar-days class="h-5 w-5"/>

            <span>Tahun Pelajaran</span>

        </a>

        <a href="{{ route('semesters.index') }}"
           class="mb-1 flex items-center gap-3 rounded-xl px-4 py-3 transition
           {{ request()->routeIs('semesters.*') ? 'bg-emerald-600 text-white shadow' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">

            <x-heroicon-o-calendar class="h-5 w-5"/>

            <span>Semester</span>

        </a>

        <a href="{{ route('grades.index') }}"
           class="mb-1 flex items-center gap-3 rounded-xl px-4 py-3 transition
           {{ request()->routeIs('grades.*') ? 'bg-emerald-600 text-white shadow' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">

            <x-heroicon-o-academic-cap class="h-5 w-5"/>

            <span>Tingkat</span>

        </a>

        <a href="{{ route('classrooms.index') }}"
           class="mb-1 flex items-center gap-3 rounded-xl px-4 py-3 transition
           {{ request()->routeIs('classrooms.*') ? 'bg-emerald-600 text-white shadow' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">

            <x-heroicon-o-building-office-2 class="h-5 w-5"/>

            <span>Kelas</span>

        </a>

        <a href="{{ route('subjects.index') }}"
   class="mb-1 flex items-center gap-3 rounded-xl px-4 py-3 transition
   {{ request()->routeIs('subjects.*') ? 'bg-emerald-600 text-white shadow' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">

    <x-heroicon-o-book-open class="h-5 w-5"/>

    <span>Mata Pelajaran</span>

</a>

        {{-- Master Pengguna --}}
        <p class="mt-6 mb-2 px-3 text-xs font-semibold uppercase tracking-widest text-slate-500">
            Master Pengguna
        </p>

        <a href="#"
           class="mb-1 flex items-center gap-3 rounded-xl px-4 py-3 text-slate-500">

            <x-heroicon-o-user-group class="h-5 w-5"/>

            <span>Guru</span>

        </a>

        <a href="#"
           class="mb-1 flex items-center gap-3 rounded-xl px-4 py-3 text-slate-500">

            <x-heroicon-o-users class="h-5 w-5"/>

            <span>Siswa</span>

        </a>

        {{-- Ujian --}}
        <p class="mt-6 mb-2 px-3 text-xs font-semibold uppercase tracking-widest text-slate-500">
            Ujian
        </p>

        <a href="#"
           class="mb-1 flex items-center gap-3 rounded-xl px-4 py-3 text-slate-500">

            <x-heroicon-o-clipboard-document-list class="h-5 w-5"/>

            <span>Bank Soal</span>

        </a>

        <a href="#"
           class="mb-1 flex items-center gap-3 rounded-xl px-4 py-3 text-slate-500">

            <x-heroicon-o-document-text class="h-5 w-5"/>

            <span>Paket Ujian</span>

        </a>

        <a href="#"
           class="mb-1 flex items-center gap-3 rounded-xl px-4 py-3 text-slate-500">

            <x-heroicon-o-play-circle class="h-5 w-5"/>

            <span>Pelaksanaan</span>

        </a>

        <a href="#"
           class="mb-1 flex items-center gap-3 rounded-xl px-4 py-3 text-slate-500">

            <x-heroicon-o-chart-bar-square class="h-5 w-5"/>

            <span>Nilai</span>

        </a>

        {{-- Sistem --}}
        <p class="mt-6 mb-2 px-3 text-xs font-semibold uppercase tracking-widest text-slate-500">
            Sistem
        </p>

        <a href="#"
           class="flex items-center gap-3 rounded-xl px-4 py-3 text-slate-500">

            <x-heroicon-o-cog-6-tooth class="h-5 w-5"/>

            <span>Pengaturan</span>

        </a>

    </nav>

</aside>