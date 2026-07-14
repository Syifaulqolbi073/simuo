<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SubjectUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [

            'code' => [
                'required',
                'string',
                'max:20',
                Rule::unique('subjects', 'code')
                    ->ignore($this->subject),
            ],

            'name' => [
                'required',
                'string',
                'max:100',
            ],

            'subject_group' => [
                'required',
                Rule::in([
                    'Wajib',
                    'Muatan Lokal',
                    'Tahfidz',
                    'Ekstrakurikuler',
                    'Pilihan',
                ]),
            ],

            'minimum_score' => [
                'required',
                'integer',
                'between:0,100',
            ],

            'is_active' => [
                'nullable',
                'boolean',
            ],

        ];
    }
}