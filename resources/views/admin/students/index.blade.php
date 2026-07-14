@extends('layouts.app')

@section('title', 'Siswa')

@section('content')

<div class="space-y-6">

    <x-layout.page-header
        title="Siswa"
        subtitle="Kelola data Siswa MTs Al Fattah Juwana"
        :total="$students->total()"
        totalLabel="Siswa">

        <a href="{{ route('students.create') }}">

            <x-ui.button>

                + Tambah Siswa

            </x-ui.button>

        </a>

    </x-layout.page-header>

    <x-crud.flash />

    <x-ui.card>

        <div class="border-b border-slate-200 p-5">

            <x-crud.search
                action="{{ route('students.index') }}"
                placeholder="Cari NIS, NISN atau nama siswa..." />

        </div>

        <x-ui.table>

            <thead class="bg-slate-50">

                <tr>

                    <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">
                        No
                    </th>

                    <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">
                        NIS
                    </th>

                    <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">
                        NISN
                    </th>

                    <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">
                        Nama Siswa
                    </th>

                    <th class="px-6 py-4 text-center text-sm font-semibold text-slate-600">
                        L/P
                    </th>

                    <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">
                        Tempat, Tanggal Lahir
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

            @forelse($students as $student)

                <tr class="hover:bg-slate-50">

                    <td class="px-6 py-4">

                        {{ $loop->iteration + ($students->firstItem() ?? 0) - 1 }}

                    </td>

                    <td class="px-6 py-4 font-medium">

                        {{ $student->nis ?? '-' }}

                    </td>

                    <td class="px-6 py-4">

                        {{ $student->nisn ?? '-' }}

                    </td>

                    <td class="px-6 py-4">

                        {{ $student->full_name }}

                    </td>

                    <td class="px-6 py-4 text-center">

                        {{ $student->gender_label }}

                    </td>

                    <td class="px-6 py-4">

                        @if($student->birth_place || $student->birth_date)

                            {{ $student->birth_place ?? '-' }}

                            @if($student->birth_date)

                                , {{ $student->birth_date->format('d-m-Y') }}

                            @endif

                        @else

                            -

                        @endif

                    </td>

                    <td class="px-6 py-4 text-center">

                        @if($student->is_active)

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
                            :model="$student"
                            editRoute="students.edit"
                            deleteRoute="students.destroy"
                            :active="$student->is_active" />

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="8">

                        <x-ui.empty-state
                            title="Belum ada Siswa"
                            description="Silakan tambahkan data siswa terlebih dahulu." />

                    </td>

                </tr>

            @endforelse

            </tbody>

        </x-ui.table>

        <div class="border-t border-slate-200 p-5">

            {{ $students->links() }}

        </div>

    </x-ui.card>

</div>

@endsection