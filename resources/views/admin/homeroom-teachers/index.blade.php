@extends('layouts.app')

@section('title', 'Wali Kelas')

@section('content')

<div class="space-y-6">

<x-layout.page-header

    title="Wali Kelas"

    subtitle="Kelola data wali kelas"

    :total="$homeroomTeachers->total()"

    totalLabel="Data">

    <a href="{{ route('homeroom-teachers.create') }}">

        <x-ui.button>

            + Tambah Wali Kelas

        </x-ui.button>

    </a>

</x-layout.page-header>

<x-ui.card>

<div class="border-b border-slate-200 p-5">

<x-crud.search
    action="{{ route('homeroom-teachers.index') }}"
    placeholder="Cari guru atau kelas..." />

</div>

<x-ui.table>

<thead class="bg-slate-50">

<tr>

<th class="px-6 py-4">No</th>

<th class="px-6 py-4">
Guru
</th>

<th class="px-6 py-4">
Kelas
</th>

<th class="px-6 py-4">
Tahun Pelajaran
</th>

<th class="px-6 py-4">
Semester
</th>

<th class="px-6 py-4 text-center">
Status
</th>

<th class="px-6 py-4 text-center">
Aksi
</th>

</tr>

</thead>

<tbody class="divide-y divide-slate-200">

@forelse($homeroomTeachers as $item)

<tr class="hover:bg-slate-50">

<td class="px-6 py-4">

{{ $loop->iteration + ($homeroomTeachers->firstItem() ?? 0) - 1 }}

</td>

<td class="px-6 py-4">

{{ $item->teacher->full_name }}

</td>

<td class="px-6 py-4">

{{ $item->classroom->name }}

</td>

<td class="px-6 py-4">

{{ $item->academicYear->name }}

</td>

<td class="px-6 py-4">

{{ $item->semester->name }}

</td>

<td class="px-6 py-4 text-center">

@if($item->is_active)

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
    :model="$item"
    editRoute="homeroom-teachers.edit"
    deleteRoute="homeroom-teachers.destroy"
    :active="$item->is_active"/>

</td>

</tr>

@empty

<tr>

<td colspan="7">

<x-ui.empty-state
title="Belum ada Wali Kelas"
description="Silakan tambahkan wali kelas."/>

</td>

</tr>

@endforelse

</tbody>

</x-ui.table>

<div class="border-t border-slate-200 p-5">

{{ $homeroomTeachers->links() }}

</div>

</x-ui.card>

</div>

@endsection