<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;

class CreateEmployeeRequest extends FormRequest
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
                'string',
                'max:20',
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
                'string',
                'max:25',
            ],
            "phone" => [
                'string',
                'nullable',
                'max:19',
                'min:9',
                'unique:employees'
            ],
            "employee_schedule_id"=>[
                'numeric'
            ],
            "services"=>[
                'array'
            ]
        ];
    }

}
