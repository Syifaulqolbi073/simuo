<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TeacherSubjectStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            'teacher_id' => [
                'required',
                'exists:teachers,id',
            ],

            'subject_id' => [
                'required',
                'exists:subjects,id',
            ],

            'classroom_id' => [
                'required',
                'exists:classrooms,id',
            ],

            'academic_year_id' => [
                'required',
                'exists:academic_years,id',
            ],

            'semester_id' => [
                'required',
                'exists:semesters,id',
            ],

            'is_active' => [
                'nullable',
                'boolean',
            ],

        ];
    }
}