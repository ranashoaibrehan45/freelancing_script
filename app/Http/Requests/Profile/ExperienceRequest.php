<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;

class ExperienceRequest extends FormRequest
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
            'title' => ['required', 'max:255'],
            'company' => ['required', 'max:255'],
            'location' => ['nullable'],
            'country_id' => ['nullable'],
            'start_month' => ['required'],
            'start_year' => ['required'],
            'end_month' => ['nullable'],
            'end_year' => ['nullable', 'gte:start_year'],
            'continue' => ['nullable'],
            'description' => ['nullable', 'max:500'],
        ];
    }
}
