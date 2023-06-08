<?php

namespace App\Http\Requests\Inventory;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProductCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        Auth::check() ? true : false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required|string',
            'supplier'=>'required',
            'category'=>'required',
            'image'=>'nullable|mimes:jpeg,png,jpg,bmp,gif',
            'unit_cost'=>'required',
            'quantity'=>'required',
            'description'=>'nullable',
            'bar_code'=>'required|string',
        ];
    }
}
