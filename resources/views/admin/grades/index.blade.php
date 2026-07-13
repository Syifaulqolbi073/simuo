@extends('layouts.app')

@section('title', 'Tingkat')

@section('content')

<div class="space-y-6">

    {{-- Header --}}

    <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">
                Tingkat
            </h1>

            <p class="mt-1 text-sm text-slate-500">
                Kelola data Tingkat MTs Al Fattah Juwana
            </p>
            <p class="mt-1 text-xs text-slate-400">
    Total : {{ $grades->total() }} Tingkat
</p>
        </div>

        <a href="{{ route('grades.create') }}">
            <x-ui.button variant="primary">
    + Tambah Tingkat
</x-ui.button>
        </a>

    </div>

<x-crud.flash />
    {{-- Card --}}
    <x-ui.card>

        <div class="border-b border-slate-200 p-5">

            <x-crud.search
    action="{{ route('grades.index') }}"
    placeholder="Cari kode atau nama tingkat..." />
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
                        Nama Tingkat
                    </th>

                    <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">
                        Urutan
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

            @forelse($grades as $grade)

                <tr class="hover:bg-slate-50">

                    <td class="px-6 py-4">
                        {{ $loop->iteration + ($grades->firstItem() ?? 0) - 1 }}
                    </td>

                    <td class="px-6 py-4 font-medium">
                        {{ $grade->code }}
                    </td>

                    <td class="px-6 py-4">
                        {{ $grade->name }}
                    </td>

                   <td class="px-6 py-4 text-center">
    {{ $grade->order }}
</td>

                    <td class="px-6 py-4 text-center">

                        @if($grade->is_active)

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

                       <x-crud.actions
    :model="$grade"
    editRoute="grades.edit"
    deleteRoute="grades.destroy"
    activateRoute="grades.activate"
    :active="$grade->is_active" />
                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="6" class="px-6 py-12 text-center text-slate-500">

                        Belum ada data Tingkat.

                    </td>

                </tr>

            @endforelse

            </tbody>

        </x-ui.table>

        <div class="border-t border-slate-200 p-5">

            {{ $grades->links() }}

        </div>

    </x-ui.card>

</div>

@endsection