<?php

namespace App\Http\Requests\Auth\Post;

use Illuminate\Foundation\Http\FormRequest;

class Createrequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'category' => 'required',
            'is_publish' => 'required|boolean',
            'file' => 'required',
            'description' => 'required',
        ];
    }
}
