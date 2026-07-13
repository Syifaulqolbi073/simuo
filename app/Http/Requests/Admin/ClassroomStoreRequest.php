<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ClassroomStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            'grade_id' => [
                'required',
                'exists:grades,id',
            ],

            'code' => [
                'required',
                'max:20',
                'unique:classrooms,code',
            ],

            'name' => [
                'required',
                'max:100',
                'unique:classrooms,name',
            ],

            'capacity' => [
                'required',
                'integer',
                'min:1',
                'max:99',
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

            'grade_id.required' => 'Tingkat wajib dipilih.',
            'grade_id.exists'   => 'Tingkat tidak ditemukan.',

            'code.unique' => 'Kode kelas sudah digunakan.',

            'name.unique' => 'Nama kelas sudah digunakan.',

        ];
    }
}