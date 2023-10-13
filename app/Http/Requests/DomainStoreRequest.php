<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DomainStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->route('site')->user_id === auth()->id();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $domain = str_replace('.', '\.', config('server.domain'));

        return [
            'domain' => [
                'required',
                'regex:/^[\w\-\.]+\.[a-z]+$/m',
                "not_regex:/{$domain}$/m",
                'max:255',
                'min:4',
                'unique:domains,title',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'domain.regex' => 'Wrong domain format',
            'domain.not_regex' => 'Adding subdomains to '.config('server.domain').' is prohibited',
        ];
    }
}
