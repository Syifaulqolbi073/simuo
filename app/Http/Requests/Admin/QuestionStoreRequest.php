<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class QuestionStoreRequest extends FormRequest
{
    /**
     * Authorize
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Validation Rules
     */
    public function rules(): array
{
    return [

        // Informasi Soal
        'question_type' => [
            'required',
            'string',
        ],

        'question_text' => [
            'required',
            'string',
        ],

        'discussion' => [
            'nullable',
            'string',
        ],

        'score' => [
            'required',
            'integer',
            'min:1',
        ],

        'difficulty' => [
            'required',
            'string',
        ],

        'sort_order' => [
            'nullable',
            'integer',
            'min:1',
        ],

        'is_active' => [
            'required',
            'boolean',
        ],

        // Pilihan Jawaban
        'option_a' => [
            'nullable',
            'string',
        ],

        'option_b' => [
            'nullable',
            'string',
        ],

        'option_c' => [
            'nullable',
            'string',
        ],

        'option_d' => [
            'nullable',
            'string',
        ],

        'option_e' => [
            'nullable',
            'string',
        ],

        'correct_answer' => [
            'nullable',
            'in:A,B,C,D,E',
        ],

    ];
}
}