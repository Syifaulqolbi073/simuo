<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StudentClassroomStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized.
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

            'student_id' => [
                'required',
                'exists:students,id',
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