@extends('layouts.app')

@section('title', 'Mata Pelajaran')

@section('content')

<div class="space-y-6">

    {{-- Header --}}

 <x-layout.page-header

    title="Mata Pelajaran"

    subtitle="Kelola data Mata Pelajaran MTs Al Fattah Juwana"

    :total="$subjects->total()"

    totalLabel="Mata Pelajaran">

    <a href="{{ route('subjects.create') }}">

        <x-ui.button>

            + Tambah Mata Pelajaran

        </x-ui.button>

    </a>

</x-layout.page-header>

    {{-- Card --}}
    <x-ui.card>

        <div class="border-b border-slate-200 p-5">

           <x-crud.search
    action="{{ route('subjects.index') }}"
    placeholder="Cari kode atau nama mata pelajaran..." />
    
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
                        Nama Mata Pelajaran
                    </th>

                    <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">
                        Kelompok
                    </th>
                    
        <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">
                        KKM
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
@forelse($subjects as $subject)
            

                <tr class="hover:bg-slate-50">

                    <td class="px-6 py-4">
                        {{ $loop->iteration + ($subjects->firstItem() ?? 0) - 1 }}
                    </td>

<td class="px-6 py-4 font-medium">
    {{ $subject->code }}
</td>

<td class="px-6 py-4">
    {{ $subject->name }}
</td>

<td class="px-6 py-4">
    {{ $subject->subject_group }}
</td>

<td class="px-6 py-4 text-center">
    {{ $subject->minimum_score }}
</td>

<td class="px-6 py-4 text-center">

    @if($subject->is_active)

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
        :model="$subject"
        editRoute="subjects.edit"
        deleteRoute="subjects.destroy"
        :active="$subject->is_active" />

</td>

                </tr>

            @empty

                <tr>

<td colspan="7">

<x-ui.empty-state
    title="Belum ada Mata Pelajaran"
    description="Silakan tambahkan Mata Pelajaran terlebih dahulu." />

</td>

                </tr>

            @endforelse

            </tbody>

        </x-ui.table>

        <div class="border-t border-slate-200 p-5">

            {{ $subjects->links() }}

        </div>

    </x-ui.card>

</div>

@endsection