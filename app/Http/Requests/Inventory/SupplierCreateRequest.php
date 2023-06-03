<?php

namespace App\Http\Requests\Inventory;

use Illuminate\Foundation\Http\FormRequest;

class SupplierCreateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name'    =>'required|string',
            'last_name'     =>'required|string',
            'email'         =>'required|string|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
            'phone'         =>'required|regex:/^\+[1-9]\d{1,14}$/',
            'organization'  =>'required|string',
            'role'          =>'required|string',
            'country'       =>'required|string',
            'city'          =>'required|string',
            'region'        =>'required|string',
            'address'       =>'required|string',

        ];
    }
}
