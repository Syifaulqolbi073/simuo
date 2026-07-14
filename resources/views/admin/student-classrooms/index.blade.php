@extends('layouts.app')

@section('title', 'Penempatan Siswa')

@section('content')

<div class="space-y-6">

    <x-layout.page-header
        title="Penempatan Siswa"
        subtitle="Kelola penempatan siswa ke kelas"
        :total="$studentClassrooms->total()"
        totalLabel="Data">

        <a href="{{ route('student-classrooms.create') }}">

            <x-ui.button>

                + Tambah Penempatan

            </x-ui.button>

        </a>

    </x-layout.page-header>

    <x-crud.flash />

    <x-ui.card>

        <div class="border-b border-slate-200 p-5">

            <x-crud.search
                action="{{ route('student-classrooms.index') }}"
                placeholder="Cari nama siswa..." />

        </div>

        <x-ui.table>

            <thead class="bg-slate-50">

                <tr>

                    <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">
                        No
                    </th>

                    <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">
                        Siswa
                    </th>

                    <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">
                        Kelas
                    </th>

                    <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">
                        Tahun Pelajaran
                    </th>

                    <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">
                        Semester
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

            @forelse($studentClassrooms as $item)

                <tr class="hover:bg-slate-50">

                    <td class="px-6 py-4">

                        {{ $loop->iteration + ($studentClassrooms->firstItem() ?? 0) - 1 }}

                    </td>

                    <td class="px-6 py-4">

                        {{ $item->student->full_name }}

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
                            editRoute="student-classrooms.edit"
                            deleteRoute="student-classrooms.destroy"
                            :active="$item->is_active" />

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="7">

                        <x-ui.empty-state
                            title="Belum ada penempatan siswa"
                            description="Silakan tambahkan data penempatan siswa terlebih dahulu." />

                    </td>

                </tr>

            @endforelse

            </tbody>

        </x-ui.table>

        <div class="border-t border-slate-200 p-5">

            {{ $studentClassrooms->links() }}

        </div>

    </x-ui.card>

</div>

@endsection