<?php

namespace App\Http\Requests\Admin;

use App\Models\Student;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StudentStoreRequest extends FormRequest
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

            'nis' => [
                'nullable',
                'string',
                'max:30',
                Rule::unique('students', 'nis')
                    ->whereNull('deleted_at'),
            ],

            'nisn' => [
                'nullable',
                'string',
                'max:20',
                Rule::unique('students', 'nisn')
                    ->whereNull('deleted_at'),
            ],

            'name' => [
                'required',
                'string',
                'max:100',
            ],

            'gender' => [
                'required',
                Rule::in(array_keys(Student::GENDERS)),
            ],

            'birth_place' => [
                'nullable',
                'string',
                'max:100',
            ],

            'birth_date' => [
                'nullable',
                'date',
            ],

            'address' => [
                'nullable',
                'string',
            ],

            'phone' => [
                'nullable',
                'string',
                'max:20',
            ],

            'parent_name' => [
                'nullable',
                'string',
                'max:100',
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