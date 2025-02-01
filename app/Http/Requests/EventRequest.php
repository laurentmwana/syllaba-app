<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'title' => [
                'required',
                'string',
                'between:3,255',
                Rule::unique('events', 'title')->ignore($id), // Correction de la règle unique
            ],
            'start_at' => [
                'required',
                'date', // Ajout de la validation de type date
                'after_or_equal:today', // S'assurer que la date de début n'est pas passée
            ],
            'description' => [
                'required',
                'string', // Ajout du type string
                'between:30,8000',
            ],
            'image' => [
                'required',
                'image',
                'mimes:jpg,png', // Ordre conventionnel des extensions
                'max:1024', // 1MB = 1024KB
            ],
        ];
    }
}
