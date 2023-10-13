<?php

namespace App\Http\Requests;

use App\Models\Site;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SiteGeneralUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Site::find($this->site_id)->user_id === auth()->id();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'site_id' => ['required', 'exists:sites,id'],
            'title' => ['nullable', 'string', 'max:255'],
            'favicon' => ['sometimes', 'nullable', 'image', Rule::dimensions()->minWidth(64)->minHeight(64)->ratio(1 / 1)],
            'head_scripts' => ['nullable', 'string', 'max:5000', 'starts_with:<script>', 'ends_with:</script>'],
            'body_scripts' => ['nullable', 'string', 'max:5000', 'starts_with:<script>', 'ends_with:</script>'],
        ];
    }
}
