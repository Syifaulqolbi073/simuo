<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ExamScheduleStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

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
            
            'question_bank_id' => [
    'required',
    'exists:question_banks,id',
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

            'exam_date' => [
                'required',
                'date',
            ],

            'start_time' => [
                'required',
            ],

            'duration' => [
                'required',
                'integer',
                'min:1',
                'max:300',
            ],

            'token' => [
                'nullable',
                'string',
                'max:10',
            ],

            'token_required' => [
                'boolean',
            ],

            'shuffle_question' => [
                'boolean',
            ],

            'shuffle_option' => [
                'boolean',
            ],

            'show_score' => [
                'boolean',
            ],

            'show_answer' => [
                'boolean',
            ],

            'fullscreen_mode' => [
                'boolean',
            ],

            'one_device_only' => [
                'boolean',
            ],

            'auto_submit' => [
                'boolean',
            ],

            'allow_retry' => [
                'boolean',
            ],

            'max_attempt' => [
                'integer',
                'min:1',
                'max:10',
            ],

            'show_timer' => [
                'boolean',
            ],

            'late_tolerance' => [
                'integer',
                'min:0',
                'max:60',
            ],

            'is_published' => [
                'boolean',
            ],

            'status' => [
                'required',
                Rule::in([
                    'Draft',
                    'Terjadwal',
                    'Berlangsung',
                    'Selesai',
                    'Ditutup',
                ]),
            ],

            'is_active' => [
                'boolean',
            ],

        ];
    }
}