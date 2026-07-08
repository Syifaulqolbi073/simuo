@props([
'title',
'value',
'icon'=>'',
])

<div class="bg-white rounded-2xl shadow p-5">

<div class="text-gray-500">

{{ $title }}

</div>

<div class="text-3xl font-bold mt-2">

{{ $value }}

</div>

</div>