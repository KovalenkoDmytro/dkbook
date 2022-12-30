<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "name" => [
                'required',
                'string'
            ],
            "email" => [
                'nullable',
                'email',
                'unique:employees',
                'email:rfc,dns',
                'max:50',
            ],
            "position" => [
                'required',
                'string'
            ],
            "phone" => [
                'string',
                'max:13',
                'min:9',
                'unique:employees'
            ],
        ];
    }
}
