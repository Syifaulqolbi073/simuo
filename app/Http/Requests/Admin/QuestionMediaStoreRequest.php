<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class QuestionMediaStoreRequest extends FormRequest
{
    /**
     * Authorize
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Validation Rules
     */
    public function rules(): array
    {
        return [

            'file' => [

                'required',

                'file',

                'max:10240', // 10 MB

               'file' => [
    'required',
    'file',
    'max:10240',
    'mimes:jpg,jpeg,png,webp,gif,mp3,wav,ogg,mp4,mov,avi,pdf',
],

            ],

            'media_type' => [

                'required',

                'in:IMAGE,AUDIO,VIDEO,DOCUMENT',

            ],

            'sort_order' => [

                'nullable',

                'integer',

                'min:1',

            ],

            'is_active' => [

                'required',

                'boolean',

            ],

        ];
    }
}