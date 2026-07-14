@extends('layouts.app')

@section('title', 'Guru')

@section('content')

<div class="space-y-6">

    {{-- Header --}}

 <x-layout.page-header

    title="Guru"

    subtitle="Kelola data Guru MTs Al Fattah Juwana"

    :total="$teachers->total()"

    totalLabel="Guru">

    <a href="{{ route('teachers.create') }}">

        <x-ui.button>

            + Tambah Guru

        </x-ui.button>

    </a>

</x-layout.page-header>

    {{-- Card --}}
    <x-ui.card>

        <div class="border-b border-slate-200 p-5">

           <x-crud.search
    action="{{ route('teachers.index') }}"
    placeholder="Cari NIP, nama atau email guru..." />
    
    </div>

        <x-ui.table>

            <thead class="bg-slate-50">

                <tr>

                    <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">
                        No
                    </th>

                    <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">
                        NIP
                    </th>

                    <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">
                        Nama Guru
                    </th>

                    <th class="px-6 py-4 text-center text-sm font-semibold text-slate-600">
    L/P
</th>
                    
        <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">
                        Email
                    </th>
                    
                     <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">
                        No. HP
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
@forelse($teachers as $teacher)
            

                <tr class="hover:bg-slate-50">

                    <td class="px-6 py-4">
                        {{ $loop->iteration + ($teachers->firstItem() ?? 0) - 1 }}
                    </td>

<td class="px-6 py-4 font-medium">
{{ $teacher->nip ?? '-' }}
</td>

<td class="px-6 py-4">
    {{ $teacher->full_name }}
</td>

<td class="px-6 py-4 text-center">
    {{ $teacher->gender_label }}
</td>

<td class="px-6 py-4">
    {{ $teacher->email ?? '-' }}
</td>

<td class="px-6 py-4">
    {{ $teacher->phone ?? '-' }}
</td>

<td class="px-6 py-4 text-center">

    @if($teacher->is_active)

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
        :model="$teacher"
        editRoute="teachers.edit"
        deleteRoute="teachers.destroy"
        :active="$teacher->is_active" />

</td>

                </tr>

            @empty

                <tr>

<td colspan="8">

<x-ui.empty-state
    title="Belum ada Guru"
    description="Silakan tambahkan Guru terlebih dahulu." />

</td>

                </tr>

            @endforelse

            </tbody>

        </x-ui.table>

        <div class="border-t border-slate-200 p-5">

            {{ $teachers->links() }}

        </div>

    </x-ui.card>

</div>

@endsection