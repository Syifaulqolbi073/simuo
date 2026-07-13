<form action="{{ $action }}" method="GET">

    <div class="flex flex-col gap-3 md:flex-row">

        <x-ui.input
            type="text"
            name="search"
            :value="request('search')"
            :placeholder="$placeholder" />

        <x-ui.button
            variant="secondary"
            type="submit">

            Cari

        </x-ui.button>

    </div>

</form>