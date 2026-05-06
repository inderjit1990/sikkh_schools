<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class RegisterTenantRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:schools,email',
            'phone' => 'required|min:10|max:15|unique:schools,phone',
            'password' => 'required|min:6|confirmed',
            // Either domain OR subdomain required
            'domain' => 'nullable|required_without:subdomain|unique:schools,domain',
            'subdomain' => 'nullable|required_without:domain|alpha_dash|unique:schools,subdomain',
        ];
    }

    public function messages(): array
    {
        return [
            // Name
            'name.required' => 'School name is required.',
            'name.max' => 'School name cannot exceed 255 characters.',

            // Email
            'email.required' => 'Email is required.',
            'email.email' => 'Enter a valid email address.',
            'email.unique' => 'This email is already registered.',

            // Phone
            'phone.required' => 'Phone number is required.',
            'phone.min' => 'Phone must be at least 10 digits.',
            'phone.max' => 'Phone cannot exceed 15 digits.',
            'phone.unique' => 'This phone number already exists.',

            // Password
            'password.required' => 'Password is required.',
            'password.min' => 'Password must be at least 6 characters.',
            'password.confirmed' => 'Passwords do not match.',

            // Domain
            'domain.required_without' => 'Domain is required if subdomain is empty.',
            'domain.unique' => 'This domain is already taken.',

            // Subdomain
            'subdomain.required_without' => 'Subdomain is required if domain is empty.',
            'subdomain.alpha_dash' => 'Only letters, numbers, dashes allowed.',
            'subdomain.unique' => 'This subdomain is already taken.',
        ];
    }

}
