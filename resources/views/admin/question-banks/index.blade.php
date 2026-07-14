@extends('layouts.app')

@section('title', 'Bank Soal')

@section('content')

<div class="space-y-6">

    <x-layout.page-header
        title="Bank Soal"
        subtitle="Manajemen Bank Soal"
        :total="$questionBanks->total()"
        totalLabel="Bank Soal">

        <a href="{{ route('question-banks.create') }}">

            <x-ui.button>

                Tambah Bank Soal

            </x-ui.button>

        </a>

    </x-layout.page-header>

    <x-ui.card>

        <div class="border-b border-slate-200 p-5">

            <x-crud.search
                action="{{ route('question-banks.index') }}"
                placeholder="Cari bank soal..." />

        </div>

        <x-ui.table>

            <thead>

                <tr>

                    <th>No</th>

                    <th>Bank Soal</th>

                    <th>Guru Mengajar</th>

                    <th>Jenis Ujian</th>

                    <th>Jumlah Soal</th>

                    <th>Total Bobot</th>

                    <th>Status</th>

                    <th class="text-center">Aksi</th>

                </tr>

            </thead>

            <tbody>

            @forelse($questionBanks as $item)

                <tr>

                    <td>

                        {{ $loop->iteration + ($questionBanks->firstItem() ?? 0) - 1 }}

                    </td>

                    <td>

                        <div class="font-semibold">

                            {{ $item->title }}

                        </div>

                        @if($item->description)

                            <div class="text-sm text-slate-500">

                                {{ \Illuminate\Support\Str::limit($item->description, 60) }}

                            </div>

                        @endif

                    </td>

                    <td>

                        <div>

                            {{ $item->teacherSubject->teacher->name }}

                        </div>

                        <small class="text-slate-500">

                            {{ $item->teacherSubject->subject->name }}

                            •

                            {{ $item->teacherSubject->classroom->name }}

                        </small>

                    </td>

                    <td>

                        <x-ui.badge type="info">

                            {{ $item->examType->code }}

                        </x-ui.badge>

                    </td>

                    <td>

                        {{ $item->total_question }}

                    </td>

                    <td>

                        {{ $item->total_score }}

                    </td>

                    <td>

                        @if($item->is_active)

                            <x-ui.badge type="success">

                                Aktif

                            </x-ui.badge>

                        @else

                            <x-ui.badge type="secondary">

                                Nonaktif

                            </x-ui.badge>

                        @endif

                    </td>

                    <td class="text-center">

                        <x-ui.action-menu>

                            {{-- Kelola Soal --}}
                            <x-ui.actions.link
                                :href="route('question-banks.questions.index', $item)">

                                <x-heroicon-o-clipboard-document-list class="h-4 w-4"/>

                                <span>Kelola Soal</span>

                            </x-ui.actions.link>

                            {{-- Edit --}}
                            <x-ui.actions.link
                                :href="route('question-banks.edit', $item)">

                                <x-heroicon-o-pencil-square class="h-4 w-4"/>

                                <span>Edit</span>

                            </x-ui.actions.link>

                            {{-- Hapus --}}
                            <x-ui.actions.delete
                                :action="route('question-banks.destroy', $item)" />

                        </x-ui.action-menu>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="8">

                        <x-ui.empty-state
                            title="Belum ada Bank Soal"
                            description="Silakan tambahkan bank soal terlebih dahulu." />

                    </td>

                </tr>

            @endforelse

            </tbody>

        </x-ui.table>

        <div class="border-t border-slate-200 p-5">

            {{ $questionBanks->links() }}

        </div>

    </x-ui.card>

</div>

@endsection