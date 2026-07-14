@extends('layouts.app')

@section('title', 'Tahun Pelajaran')

@section('content')

<div class="space-y-6">

    {{-- Header --}}
    <x-layout.page-header

    title="Tahun Pelajaran"

    subtitle="Kelola data Tahun Pelajaran"

    :total="$academicYears->total()"

    totalLabel="Tahun Pelajaran">

    ... <a href="{{ route('academic-years.create') }}">
            <x-ui.button>
                + Tambah Tahun Pelajaran
            </x-ui.button>
        </a>

</x-layout.page-header>




    {{-- Card --}}
    <x-ui.card>

        <div class="border-b border-slate-200 p-5">

            <form action="{{ route('academic-years.index') }}" method="GET">

                
<div class="flex flex-col gap-3 md:flex-row">
                    <x-ui.input
                        type="text"
                        name="search"
                        :value="request('search')"
                        placeholder="Cari kode atau nama tahun pelajaran..." />

                    
                        <x-ui.button
    variant="secondary"
    type="submit">
                        Cari
                    </x-ui.button>

                </div>

            </form>

        </div>

        <x-ui.table>

            <thead class="bg-slate-50">

                <tr>

                    <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">
                        No
                    </th>

                    <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">
                        Kode
                    </th>

                    <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">
                        Nama
                    </th>

                    <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">
                        Periode
                    </th>

                    <th class="px-6 py-4 text-center text-sm font-semibold text-slate-600">
                        Status
                    </th>

                    <th class="px-6 py-4 text-center text-sm font-semibold text-slate-600">
                        Aksi
                    </th>

                </tr>

            </thead>

            <tbody class="divide-y divide-slate-200">

            @forelse($academicYears as $academicYear)

                <tr class="hover:bg-slate-50">

                    <td class="px-6 py-4">
                        {{ $loop->iteration + ($academicYears->firstItem() ?? 0) - 1 }}
                    </td>

                    <td class="px-6 py-4 font-medium">
                        {{ $academicYear->code }}
                    </td>

                    <td class="px-6 py-4">
                        {{ $academicYear->name }}
                    </td>

                    <td class="px-6 py-4">
                        {{ $academicYear->start_date->format('d M Y') }}
                        -
                        {{ $academicYear->end_date->format('d M Y') }}
                    </td>

                    <td class="px-6 py-4 text-center">

                        @if($academicYear->is_active)

                            <x-ui.badge type="success">
                                Aktif
                            </x-ui.badge>

                        @else

                            <x-ui.badge type="default">
                                Nonaktif
                            </x-ui.badge>

                        @endif

                    </td>

                    <td class="px-6 py-4">

                        <div class="flex justify-center gap-2">

                            @unless($academicYear->is_active)

                                <form
                                    action="{{ route('academic-years.activate',$academicYear) }}"
                                    method="POST">

                                    @csrf
                                    @method('PATCH')

                                  <x-ui.button
    variant="secondary"
    type="submit">

                                        Aktifkan

                                    </x-ui.button>

                                </form>

                            @endunless

                            <a href="{{ route('academic-years.edit',$academicYear) }}">

                             <x-ui.button
    variant="primary">
                                    Edit

                                </x-ui.button>

                            </a>

<form
    action="{{ route('academic-years.destroy',$academicYear) }}"
    method="POST"
    data-confirm-delete>

                                @csrf
                                @method('DELETE')

<x-ui.button
    variant="danger"
    type="submit">

                                    Hapus

                                </x-ui.button>

                            </form>

                        </div>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="6">
<x-ui.empty-state
    title="Belum ada Tahun Pelajaran"
    description="Silakan tambahkan Tahun Pelajaran terlebih dahulu." />
                    </td>

                </tr>

            @endforelse

            </tbody>

        </x-ui.table>

        <div class="border-t border-slate-200 p-5">

            {{ $academicYears->links() }}

        </div>

    </x-ui.card>

</div>

@endsection