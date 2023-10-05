<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SubCategoryRequest extends FormRequest
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

        $id = $this->subCategory ? ',' . $this->subCategory->id : 0;
        
        $idreq = 'required';
        if (intval($id) > 0) {
            $idreq = 'nullable';
        }
        
        return [
            'category_id' => [$idreq],
            'name' => ['required', 'max:255', 'unique:sub_categories,name,'. $id],
        ];
    }
}
