@extends('layouts.app')

@section('title', 'Jadwal Ujian')

@section('content')

<div class="space-y-6">

    <x-layout.page-header
        title="Jadwal Ujian"
        subtitle="Manajemen jadwal ujian online"
        :total="$examSchedules->total()"
        totalLabel="Jadwal">

        <a href="{{ route('exam-schedules.create') }}">
            <x-ui.button>
                + Tambah Jadwal
            </x-ui.button>
        </a>

    </x-layout.page-header>

    <x-ui.card>

        <div class="border-b border-slate-200 p-5">

            <x-crud.search
                action="{{ route('exam-schedules.index') }}"
                placeholder="Cari jadwal ujian..." />

        </div>

        <x-ui.table>

            <thead>

                <tr>

                    <th>No</th>

                    <th>Jadwal</th>

                    <th>Guru</th>

                    <th>Kelas</th>

                    <th>Jenis</th>

                    <th>Tanggal</th>

                    <th>Jam</th>
                    
                    <th>Token</th>
                    
                    <th>Publish</th>

                    <th>Status</th>

                    <th>Aksi</th>

                </tr>

            </thead>

            <tbody>

            @forelse($examSchedules as $item)

                <tr>

                    <td>

                        {{ $loop->iteration + ($examSchedules->firstItem() ?? 0) - 1 }}

                    </td>

                    <td>

                        <div class="font-semibold">

                            {{ $item->title }}

                        </div>

                        <div class="text-sm text-slate-500">

                            {{ $item->teacherSubject->subject->name }}

                        </div>

                    </td>

                    <td>

                        {{ $item->teacherSubject->teacher->name }}

                    </td>

                    <td>

                        {{ $item->teacherSubject->classroom->name }}

                    </td>

                    <td>

                        {{ $item->examType->code }}

                    </td>

                    <td>

                        {{ $item->exam_date->format('d-m-Y') }}

                    </td>

                    <td>

                        {{ substr($item->start_time,0,5) }}

                        <br>

                        <small class="text-slate-500">

                            {{ $item->duration }} menit

                        </small>

                    </td>
                    <td>

    @if($item->token)

        <span class="rounded bg-slate-100 px-2 py-1 font-mono text-sm">

            {{ $item->token }}

        </span>

    @else

        -

    @endif

</td>

<td>

    @if($item->is_published)

        <x-ui.badge type="success">

            Published

        </x-ui.badge>

    @else

        <x-ui.badge type="secondary">

            Draft

        </x-ui.badge>

    @endif

</td>
                    
                    
           

                    <td>

                        @switch($item->status)

                            @case('Draft')

                                <x-ui.badge type="warning">

                                    Draft

                                </x-ui.badge>

                            @break

                            @case('Terjadwal')

                                <x-ui.badge type="info">

                                    Terjadwal

                                </x-ui.badge>

                            @break

                            @case('Berlangsung')

                                <x-ui.badge type="success">

                                    Berlangsung

                                </x-ui.badge>

                            @break

                            @case('Selesai')

                                <x-ui.badge>

                                    Selesai

                                </x-ui.badge>

                            @break

                            @default

                                <x-ui.badge type="danger">

                                    Ditutup

                                </x-ui.badge>

                        @endswitch

                    </td>

<td class="text-center">

    <x-ui.action-menu>

        <x-ui.actions.link
            :href="route('exam-schedules.edit', $item)">

            <x-heroicon-o-pencil-square class="h-4 w-4"/>

            <span>Edit</span>

        </x-ui.actions.link>

        <x-ui.actions.button
            :action="route('exam-schedules.publish', $item)">

            <x-heroicon-o-megaphone class="h-4 w-4"/>

            <span>

                {{ $item->is_published ? 'Unpublish' : 'Publish' }}

            </span>

        </x-ui.actions.button>

        <x-ui.actions.button
            :action="route('exam-schedules.generate-token', $item)">

            <x-heroicon-o-key class="h-4 w-4"/>

            <span>Generate Token</span>

        </x-ui.actions.button>

        <x-ui.actions.button
            :action="route('exam-schedules.duplicate', $item)"
            method="POST">

            <x-heroicon-o-document-duplicate class="h-4 w-4"/>

            <span>Duplicate</span>

        </x-ui.actions.button>

        <x-ui.actions.delete
            :action="route('exam-schedules.destroy', $item)" />

    </x-ui.action-menu>

</td>

                </tr>

            @empty

                <tr>

                    <td colspan="11">

                        <x-ui.empty-state
                            title="Belum ada Jadwal Ujian"
                            description="Silakan tambahkan jadwal ujian terlebih dahulu."/>

                    </td>

                </tr>

            @endforelse

            </tbody>

        </x-ui.table>

        <div class="border-t border-slate-200 p-5">

            {{ $examSchedules->links() }}

        </div>

    </x-ui.card>

</div>

@endsection