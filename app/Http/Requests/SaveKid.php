<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveKid extends FormRequest
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
        $rules = [
            'client_id' => 'required',
            'name' => 'required|unique:kids',
            'sex' => 'required|digits_between:1,2',
            'birthday_at' => 'required|date|before:1 year ago',
        ];

        if ($this->route('kid')) {
            $rules['name'] = 'required|unique:kids,name,'
                . $this->route('kid')->id;
        }

        return $rules;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'client_id.required' => 'El campo es requerido',
            'name.required' => 'El campo es requerido.',
            'sex.required' => 'El campo es requerido.',
            'birthday_at.required' => 'El campo es requerido.',
            'birthday_at.before' => 'Debe ser mayor a 1 año.'
        ];
    }
}
