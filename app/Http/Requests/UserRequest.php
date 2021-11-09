<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            //
            'name' => ['required','regex:/^[\pL\s\-]+$/u'],
            'email' => ['required'],
            'password' => ['required'],
            'password' => ['min:8']
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'El campo Nombres y Apellidos es requerido',
            'name.regex' => 'El Nombre no puede tener números',
            'email.required' => 'El campo Correo Electrónico es requerido',
            'password.required' => 'El campo Contraseña es requerido',
            'password.min' => 'El campo Contraseña debe tener al menos 8 caracteres'
        ];
    }
}
