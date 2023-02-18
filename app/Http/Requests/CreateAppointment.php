<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class CreateAppointment extends FormRequest
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
            'service_id' => 'required',
            'employee_id' => 'required',
            'booked_date' => 'required|date',

            'client.id'=> [
                'required_if:client.name,nullable',
                Rule::excludeIf($this->get('client')['name'] || $this->get('client')['phone'] || $this->get('client')['email']),
            ],

            'client.name' => [
                Rule::excludeIf((bool) $this->get('client')['id']),
                'required_if:client.id,nullable',

            ],
            'client.phone'=>[
                Rule::excludeIf((bool) $this->get('client')['id']),
                'required_if:client.id,nullable',
            ],
            'client.email'=>[
                Rule::excludeIf((bool) $this->get('client')['id']),
                'required_if:client.id,nullable',
                'email:rfc,dns',
                'max:50',
                ],
        ];
    }

//    public function messages()
//    {
//        return [
//            "service_id.required" => "test",
//            "employee_id.required" => "test",
//            "booked_date.required" => "test",
//        ];
//    }
}
