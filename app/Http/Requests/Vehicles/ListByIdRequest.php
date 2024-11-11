<?php

namespace App\Http\Requests\Vehicles;

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
            "vehicle_id" => "required|integer|exists:vehicles,id",
        ];
    }

    /**
     * Get the validation messages for the defined rules (update).
     *
     * @return array
     */
    protected function messages(): array
    {
        return [
            'vehicle_id.required' => 'The user ID is required.',
            'vehicle_id.integer' => 'The user ID must be an integer.',
            'vehicle_id.exists' => 'The specified user does not exist.',
        ];
    }
}
