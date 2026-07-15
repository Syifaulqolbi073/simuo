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
    
    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 xl:grid-cols-4">

    <x-ui.stat-card
        title="Total Soal"
        :value="$statistics['total']"
        icon="heroicon-o-document-text"/>

    <x-ui.stat-card
        title="Total Bobot"
        :value="$statistics['score']"
        icon="heroicon-o-calculator"/>

    <x-ui.stat-card
        title="Pilihan Ganda"
        :value="$statistics['mcq']"
        icon="heroicon-o-check-circle"/>

    <x-ui.stat-card
        title="Essay"
        :value="$statistics['essay']"
        icon="heroicon-o-pencil-square"/>

</div>

    <x-ui.card>

        <div class="border-b border-slate-200 p-5">

            <x-crud.search
                action="{{ route('question-banks.questions.index', $questionBank) }}"
                placeholder="Cari soal..." />

        </div>
        <div class="flex flex-wrap gap-2 border-t border-slate-200 p-5">

    <a
        href="{{ route('question-banks.questions.index',$questionBank) }}"
        class="rounded-full bg-slate-200 px-4 py-2 text-sm">

        Semua

    </a>

    @foreach(config('question.types') as $key=>$label)

        <a
            href="{{ route(
                'question-banks.questions.index',
                array_merge(
                    ['question_bank'=>$questionBank],
                    request()->except('page','type'),
                    ['type'=>$key]
                )
            ) }}"
            class="rounded-full border px-4 py-2 text-sm">

            {{ $label }}

        </a>

    @endforeach

</div>

        <x-ui.table>

            <thead>

                <tr>

                    <th>No</th>

                    <th>Isi Soal</th>

                    <th>Tipe</th>

                    <th>Bobot</th>

                    <th>Kesulitan</th>
                    
                    <th>Opsi</th>

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

@php
$type = config('question.types')[$item->question_type]
    ?? $item->question_type;
@endphp

<x-ui.badge type="info">

    {{ $type }}

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

    @if($item->question_type === 'MCQ')

        {{ $item->options()->count() }} Pilihan

    @else

        -

    @endif

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
    :href="route('question-banks.questions.show', [$questionBank, $item])">

    <x-heroicon-o-eye class="h-4 w-4"/>

    <span>Preview</span>

</x-ui.actions.link>
<x-ui.actions.link
    :href="route(
        'question-banks.questions.media.index',
        [$questionBank, $item]
    )">

    <x-heroicon-o-photo class="h-4 w-4"/>

    <span>Media</span>

</x-ui.actions.link>
<form
    action="{{ route('question-banks.questions.duplicate', [$questionBank, $item]) }}"
    method="POST">

    @csrf

    <button
        type="submit"
        class="flex w-full items-center gap-2 px-4 py-2 text-left text-sm hover:bg-slate-100">

        <x-heroicon-o-document-duplicate class="h-4 w-4"/>

        <span>Duplikat</span>

    </button>

</form>
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