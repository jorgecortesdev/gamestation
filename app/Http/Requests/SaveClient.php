<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveClient extends FormRequest
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
            'name'      => 'required',
            'address'   => 'required',
            'telephone' => 'required|numeric|min:10',
            'email'     => 'email',
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
            'name.required'      => 'El campo es requerido.',
            'address.required'   => 'El campo es requerido',
            'telephone.required' => 'El campo es requerido.',
            'email.email'        => 'No es un correo válido.',
        ];
    }
}
