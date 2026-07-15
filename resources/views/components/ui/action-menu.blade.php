<div
    x-data="{ open: false }"
    class="relative inline-block">

    <button
        type="button"
        @click.stop="open = !open"
        class="rounded-lg p-2 text-slate-500 transition hover:bg-slate-100 hover:text-slate-700">

        <x-heroicon-o-ellipsis-vertical class="h-5 w-5"/>

    </button>

    <div
        x-show="open"
        x-cloak
        x-transition.origin.top.right
        @click.outside="open = false"
        class="absolute right-0 top-full z-[9999] mt-2 w-56 overflow-hidden rounded-xl border border-slate-200 bg-white py-2 shadow-2xl">

        {{ $slot }}

    </div>

</div>