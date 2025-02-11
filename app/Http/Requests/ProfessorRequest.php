<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfessorRequest extends FormRequest
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
        return  [
            'departments' => [
                'required',
                'exists:departments,id'
            ],

            'name' => [
                'required',
                'between:2,255'
            ],

            'firstname' => [
                'required',
                'between:2,255'
            ],

            'lastname' => [
                'required',
                'between:2,255'
            ],

            'email' => [
                'required',
                'email',
                'lowercase',
                'max:255'
            ],

            'phone' => [
                'required',
                'between:10,10'
            ],

            'gender' => [
                'required',
            ]
        ];
    }
}
