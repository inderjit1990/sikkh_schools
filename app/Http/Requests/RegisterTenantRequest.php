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
            'school_name' => 'required|string|max:255',
            'sub_domain' => 'required|string|max:50|unique:schools,sub_domain',
            'email' => 'required|email',
            'phone' => 'required|min:10',

            'group_name' => 'required|string',
            'group_mobile' => 'required|unique:groups,mobile',
            'group_email' => 'required|email|unique:groups,contact_email',
        ];
    }
}
