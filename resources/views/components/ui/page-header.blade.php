@props([
    'title',
    'description' => null,
])

<div class="mb-6 flex flex-col gap-4 md:flex-row md:items-center md:justify-between">

    <div>

        <h1 class="text-2xl font-bold text-slate-800">
            {{ $title }}
        </h1>

        @if($description)
            <p class="mt-1 text-sm text-slate-500">
                {{ $description }}
            </p>
        @endif

    </div>

    @isset($action)

        <div class="shrink-0">

            {{ $action }}

        </div>

    @endisset

</div>