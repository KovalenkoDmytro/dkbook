<?php

namespace App\Http\Requests\Employee;

use App\Models\Client;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateEmployeeRequest extends FormRequest
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
        $user = Client::where('name', '=', $this->name)->first();
        return [
            "name" => [
                'required',
                'string',
                'max:20',
            ],
            "email" => [
                'nullable',
                'email',
                'email:rfc,dns',
                'max:50',
//                Rule::unique('clients')->ignore($user->id),
            ],
            "position" => [
                'required',
                'string',
                'max:25',
            ],
            "phone" => [
                'nullable',
                'string',
                'regex:/^[\+\(\s.\-\/\d\)]{5,30}$/u',
                'max:15',
                'min:9',
            ],
        ];
    }
}
