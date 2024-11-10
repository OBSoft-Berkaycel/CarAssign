<?php

namespace App\Http\Requests\Assignment;

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
            "user_id" => "required|integer|exists:users,id",
            "vehicle_id" => "required|integer|exists:vehicles,id",
            "duration" => "required|integer|min:1",
            "start_date" => "required|date",
            "end_date" => "required|date",
            "status" => "required|boolean"
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
            'user_id.required' => 'The user ID is required.',
            'user_id.integer' => 'The user ID must be an integer.',
            'user_id.exists' => 'The specified user does not exist.',
    
            'vehicle_id.required' => 'The vehicle ID is required.',
            'vehicle_id.integer' => 'The vehicle ID must be an integer.',
            'vehicle_id.exists' => 'The specified vehicle does not exist.',
    
            'duration.required' => 'The duration is required.',
            'duration.integer' => 'The duration must be an integer.',
            'duration.min' => 'The duration must be at least 1.',
    
            'start_date.required' => 'The start date is required.',
            'start_date.date' => 'The start date must be a valid date.',
    
            'end_date.required' => 'The end date is required.',
            'end_date.date' => 'The end date must be a valid date.',
    
            'status.required' => 'The status is required.',
            'status.boolean' => 'The status must be either true or false.',
        ];
    }
}
