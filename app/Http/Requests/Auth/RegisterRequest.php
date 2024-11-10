<?php

namespace App\Http\Requests\Auth;

use Anik\Form\FormRequest;

class RegisterRequest extends FormRequest
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
            'company_id' => 'required|exists:companies,id',
            'name' => 'required|string',
            'surname' => 'required|string',
            'username' => 'required|string|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => [
                'required',
                'string',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\W).*$/'
            ],
            'phone' => 'nullable|string',
            'profile_photo' => 'nullable|string',
            'address' => 'nullable|string',
            'date_of_birth' => 'nullable|date',
            'is_active' => 'boolean',
            'created_by' => 'nullable|exists:users,id',
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
            'company_id.required' => 'The company ID is required.',
            'company_id.exists' => 'The selected company does not exist.',
            'name.required' => 'The name field is required.',
            'surname.required' => 'The surname field is required.',
            'username.required' => 'The username field is required.',
            'username.unique' => 'The username has already been taken. Please choose a different one.',
            'email.required' => 'The email field is required.',
            'email.email' => 'Please provide a valid email address.',
            'email.unique' => 'The email address you entered is already in use. Please choose a different one.',
            'password.required' => 'The password field is required.',
            'password.regex' => 'The password must contain at least one uppercase letter, one lowercase letter, and one special character.',
            'phone.string' => 'The phone number must be a valid string.',
            'profile_photo.string' => 'The profile photo field must be a valid string.',
            'address.string' => 'The address field must be a valid string.',
            'date_of_birth.date' => 'The date of birth must be a valid date.',
            'is_active.boolean' => 'The active status must be a boolean value.',
            'created_by.exists' => 'The creator must be a valid user ID.',
        ];
    }
}
