<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TomeRequest extends FormRequest
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
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'course_document_id' => [
                'required',
                'exists:course_documents,id'
            ],

            'document' => [
                'required',
                'file',
                'mimes:pdf',
            ]
        ];
    }
}
