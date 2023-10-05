<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;

class StoreLanguageRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'language_id' => ['required'],
            'language_proficiency_id' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'language_id.requried' => 'Please chooose a language.',
            'language_proficiency_id.requried' => 'Please chooose your language proficiency.',
        ];
    }
}
