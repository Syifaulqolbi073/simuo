@props([
    'title',
    'subtitle' => null,
    'total' => null,
    'totalLabel' => null,
])

<div class="mb-6 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

    <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">

        <div>

            <h1 class="text-2xl font-bold tracking-tight text-slate-800">
                {{ $title }}
            </h1>

            @if($subtitle)

                <p class="mt-1 text-sm text-slate-500">
                    {{ $subtitle }}
                </p>

            @endif

            @if(! is_null($total))

                <div class="mt-3 inline-flex items-center rounded-full bg-emerald-50 px-3 py-1 text-sm font-medium text-emerald-700">

                    {{ number_format($total) }}
                    {{ $totalLabel }}

                </div>

            @endif

        </div>

        @if(trim($slot))

            <div class="flex items-center gap-2">

                {{ $slot }}

            </div>

        @endif

    </div>

</div>