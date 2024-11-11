<?php

namespace App\Http\Requests\Company;

use Anik\Form\FormRequest;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    protected function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function rules(): array
    {
        return [
            "name" => "required|string|unique:companies,name"
        ];
    }

    /**
     * Get the custom error messages for the validation rules.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'name.required' => 'The name is required.',
            'name.string' => 'The name field must be a valid string.',
            'name.unique' => 'The company name has already been taken. Please choose a different one.',
        ];
    }
}
