@extends('layouts.app')

@section('title', 'Daftar Soal')

@section('content')

<div class="space-y-6">

    <x-layout.page-header
        :title="$questionBank->title"
        subtitle="Kelola soal dalam bank soal"
        :total="$questions->total()"
        totalLabel="Soal">

        <div class="flex gap-2">

            <a href="{{ route('question-banks.index') }}">

                <x-ui.button variant="secondary">

                    Kembali

                </x-ui.button>

            </a>

            <a
                href="{{ route('question-banks.questions.create', $questionBank) }}">

                <x-ui.button>

                    Tambah Soal

                </x-ui.button>

            </a>

        </div>

    </x-layout.page-header>

    <x-ui.card>

        <div class="border-b border-slate-200 p-5">

            <x-crud.search
                action="{{ route('question-banks.questions.index', $questionBank) }}"
                placeholder="Cari soal..." />

        </div>

        <x-ui.table>

            <thead>

                <tr>

                    <th>No</th>

                    <th>Isi Soal</th>

                    <th>Tipe</th>

                    <th>Bobot</th>

                    <th>Kesulitan</th>

                    <th>Status</th>

                    <th class="text-center">Aksi</th>

                </tr>

            </thead>

            <tbody>

            @forelse($questions as $item)

                <tr>

                    <td>

                        {{ $loop->iteration + ($questions->firstItem() ?? 0) - 1 }}

                    </td>

                    <td>

                        <div class="max-w-2xl">

                            {!! \Illuminate\Support\Str::limit(strip_tags($item->question_text), 150) !!}

                        </div>

                    </td>

                    <td>

                        <x-ui.badge type="info">

                            {{ $item->question_type }}

                        </x-ui.badge>

                    </td>

                    <td>

                        {{ $item->score }}

                    </td>

                    <td>

                        @php
                            $badge = match($item->difficulty){
                                'Mudah' => 'success',
                                'Sedang' => 'warning',
                                'Sulit' => 'danger',
                                default => 'secondary',
                            };
                        @endphp

                        <x-ui.badge :type="$badge">

                            {{ $item->difficulty }}

                        </x-ui.badge>

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

                            <x-ui.actions.link
                                :href="route('question-banks.questions.edit', [$questionBank, $item])">

                                <x-heroicon-o-pencil-square class="h-4 w-4"/>

                                <span>Edit</span>

                            </x-ui.actions.link>

                            <x-ui.actions.delete
                                :action="route('question-banks.questions.destroy', [$questionBank, $item])" />

                        </x-ui.action-menu>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="7">

                        <x-ui.empty-state
                            title="Belum ada soal"
                            description="Silakan tambahkan soal pertama pada bank soal ini." />

                    </td>

                </tr>

            @endforelse

            </tbody>

        </x-ui.table>

        <div class="border-t border-slate-200 p-5">

            {{ $questions->links() }}

        </div>

    </x-ui.card>

</div>

@endsection