<?php

namespace App\Http\Requests;

use App\Models\Quiz;
use Illuminate\Validation\Rules\Unique;
use Illuminate\Foundation\Http\FormRequest;


class QuizRequest extends FormRequest
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
        $id = $this->input('id');

        return [
            'question' => [
                'required',
                'between:2,255',
                (new Unique(Quiz::class))->ignore($id)
            ],

            'answer' => [
                'required',
                'min:10'
            ],
        ];
    }
}
