@extends('layouts.app')

@section('title', 'Guru Mengajar')

@section('content')

<div class="space-y-6">

    <x-layout.page-header
        title="Guru Mengajar"
        subtitle="Kelola data guru pengampu mata pelajaran"
        :total="$teacherSubjects->total()"
        totalLabel="Data">

        <a href="{{ route('teacher-subjects.create') }}">

            <x-ui.button>

                + Tambah Guru Mengajar

            </x-ui.button>

        </a>

    </x-layout.page-header>

    <x-ui.card>

        <div class="border-b border-slate-200 p-5">

            <x-crud.search
                action="{{ route('teacher-subjects.index') }}"
                placeholder="Cari guru atau mata pelajaran..." />

        </div>

        <x-ui.table>

            <thead class="bg-slate-50">

                <tr>

                    <th class="px-6 py-4">No</th>

                    <th class="px-6 py-4">Guru</th>

                    <th class="px-6 py-4">Mata Pelajaran</th>

                    <th class="px-6 py-4">Kelas</th>

                    <th class="px-6 py-4">Tahun</th>

                    <th class="px-6 py-4">Semester</th>

                    <th class="px-6 py-4 text-center">Status</th>

                    <th class="px-6 py-4 text-center">Aksi</th>

                </tr>

            </thead>

            <tbody class="divide-y divide-slate-200">

                @forelse($teacherSubjects as $item)

                    <tr class="hover:bg-slate-50">

                        <td class="px-6 py-4">
                            {{ $loop->iteration + ($teacherSubjects->firstItem() ?? 0) - 1 }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $item->teacher->full_name }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $item->subject->name }}
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
                                editRoute="teacher-subjects.edit"
                                deleteRoute="teacher-subjects.destroy"
                                :active="$item->is_active"/>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="8">

                            <x-ui.empty-state
                                title="Belum ada Guru Mengajar"
                                description="Silakan tambahkan guru mengajar." />

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </x-ui.table>

        <div class="border-t border-slate-200 p-5">

            {{ $teacherSubjects->links() }}

        </div>

    </x-ui.card>

</div>

@endsection