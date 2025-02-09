<?php

namespace App\Http\Requests;

use App\Models\Document;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Unique;

class DocumentRequest extends FormRequest
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
            'file' => [
                'required',
                'mimes:pdf,word'
            ],
            'description' => [
                'required',
            ],
            'price' => [
                'required',
            ],
            'levels' => [
                'required',
                'exists:levels,id',
                'array',
                'between:1,10'
            ],

            'year_academics' => [
                'required',
                'exists:year_academics,id',
                'array',
                'between:1,3'
            ],

            'title' => [
                'required',
                'string',
                'between:2,255',
                (new Unique(Document::class))->ignore($id)
            ],
        ];
    }
}
