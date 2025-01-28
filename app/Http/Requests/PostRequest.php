<?php

namespace App\Http\Requests;

use App\Models\Post;
use Illuminate\Validation\Rules\Unique;
use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'image' => [
                'required',
                'image',
                'mimes:png,jpg',
                'max:1024'
            ],
            'title' => ['required', 'between:3,255', (new Unique(Post::class))->ignore($id)],
            'content' => [
                'required',
                'min:30'
            ],
            'categories' => [
                'required',
                'between:1,2',
                'exists:categories,id',
                'array'
            ]
        ];
    }
}
