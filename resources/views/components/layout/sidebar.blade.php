<aside class="w-72 shrink-0 bg-slate-900 text-slate-200 min-h-screen border-r border-slate-800">

    {{-- Logo --}}
    <div class="h-16 flex items-center px-6 border-b border-slate-800">

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

        <p class="mb-2 px-3 text-xs uppercase tracking-widest text-slate-500">
            Menu
        </p>

        <a href="{{ route('dashboard') }}"
           class="mb-1 flex items-center rounded-xl px-4 py-3 transition
           {{ request()->routeIs('dashboard') ? 'bg-emerald-600 text-white shadow' : 'hover:bg-slate-800' }}">

            Dashboard

        </a>

        <p class="mt-6 mb-2 px-3 text-xs uppercase tracking-widest text-slate-500">
            Master Akademik
        </p>

        <a href="{{ route('academic-years.index') }}"
           class="mb-1 flex items-center rounded-xl px-4 py-3 transition
           {{ request()->routeIs('academic-years.*') ? 'bg-emerald-600 text-white shadow' : 'hover:bg-slate-800' }}">

            Tahun Pelajaran

        </a>

        <a href="#"
           class="mb-1 flex items-center rounded-xl px-4 py-3 text-slate-500 cursor-not-allowed">

            Semester

        </a>

        <a href="#"
           class="mb-1 flex items-center rounded-xl px-4 py-3 text-slate-500 cursor-not-allowed">

            Tingkat

        </a>

        <a href="#"
           class="mb-1 flex items-center rounded-xl px-4 py-3 text-slate-500 cursor-not-allowed">

            Kelas

        </a>

        <a href="#"
           class="mb-1 flex items-center rounded-xl px-4 py-3 text-slate-500 cursor-not-allowed">

            Mata Pelajaran

        </a>

        <p class="mt-6 mb-2 px-3 text-xs uppercase tracking-widest text-slate-500">
            Master Pengguna
        </p>

        <a href="#"
           class="mb-1 flex items-center rounded-xl px-4 py-3 text-slate-500 cursor-not-allowed">

            Guru

        </a>

        <a href="#"
           class="mb-1 flex items-center rounded-xl px-4 py-3 text-slate-500 cursor-not-allowed">

            Siswa

        </a>

        <p class="mt-6 mb-2 px-3 text-xs uppercase tracking-widest text-slate-500">
            Ujian
        </p>

        <a href="#"
           class="mb-1 flex items-center rounded-xl px-4 py-3 text-slate-500 cursor-not-allowed">

            Bank Soal

        </a>

        <a href="#"
           class="mb-1 flex items-center rounded-xl px-4 py-3 text-slate-500 cursor-not-allowed">

            Paket Ujian

        </a>

        <a href="#"
           class="mb-1 flex items-center rounded-xl px-4 py-3 text-slate-500 cursor-not-allowed">

            Pelaksanaan

        </a>

        <a href="#"
           class="mb-1 flex items-center rounded-xl px-4 py-3 text-slate-500 cursor-not-allowed">

            Nilai

        </a>

        <p class="mt-6 mb-2 px-3 text-xs uppercase tracking-widest text-slate-500">
            Sistem
        </p>

        <a href="#"
           class="mb-1 flex items-center rounded-xl px-4 py-3 text-slate-500 cursor-not-allowed">

            Pengaturan

        </a>

    </nav>

</aside>