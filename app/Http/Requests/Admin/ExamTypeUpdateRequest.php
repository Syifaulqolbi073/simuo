<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ExamTypeUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            'code' => [
                'required',
                'max:20',
                Rule::unique('exam_types', 'code')
                    ->ignore($this->exam_type),
            ],

            'name' => [
                'required',
                'max:100',
            ],

            'category' => [
                'required',
                Rule::in([
                    'Harian',
                    'Semester',
                    'Tahunan',
                    'Latihan',
                    'Praktik',
                    'Tahfidz',
                    'Lainnya',
                ]),
            ],

            'description' => [
                'nullable',
                'string',
            ],

            'is_active' => [
                'nullable',
                'boolean',
            ],

        ];
    }
}