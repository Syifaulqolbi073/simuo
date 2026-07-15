@props([
    'action',
])

<form
    action="{{ $action }}"
    method="POST"
    data-confirm-delete>

    @csrf

    @method('DELETE')

    <button
        type="submit"
        class="flex w-full items-center gap-3 px-4 py-3 text-left text-sm font-medium text-red-600 transition hover:bg-red-50">

        <x-heroicon-o-trash class="h-4 w-4"/>

        <span>Hapus</span>

    </button>

</form>