@props([
    'title',
    'value',
])

<div class="bg-white rounded-2xl shadow p-6">
    <p class="text-gray-500">{{ $title }}</p>

    <h2 class="text-3xl font-bold mt-2">
        {{ $value }}
    </h2>
</div>