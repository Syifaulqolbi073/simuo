<div class="mt-8 rounded-xl border border-slate-200 bg-white p-6">

    <div class="mb-4 flex items-center justify-between">

        <div>

            <h2 class="text-lg font-semibold text-slate-800">

                Isi Soal

            </h2>

            <p class="text-sm text-slate-500">

                Tuliskan pertanyaan yang akan dikerjakan siswa.

            </p>

        </div>

    </div>

    <textarea
        id="question-editor"
        name="question_text"
        rows="10"
        class="w-full rounded-lg border-slate-300 focus:border-emerald-500 focus:ring-emerald-500">{{ old('question_text', $question->question_text ?? '') }}</textarea>

    @error('question_text')

        <p class="mt-2 text-sm text-red-600">

            {{ $message }}

        </p>

    @enderror

</div>