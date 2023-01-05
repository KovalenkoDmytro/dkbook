<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClienRequest extends FormRequest
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
                'email:rfc,dns',
                'max:50',
            ],
            "phone" => [
                'string',
                'nullable',
                'max:15',
                'min:9',
            ],
        ];
    }
}
