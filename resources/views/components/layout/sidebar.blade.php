<aside class="w-72 min-h-screen bg-green-800 text-white">

    <div class="border-b border-green-700 p-6">
        <h1 class="text-2xl font-bold">SIMUO</h1>
        <p class="text-sm text-green-200">MTs Al Fattah Juwana</p>
    </div>

    <nav class="p-4 space-y-1">

        <a href="{{ route('dashboard') }}"
           class="block rounded-lg px-4 py-3 {{ request()->routeIs('dashboard') ? 'bg-green-700 font-semibold' : 'hover:bg-green-700' }}">
            📊 Dashboard
        </a>

        <p class="mt-6 mb-2 px-4 text-xs uppercase tracking-wider text-green-300">
            Master Akademik
        </p>

        <a href="{{ route('academic-years.index') }}"
           class="block rounded-lg px-4 py-3 {{ request()->routeIs('academic-years.*') ? 'bg-green-700 font-semibold' : 'hover:bg-green-700' }}">
            📅 Tahun Pelajaran
        </a>

        <a href="#" class="block rounded-lg px-4 py-3 text-green-300 cursor-not-allowed">
            📆 Semester
        </a>

        <a href="#" class="block rounded-lg px-4 py-3 text-green-300 cursor-not-allowed">
            🎓 Tingkat
        </a>

        <a href="#" class="block rounded-lg px-4 py-3 text-green-300 cursor-not-allowed">
            🏫 Kelas
        </a>

        <a href="#" class="block rounded-lg px-4 py-3 text-green-300 cursor-not-allowed">
            📚 Mata Pelajaran
        </a>

        <a href="#" class="block rounded-lg px-4 py-3 text-green-300 cursor-not-allowed">
            🚪 Ruangan
        </a>

        <p class="mt-6 mb-2 px-4 text-xs uppercase tracking-wider text-green-300">
            Master Pengguna
        </p>

        <a href="#" class="block rounded-lg px-4 py-3 text-green-300 cursor-not-allowed">
            👨 Guru
        </a>

        <a href="#" class="block rounded-lg px-4 py-3 text-green-300 cursor-not-allowed">
            👨‍🎓 Siswa
        </a>

        <a href="#" class="block rounded-lg px-4 py-3 text-green-300 cursor-not-allowed">
            👤 User
        </a>

        <p class="mt-6 mb-2 px-4 text-xs uppercase tracking-wider text-green-300">
            Ujian
        </p>

        <a href="#" class="block rounded-lg px-4 py-3 text-green-300 cursor-not-allowed">
            📝 Bank Soal
        </a>

        <a href="#" class="block rounded-lg px-4 py-3 text-green-300 cursor-not-allowed">
            🖥 Pelaksanaan Ujian
        </a>

        <a href="#" class="block rounded-lg px-4 py-3 text-green-300 cursor-not-allowed">
            📊 Nilai
        </a>

        <a href="#" class="block rounded-lg px-4 py-3 text-green-300 cursor-not-allowed">
            📄 Laporan
        </a>

        <a href="#" class="block rounded-lg px-4 py-3 text-green-300 cursor-not-allowed">
            ⚙ Pengaturan
        </a>

    </nav>

</aside>