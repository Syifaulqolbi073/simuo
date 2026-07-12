@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold">Tahun Pelajaran</h1>
            <p class="text-gray-500">Daftar Tahun Pelajaran</p>
        </div>

        <a href="{{ route('academic-years.create') }}"
           class="bg-green-700 hover:bg-green-800 text-white px-4 py-2 rounded-lg">
            + Tambah
        </a>
    </div>

    @if(session('success'))
        <div class="mb-4 rounded-lg bg-green-100 border border-green-300 text-green-800 px-4 py-3">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-xl shadow">

        <table class="min-w-full">

            <thead class="bg-slate-100">

                <tr>

                    <th class="px-4 py-3 text-left">Kode</th>

                    <th class="px-4 py-3 text-left">Nama</th>

                    <th class="px-4 py-3 text-left">Mulai</th>

                    <th class="px-4 py-3 text-left">Selesai</th>

                    <th class="px-4 py-3 text-center">Status</th>

                    <th class="px-4 py-3 text-center">Aksi</th>

                </tr>

            </thead>

            <tbody>

            @forelse($academicYears as $academicYear)

                <tr class="border-t">

                    <td class="px-4 py-3">{{ $academicYear->code }}</td>

                    <td class="px-4 py-3">{{ $academicYear->name }}</td>

                    <td class="px-4 py-3">{{ $academicYear->start_date->format('d-m-Y') }}</td>

                    <td class="px-4 py-3">{{ $academicYear->end_date->format('d-m-Y') }}</td>

                    <td class="px-4 py-3 text-center">

                        @if($academicYear->is_active)
                            <span class="px-2 py-1 rounded bg-green-100 text-green-700 text-sm">
                                Aktif
                            </span>
                        @else
                            <span class="px-2 py-1 rounded bg-gray-100 text-gray-700 text-sm">
                                Nonaktif
                            </span>
                        @endif

                    </td>

                    <td class="px-4 py-3 text-center">

                        <a href="{{ route('academic-years.edit',$academicYear) }}"
                           class="text-blue-600 hover:underline">
                            Edit
                        </a>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="6" class="text-center py-8 text-gray-500">
                        Belum ada data Tahun Pelajaran.
                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

    <div class="mt-5">

        {{ $academicYears->links() }}

    </div>

</div>

@endsection