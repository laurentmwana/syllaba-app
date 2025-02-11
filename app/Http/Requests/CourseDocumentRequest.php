<?php

namespace App\Http\Requests;

use App\Models\Document;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Unique;

class CourseDocumentRequest extends FormRequest
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
            'title' => [
                'required',
            ],
            'description' => [
                'required',
            ],
            'price' => [
                'required',
            ],
            'year_academic_id' => [
                'required',
                'exists:year_academics,id',
            ],

            'course_id' => [
                'required',
                'exists:courses,id',
            ],

            'star' => ['required', 'integer', 'between:1,5']
        ];
    }
}
