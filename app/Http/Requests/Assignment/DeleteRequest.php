<?php

namespace App\Http\Requests\Assignment;

use Anik\Form\FormRequest;

class DeleteRequest extends FormRequest
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
            "user_id" => "required|integer|exists:users,id",
            "assignment_id" => "required|integer|exists:assignments,id",
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
            'user_id.required' => 'The user ID is required.',
            'user_id.integer' => 'The user ID must be an integer.',
            'user_id.exists' => 'The specified user does not exist.',

            'assignment_id.required' => 'The assignment ID is required.',
            'assignment_id.integer' => 'The assignment ID must be an integer.',
            'assignment_id.exists' => 'The specified assignment does not exist.',
        ];
    }
}
