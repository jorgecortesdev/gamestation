<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveEvent extends FormRequest
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
            'occurs_on' => 'required|date',
            'combo_id'  => 'required|numeric|min:1',
            'kid_id'    => 'required|numeric|min:1',
            'client_id' => 'required|numeric|min:1'
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
            'occurs_on.required' => 'El campo es requerido.',
            'combo_id.required'  => 'El campo es requerido.',
            'address.required'   => 'El campo es requerido.',
            'kid_id.required'    => 'El campo es requerido.',
            'client_id.required' => 'No es un correo válido.',
        ];
    }
}
