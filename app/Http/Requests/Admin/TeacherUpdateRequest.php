<?php

namespace App\Http\Requests\Admin;

use App\Models\Teacher;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TeacherUpdateRequest extends FormRequest
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

           'nip' => [
    'nullable',
    'string',
    'max:30',
    Rule::unique('teachers', 'nip')
        ->ignore($this->teacher)
        ->whereNull('deleted_at'),
],

            'name' => [
                'required',
                'string',
                'max:100',
            ],

            'title' => [
                'nullable',
                'string',
                'max:30',
            ],

            'gender' => [
                'required',
                Rule::in(array_keys(Teacher::GENDERS)),
            ],

           'email' => [
    'nullable',
    'email',
    'max:100',
    Rule::unique('teachers', 'email')
        ->ignore($this->teacher)
        ->whereNull('deleted_at'),
],

            'phone' => [
                'nullable',
                'string',
                'max:20',
            ],

            'address' => [
                'nullable',
                'string',
            ],

            'photo' => [
                'nullable',
                'image',
                'max:2048',
            ],

            'is_active' => [
                'nullable',
                'boolean',
            ],

        ];
    }
}