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
            "name" => [
                'required',
                'string',
                'max:255',
            ],
            'timeRange_hour'=> [
                'required',
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
            'company_id'=>[
                'required',
                'numeric',
            ]
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'company_id' => Auth::user()->company->id,
        ]);
    }
}
