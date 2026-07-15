@props([
    'label'
])

<div class="mt-5 rounded-xl border border-slate-200 bg-white p-5">

    <div class="mb-4 flex items-center justify-between">

        <h3 class="font-semibold text-slate-700">

            Pilihan {{ $label }}

        </h3>

        <label class="flex items-center gap-2 text-sm">

            <input
                type="radio"
                name="correct_answer"
                value="{{ $label }}">

            Jawaban Benar

        </label>

    </div>

    <textarea
        id="option-{{ strtolower($label) }}"
        name="option_{{ strtolower($label) }}"
        rows="3"
        class="w-full rounded-lg border-slate-300 focus:border-emerald-500 focus:ring-emerald-500">{{ old('option_'.strtolower($label)) }}</textarea>

</div>