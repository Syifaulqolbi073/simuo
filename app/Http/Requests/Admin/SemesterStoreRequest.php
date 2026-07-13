<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SemesterStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            'academic_year_id' => [
                'required',
                'exists:academic_years,id',
            ],

            'code' => [
                'required',
                'max:10',
            ],

            'name' => [
                'required',
                'max:20',
            ],

            'order' => [
                'required',
                'integer',
                Rule::in([1,2]),
            ],

            'is_active' => [
                'nullable',
                'boolean',
            ],

        ];
    }
}