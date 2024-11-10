<?php

namespace App\Http\Requests\Company;

use Anik\Form\FormRequest;

class ListByIdRequest extends FormRequest
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
            "company_id" => "required|integer|exists:company,id"
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
            'company_id.required' => 'The company_id field is required.',
            'company_id.integer' => 'The company_id field must be a valid integer.',
            'company_id.exists' => 'The company_id does not match our records. Please try again with a valid one.',
        ];
    }
}
