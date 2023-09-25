<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlockCreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->route('site')->user_id === auth()->id();
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'class' => ['required', 'string', 'max:255'],
            'site_id' => ['required', 'exists:sites,id'],
            'position' => ['sometimes', 'integer', 'min:1'],
            'is_active' => ['sometimes', 'boolean'],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'site_id' => $this->route('site')->id,
        ]);
    }
}
