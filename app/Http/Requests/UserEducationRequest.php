<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEducationRequest extends FormRequest
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
            'school' => ['required', 'max:255'],
            'year_from' => ['required'],
            'year_to' => ['required'],
            'degree_id' => ['required'],
            'degree_id' => ['required'],
            'study_area' => ['nullable'],
            'description' => ['nullable', 'max:500'],
        ];
    }

    public function messages()
    {
        return [
            'year_from' => 'Date attended from field is required.',
            'year_to' => 'Date attended to field is required.',
            'degree_id' => 'Please choose your degree.',
        ];
    }
}
