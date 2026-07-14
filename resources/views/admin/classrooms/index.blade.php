@extends('layouts.app')

@section('title', 'Kelas')

@section('content')

<div class="space-y-6">

    {{-- Header --}}
<x-layout.page-header

    title="Kelas"

    subtitle="Kelola data Kelas"

    :total="$classrooms->total()"

    totalLabel="Kelas">

  <a href="{{ route('classrooms.create') }}">
            <x-ui.button variant="primary">
    + Tambah Kelas
</x-ui.button>
        </a>


</x-layout.page-header>
    


    {{-- Card --}}
    <x-ui.card>

        <div class="border-b border-slate-200 p-5">

            <x-crud.search
    action="{{ route('classrooms.index') }}"
    placeholder="Cari kode atau nama kelas..." />
        </div>

        <x-ui.table>

            <thead class="bg-slate-50">

                <tr>

                    <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">
                        No
                    </th>

                    <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">
                        Tingkat
                    </th>

                    <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">
                        Kode
                    </th>

                    <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">
                        Nama Kelas
                    </th>
                    
                    <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">
                        Kapasitas
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

            @forelse($classrooms as $classroom)

                <tr class="hover:bg-slate-50">

                    <td class="px-6 py-4">
                        {{ $loop->iteration + ($classrooms->firstItem() ?? 0) - 1 }}
                    </td>

                   <td class="px-6 py-4">
    {{ $classroom->grade->code }}
</td>

<td class="px-6 py-4 font-medium">
    {{ $classroom->code }}
</td>

<td class="px-6 py-4">
    {{ $classroom->name }}
</td>
<td class="px-6 py-4 text-center">
    {{ $classroom->capacity }}
</td>
                    <td class="px-6 py-4 text-center">

                        @if($classroom->is_active)

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
    :model="$classroom"
    editRoute="classrooms.edit"
    deleteRoute="classrooms.destroy"
    :active="$classroom->is_active" />
                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="7">

                    <x-ui.empty-state
    title="Belum ada Kelas"
    description="Silakan tambahkan Kelas terlebih dahulu." />

                    </td>

                </tr>

            @endforelse

            </tbody>

        </x-ui.table>

        <div class="border-t border-slate-200 p-5">
{{ $classrooms->links() }}
            

        </div>

    </x-ui.card>

</div>

@endsection