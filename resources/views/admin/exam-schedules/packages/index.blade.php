@extends('layouts.app')

@section('title', 'Paket Ujian')

@section('content')

<div class="space-y-6">

    <x-layout.page-header
        title="Paket Ujian"
        :subtitle="$examSchedule->title">

        <form
    action="{{ route('exam-schedules.packages.generate', $examSchedule) }}"
    method="POST"
    onsubmit="return confirm('Generate paket ujian sekarang?')">

    @csrf

    <x-ui.button>

        <x-heroicon-o-cog-6-tooth class="h-5 w-5"/>

        Generate Paket

    </x-ui.button>

</form>

    </x-layout.page-header>
    
    @if(session('success'))

    <div class="rounded-lg bg-green-100 p-4 text-green-700">

        {{ session('success') }}

    </div>

@endif

@if(session('error'))

    <div class="rounded-lg bg-red-100 p-4 text-red-700">

        {{ session('error') }}

    </div>

@endif
    <div class="grid grid-cols-1 gap-4 md:grid-cols-4">

    <x-ui.stat-card
        title="Jumlah Paket"
        :value="$packages->count()"
        icon="heroicon-o-archive-box"/>

    <x-ui.stat-card
        title="Total Soal"
        :value="$packages->sum('total_question')"
        icon="heroicon-o-document-text"/>

    <x-ui.stat-card
        title="Total Nilai"
        :value="$packages->sum('total_score')"
        icon="heroicon-o-calculator"/>

    <x-ui.stat-card
        title="Paket Aktif"
        :value="$packages->where('is_active', true)->count()"
        icon="heroicon-o-check-circle"/>

</div>

    <x-ui.card>

        @if($packages->isEmpty())

            <x-ui.empty-state
                title="Belum ada paket"
                description="Klik Generate Paket untuk membuat paket ujian." />

        @else

            <x-ui.table>

                <thead>

                    <tr>

                        <th>Kode</th>

                        <th>Nama</th>

                        <th>Jumlah Soal</th>

                        <th>Total Nilai</th>

                        <th>Status</th>

                        <th>Aksi</th>

                    </tr>

                </thead>

                <tbody>

                @foreach($packages as $package)

                    <tr>

                        <td>{{ $package->package_code }}</td>

                        <td>{{ $package->package_name }}</td>

                        <td>{{ $package->total_question }}</td>

                        <td>{{ $package->total_score }}</td>

                        <td>

                            @if($package->is_active)

                                <x-ui.badge type="success">

                                    Aktif

                                </x-ui.badge>

                            @else

                                <x-ui.badge type="secondary">

                                    Nonaktif

                                </x-ui.badge>

                            @endif

                        </td>

                        <td class="text-center">

    <x-ui.action-menu>

        <x-ui.actions.link
            :href="route(
                'exam-schedules.packages.show',
                [$examSchedule, $package]
            )">

            <x-heroicon-o-eye class="h-4 w-4"/>

            <span>Preview</span>

        </x-ui.actions.link>

        <form
            action="{{ route('exam-schedules.packages.regenerate', $examSchedule) }}"
            method="POST">

            @csrf

            <button
                type="submit"
                class="flex w-full items-center gap-2 px-4 py-2 text-left text-sm hover:bg-slate-100">

                <x-heroicon-o-arrow-path class="h-4 w-4"/>

                <span>Generate Ulang</span>

            </button>

        </form>

        <x-ui.actions.delete
            :action="route(
                'exam-schedules.packages.destroy',
                [$examSchedule, $package]
            )"/>

    </x-ui.action-menu>

</td>

                    </tr>

                @endforeach

                </tbody>

            </x-ui.table>

        @endif

    </x-ui.card>

</div>

@endsection