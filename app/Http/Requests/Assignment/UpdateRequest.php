<?php

namespace App\Http\Requests\Assignment;

use Anik\Form\FormRequest;

class UpdateRequest extends FormRequest
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
            "assignment_id" => "required|integer|exists:assignments,id",
            "user_id" => "required|integer|exists:users,id",
            "vehicle_id" => "required|integer|exists:vehicles,id",
            "duration" => "sometimes|integer|min:1",
            "start_date" => "sometimes|date",
            "end_date" => "sometimes|date",
            "status" => "sometimes|boolean"
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
            'assignment_id.required' => 'The assignment ID is required.',
            'assignment_id.integer' => 'The assignment ID must be an integer.',
            'assignment_id.exists' => 'The specified assignment does not exist.',

            'user_id.required' => 'The user ID is required.',
            'user_id.integer' => 'The user ID must be an integer.',
            'user_id.exists' => 'The specified user does not exist.',

            'vehicle_id.required' => 'The vehicle ID is required.',
            'vehicle_id.integer' => 'The vehicle ID must be an integer.',
            'vehicle_id.exists' => 'The specified vehicle does not exist.',

            'duration.sometimes' => 'The duration may be provided if needed.',
            'duration.integer' => 'The duration must be an integer.',
            'duration.min' => 'The duration must be at least 1.',

            'start_date.sometimes' => 'The start date may be provided if needed.',
            'start_date.date' => 'The start date must be a valid date.',

            'end_date.sometimes' => 'The end date may be provided if needed.',
            'end_date.date' => 'The end date must be a valid date.',

            'status.sometimes' => 'The status may be provided if needed.',
            'status.boolean' => 'The status must be either true or false.',
        ];
    }
}
