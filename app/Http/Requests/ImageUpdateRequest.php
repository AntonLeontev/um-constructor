<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->route('block')->site->user_id === auth()->id();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'link' => ['sometimes', 'url'],
            'number' => ['sometimes', 'required_with:link', 'int', 'in:1,2,3,4'],
            'image' => ['sometimes', 'image'],
            'key' => ['required', 'string', 'max:150'],
        ];
    }
}
