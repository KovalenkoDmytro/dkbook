<?php

namespace App\Http\Requests\CompanyOwner;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UpdateCompanyOwnerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'login' => [
                'required',
//                Rule::unique('company_owners')->whereNull('deleted_at'),
                'max:20'],
            'password' => [
                'required',
                Password::min(8)->mixedCase()->symbols()->numbers()->letters(),
            ],
            'confirmPassword' => ['required', 'same:password'],
            'email' => [
                'required',
//                Rule::unique('company_owners')->whereNull('deleted_at'),
                'string',
                'email',
                'max:50',
            ],
            'fullName' => ['required', 'string', 'max:35'],
            'phone' => [
                'required',
//                Rule::unique('company_owners')->whereNull('deleted_at'),
                'string',
                'max:15'],
        ];
    }
}
