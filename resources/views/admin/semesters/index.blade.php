@extends('layouts.app')

@section('title', 'Semester')

@section('content')

<div class="space-y-6">

    {{-- Header --}}
  <x-layout.page-header

    title="Semester"

    subtitle="Kelola data Semester"

    :total="$semesters->total()"

    totalLabel="Semester">

   <a href="{{ route('semesters.create') }}">
            <x-ui.button>
                + Tambah Semester
            </x-ui.button>
        </a>


</x-layout.page-header>  


  

    {{-- Card --}}
    <x-ui.card>

        <div class="border-b border-slate-200 p-5">

            <form action="{{ route('semesters.index') }}" method="GET">

                
<div class="flex flex-col gap-3 md:flex-row">
                    <x-ui.input
                        type="text"
                        name="search"
                        :value="request('search')"
                        placeholder="Cari kode atau nama semester..." />

                    
                        <x-ui.button
    variant="secondary"
    type="submit">
                        Cari
                    </x-ui.button>

                </div>

            </form>

        </div>

        <x-ui.table>

            <thead class="bg-slate-50">

                <tr>

                    <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">
                        No
                    </th>

                    <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">
                        Tahun Pelajaran
                    </th>

                    <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">
                        Kode
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

           @forelse($semesters as $semester)
                <tr class="hover:bg-slate-50">

                    <td class="px-6 py-4">
                        {{ $loop->iteration + ($semesters->firstItem() ?? 0) - 1 }}
                    </td>

                    <td class="px-6 py-4 font-medium">
{{ $semester->academicYear->name }}
                    </td>

                    <td class="px-6 py-4">
{{ $semester->code }}
                    </td>

                    <td class="px-6 py-4">
{{ $semester->name }}
                    </td>

                    <td class="px-6 py-4 text-center">

                     @if($semester->is_active)
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

                        <div class="flex justify-center gap-2">

                            @unless($semester->is_active)

                                <form
                                    action="{{ route('semesters.activate',$semester) }}"
                                    method="POST">

                                    @csrf
                                    @method('PATCH')

                                  <x-ui.button
    variant="secondary"
    type="submit">

                                        Aktifkan

                                    </x-ui.button>

                                </form>

                            @endunless

                            <a href="{{ route('semesters.edit',$semester) }}">

                             <x-ui.button
    variant="primary">
                                    Edit

                                </x-ui.button>

                            </a>

<form
    action="{{ route('semesters.destroy',$semester) }}"
    method="POST"
    data-confirm-delete>

                                @csrf
                                @method('DELETE')

<x-ui.button
    variant="danger"
    type="submit">

                                    Hapus

                                </x-ui.button>

                            </form>

                        </div>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="6">

                    <x-ui.empty-state
    title="Belum ada Semester"
    description="Silakan tambahkan Semester terlebih dahulu." />

                    </td>

                </tr>

            @endforelse

            </tbody>

        </x-ui.table>

        <div class="border-t border-slate-200 p-5">

            {{ $semesters->links() }}

        </div>

    </x-ui.card>

</div>

@endsection