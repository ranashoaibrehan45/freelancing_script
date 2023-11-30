<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class LengthRequest extends FormRequest
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
        $id = $this->length ? ',' . $this->length->id : '';

        return [
            'title' => ['required', 'max:255', 'unique:lengths,title'. $id],
            'note' => ['nullable', 'max:255'],
        ];
    }
}
