<nav class="bg-green-700 text-white shadow">

    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between">

        <div>

            <span class="font-bold">

                SIMUO

            </span>

        </div>

        <div>

            {{ Auth::user()->name ?? 'Guest' }}

        </div>

    </div>

</nav>