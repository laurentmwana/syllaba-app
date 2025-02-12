<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
        // $id = $this->input('id');

        return [
            'name' => ['required', 'between:2,255'],
            'email' => ['required', 'max:255', 'lowercase', 'email'],
            'subject' => ['required', 'between:2,255'],
            'message' => [
                'required',
                'max:5000',
            ]
        ];
    }
}
