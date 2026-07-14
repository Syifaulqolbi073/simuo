@extends('layouts.app')

@section('title','Jenis Ujian')

@section('content')

<div class="space-y-6">

<x-layout.page-header

title="Jenis Ujian"

subtitle="Master jenis ujian"

:total="$examTypes->total()"

totalLabel="Data">

<a href="{{ route('exam-types.create') }}">

<x-ui.button>

+ Tambah Jenis Ujian

</x-ui.button>

</a>

</x-layout.page-header>

<x-ui.card>

<div class="border-b border-slate-200 p-5">

<x-crud.search
action="{{ route('exam-types.index') }}"
placeholder="Cari jenis ujian..." />

</div>

<x-ui.table>

<thead>

<tr>

<th>No</th>

<th>Kode</th>

<th>Nama</th>

<th>Kategori</th>

<th>Status</th>

<th>Aksi</th>

</tr>

</thead>

<tbody>

@forelse($examTypes as $item)

<tr>

<td>

{{ $loop->iteration + ($examTypes->firstItem() ?? 0)-1 }}

</td>

<td>{{ $item->code }}</td>

<td>{{ $item->name }}</td>

<td>{{ $item->category }}</td>

<td>

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

<td>

<x-crud.actions

:model="$item"

editRoute="exam-types.edit"

deleteRoute="exam-types.destroy"

:active="$item->is_active"/>

</td>

</tr>

@empty

<tr>

<td colspan="6">

<x-ui.empty-state

title="Belum ada Jenis Ujian"

description="Silakan tambahkan data."/>

</td>

</tr>

@endforelse

</tbody>

</x-ui.table>

<div class="border-t border-slate-200 p-5">

{{ $examTypes->links() }}

</div>

</x-ui.card>

</div>

@endsection