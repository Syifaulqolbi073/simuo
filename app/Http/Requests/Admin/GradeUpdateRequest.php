<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GradeUpdateRequest extends FormRequest
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
                'max:10',
                Rule::unique('grades')
                    ->ignore($this->grade),
            ],

            'name' => [
                'required',
                'max:100',
                Rule::unique('grades')
                    ->ignore($this->grade),
            ],

            'order' => [
                'required',
                'integer',
                'between:1,12',
                Rule::unique('grades')
                    ->ignore($this->grade),
            ],

            'is_active' => [
                'nullable',
                'boolean',
            ],

        ];
    }

    public function messages(): array
    {
        return [

            'code.unique'  => 'Kode tingkat sudah digunakan.',

            'name.unique'  => 'Nama tingkat sudah digunakan.',

            'order.unique' => 'Urutan tingkat sudah digunakan.',

        ];
    }
}