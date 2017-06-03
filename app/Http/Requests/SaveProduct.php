<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveProduct extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'supplier_id' => 'required|numeric',
            'quantity' => 'required|numeric',
            'unity_id' => 'required|numeric',
            'price' => 'required|numeric',
            'iva' => 'boolean',
            'product_type_id' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'El campo es requerido.',
            'supplier_id.required' => 'El campo es requerido.',
            'quantity.required' => 'El campo es requerido.',
            'unity_id.required' => 'El campo es requerido.',
            'price.required' => 'El campo es requerido.',
            'product_type_id.required' => 'El campo es requerido.'
        ];
    }
}
