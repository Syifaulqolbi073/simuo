<div
    x-data="{ open: false }"
    class="relative inline-block text-left">

    <button
        type="button"
        @click="open = !open"
        class="rounded-lg p-2 text-slate-500 transition hover:bg-slate-100 hover:text-slate-700">

        <x-heroicon-o-ellipsis-vertical class="h-5 w-5"/>

    </button>

    <div
        x-show="open"
        @click.outside="open = false"
        x-transition
        x-cloak
        class="absolute right-0 z-50 mt-2 w-56 overflow-hidden rounded-xl border border-slate-200 bg-white shadow-xl">

        {{ $slot }}

    </div>

</div>