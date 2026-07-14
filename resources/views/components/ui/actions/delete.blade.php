@props([
    'action',
])

<form
    action="{{ $action }}"
    method="POST">

    @csrf

    @method('DELETE')

    <button
        type="submit"
        onclick="return confirm('Yakin ingin menghapus data ini?')"
        class="flex w-full items-center gap-3 border-t border-slate-200 px-4 py-2 text-left text-sm text-red-600 transition hover:bg-red-50">

        <x-heroicon-o-trash class="h-4 w-4"/>

        Hapus

    </button>

</form>