<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ServiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            "name" => [
                'required',
                'string',
                'max:255',
            ],
            'timeRange_hour'=> [
                'numeric',
                'max:4',
            ],
            'timeRange_minutes'=> [
                'required',
                'numeric',
                'max:59',
            ],
            'price'=> [
                'required',
                'numeric',
                'max:999',
                'regex:/^\d+(\.\d{1,2})?$/'
            ],
        ];
    }
}
