@props([
    'title',
    'subtitle' => null,
    'total' => null,
    'totalLabel' => null,
])

<div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">

    <div>

        <h1 class="text-2xl font-bold text-slate-800">
            {{ $title }}
        </h1>

        @if($subtitle)

            <p class="mt-1 text-sm text-slate-500">
                {{ $subtitle }}
            </p>

        @endif

        @if(!is_null($total))

            <p class="mt-1 text-xs text-slate-400">

                Total :
                {{ $total }}

                {{ $totalLabel }}

            </p>

        @endif

    </div>

    <div>

        {{ $slot }}

    </div>

</div>