<nav class="sticky top-0 z-40 h-16 border-b border-slate-200 bg-white shadow-sm">

    <div class="flex h-full items-center justify-between px-4 lg:px-8">

        {{-- Kiri --}}
        <div class="flex items-center gap-4">

            {{-- Hamburger Mobile --}}
            <button
                @click="sidebar = true"
                class="rounded-lg p-2 hover:bg-slate-100 lg:hidden">

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="h-6 w-6"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M4 6h16M4 12h16M4 18h16"/>

                </svg>

            </button>

            <div>

                {{-- Breadcrumb --}}
                <div class="text-xs text-slate-500">

                    Dashboard

                    @hasSection('title')
                        <span class="mx-1">/</span>
                        @yield('title')
                    @endif

                </div>

                <div class="font-semibold text-slate-800">
                    SIMUO
                </div>

            </div>

        </div>

        {{-- Kanan --}}
        <div class="flex items-center gap-3">

            <div class="hidden text-right lg:block">

                <div class="font-semibold text-slate-800">
                    {{ auth()->user()->name }}
                </div>

                <div class="text-xs text-slate-500">
                    Super Administrator
                </div>

            </div>

            <div
                class="flex h-10 w-10 items-center justify-center rounded-full bg-emerald-600 font-bold text-white">

                {{ strtoupper(substr(auth()->user()->name,0,1)) }}

            </div>

            <form method="POST" action="{{ route('logout') }}">

                @csrf

                <button
                    type="submit"
                    class="rounded-xl bg-red-600 px-4 py-2 text-sm font-semibold text-white hover:bg-red-700">

                    Logout

                </button>

            </form>

        </div>

    </div>

</nav>