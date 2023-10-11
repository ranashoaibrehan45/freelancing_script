<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SkillRequest extends FormRequest
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
        $id = $this->skill ? $this->skill->id : 0;
        $idreq = 'required';
        if (intval($id) > 0) {
            $idreq = 'nullable';
        }
        
        return [
            'name' => ['required', 'max:255', 'unique:skills,name,'. $id],
        ];
    }
}
