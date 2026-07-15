@props([
    'action',
    'method' => 'PATCH',
])

<form
    action="{{ $action }}"
    method="POST">

    @csrf

    @method($method)

    <button
        type="submit"
        class="flex w-full items-center gap-3 px-4 py-3 text-left text-sm text-slate-700 transition hover:bg-slate-100">

        {{ $slot }}

    </button>

</form>