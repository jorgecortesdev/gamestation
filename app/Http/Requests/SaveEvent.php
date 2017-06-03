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
            'eventDate'       => 'required|date',
            'combo_id'        => 'required|numeric|min:1',
            'clientIdOrName'  => 'required',
            'clientAddress'   => 'required',
            'clientTelephone' => 'required|numeric|min:10',
            'clientEmail'     => 'email',
            'kidName'         => 'required',
            'kidBirthday'     => 'required|date',
            'kidGender'       => 'required|numeric',
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
