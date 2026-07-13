<nav class="sticky top-0 z-30 border-b border-slate-200 bg-white">

    <div class="flex h-16 items-center justify-between px-6">

        <div>

            <h1 class="text-xl font-bold text-slate-800">
                @yield('title','Dashboard')
            </h1>

            <p class="text-sm text-slate-500">
                Sistem Ujian Online MTs Al Fattah Juwana
            </p>

        </div>

        <div class="flex items-center gap-5">

            <div class="text-right">

                <p class="text-sm font-semibold text-slate-800">
                    {{ auth()->user()->name }}
                </p>

                <p class="text-xs text-slate-500">
                    Super Administrator
                </p>

            </div>

            <div
                class="flex h-10 w-10 items-center justify-center rounded-full bg-emerald-600 text-white font-bold">

                {{ strtoupper(substr(auth()->user()->name,0,1)) }}

            </div>

            <form method="POST"
                  action="{{ route('logout') }}">

                @csrf

                <button
                    class="rounded-xl bg-red-600 px-4 py-2 text-sm font-medium text-white hover:bg-red-700">

                    Logout

                </button>

            </form>

        </div>

    </div>

</nav>