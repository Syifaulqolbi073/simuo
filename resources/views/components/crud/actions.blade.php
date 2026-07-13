@props([
    'editRoute',
    'deleteRoute',
    'activateRoute' => null,
    'model',
    'active' => false,
])

<div class="flex justify-center gap-2">

    @unless($active)

        @if($activateRoute)

            <form
                action="{{ route($activateRoute, $model) }}"
                method="POST">

                @csrf
                @method('PATCH')

                <x-ui.button
                    variant="secondary"
                    type="submit">

                    Aktifkan

                </x-ui.button>

            </form>

        @endif

    @endunless

    <a href="{{ route($editRoute, $model) }}">

        <x-ui.button
            variant="primary">

            Edit

        </x-ui.button>

    </a>

    <form
        action="{{ route($deleteRoute, $model) }}"
        method="POST"
        onsubmit="return confirm('Yakin ingin menghapus data ini?')">

        @csrf
        @method('DELETE')

        <x-ui.button
            variant="danger"
            type="submit">

            Hapus

        </x-ui.button>

    </form>

</div>