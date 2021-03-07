<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConsumerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return false;
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            
            'customerName' => 'required|string|between:1,15',
            'state' => 'required|string',
            'city' => 'required|string',
            'address' => 'required|string',
            'qq' => 'nullable',
            'email' => 'nullable',
            'phone' => 'nullable',
        ];
    }
}
