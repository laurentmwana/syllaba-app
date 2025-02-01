<?php

namespace App\Http\Requests;

use App\Models\Student;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Unique;

class StudentRequest extends FormRequest
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

        return  [
            'name' => ['required', 'between:3,255'],
            'firstname' => ['required', 'between:3,255'],
            'lastname' => ['required', 'between:3,255'],
            'email' => [
                'required',
                'email',
                'lowercase',
                'string',
                (new Unique(Student::class))->ignore($id)
            ],
            'phone' => [
                'required',
                'string',
                (new Unique(Student::class))->ignore($id)
            ],
        ];
    }
}
