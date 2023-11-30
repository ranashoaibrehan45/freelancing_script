<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'dob' => ['nullable', 'date'],
            'phone' => ['required', 'string', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'address' => ['required', 'string', 'max:255'],
            'apt' => ['nullable', 'string', 'max:255'],
            'city_id' => ['required'],
            'state_id' => ['required'],
            'zipcode' => ['required', 'string', 'max:10'],
            'country_id' => ['required'],
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'photo' => [
                'nullable',
                File::image()
                    ->max(1024)
                    //->max(12 * 1024)
                    //->dimensions(Rule::dimensions()->maxWidth(1000)->maxHeight(500))
            ]
        ];
    }

    public function messages() : array
    {
        return [
            'city_id.required' => 'City field is required.',
            'state_id.required' => 'State field is required.',
            'country_id.required' => 'Country field is required.',
        ];
    }
}
