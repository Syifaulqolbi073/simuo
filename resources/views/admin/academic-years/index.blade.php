@extends('layouts.app')

@section('title', 'Tahun Pelajaran')

@section('content')

<div class="space-y-6">

    {{-- Header --}}
    <div class="flex items-center justify-between">

        <div>
            <h1 class="text-2xl font-bold text-slate-800">
                Tahun Pelajaran
            </h1>

            <p class="mt-1 text-sm text-slate-500">
                Kelola data Tahun Pelajaran MTs Al Fattah Juwana
            </p>
        </div>

        <a href="{{ route('academic-years.create') }}">
            <x-ui.button>
                + Tambah Tahun Pelajaran
            </x-ui.button>
        </a>

    </div>

    {{-- Flash Message --}}
    @if(session('success'))
        <div class="rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-green-700">
            {{ session('success') }}
        </div>
    @endif

    {{-- Card --}}
    <x-ui.card>

        <div class="border-b border-slate-200 p-5">

            <form action="{{ route('academic-years.index') }}" method="GET">

                <div class="flex gap-3">

                    <x-ui.input
                        type="text"
                        name="search"
                        :value="request('search')"
                        placeholder="Cari kode atau nama tahun pelajaran..." />

                    <x-ui.button type="secondary">
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
                                        type="secondary"
                                        type="submit">

                                        Aktifkan

                                    </x-ui.button>

                                </form>

                            @endunless

                            <a href="{{ route('academic-years.edit',$academicYear) }}">

                                <x-ui.button type="primary">

                                    Edit

                                </x-ui.button>

                            </a>

                            <form
                                action="{{ route('academic-years.destroy',$academicYear) }}"
                                method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus data ini?')">

                                @csrf
                                @method('DELETE')

                                <x-ui.button
                                    type="danger"
                                    type="submit">

                                    Hapus

                                </x-ui.button>

                            </form>

                        </div>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="6" class="px-6 py-12 text-center text-slate-500">

                        Belum ada data Tahun Pelajaran.

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