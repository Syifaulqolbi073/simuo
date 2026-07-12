<nav class="bg-white shadow-sm border-b">

    <div class="flex justify-between items-center px-6 py-4">

        <div>
            <h2 class="text-xl font-bold">
                Dashboard
            </h2>
        </div>

        <div class="flex items-center gap-4">

            <span class="text-sm text-gray-700">
                {{ auth()->user()->name }}
            </span>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button
                    type="submit"
                    class="rounded-lg bg-red-600 px-3 py-2 text-white hover:bg-red-700">

                    Logout

                </button>

            </form>

        </div>

    </div>

</nav>