<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class QuestionBankStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Validation rules.
     */
    public function rules(): array
    {
        return [
            'teacher_subject_id' => [
                'required',
                'exists:teacher_subjects,id',
            ],

            'exam_type_id' => [
                'required',
                'exists:exam_types,id',
            ],

            'title' => [
                'required',
                'string',
                'max:150',
            ],

            'description' => [
                'nullable',
                'string',
            ],

            'is_active' => [
                'required',
                'boolean',
            ],
        ];
    }

    /**
     * Custom attribute names.
     */
    public function attributes(): array
    {
        return [
            'teacher_subject_id' => 'guru mengajar',
            'exam_type_id'       => 'jenis ujian',
            'title'              => 'nama bank soal',
            'description'        => 'deskripsi',
            'is_active'          => 'status',
        ];
    }
}