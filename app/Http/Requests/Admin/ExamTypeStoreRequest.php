<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ExamTypeStoreRequest extends FormRequest
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
                'unique:exam_types,code',
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