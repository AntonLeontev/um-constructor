<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StringDataUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->id() === $this->route('block')->site->user->id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'value' => ['present', 'nullable', 'string', 'max:2500'],
        ];
    }
}
