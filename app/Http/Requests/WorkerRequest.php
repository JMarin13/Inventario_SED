<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkerRequest extends FormRequest
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
            'document' => ['required', 'unique:workers,document', 'min:6', 'max:11'],
            'name' => ['required', 'regex:/^[\pL\s\-]+$/u', 'min:2'],
            'lastname' => ['required', 'regex:/^[\pL\s\-]+$/u', 'min:2'],
            'telephone' => ['required', 'min:7', 'max:10'],
            'email' => ['required', 'email'],
            'profession' => ['required', 'regex:/^[\pL\s\-]+$/u'],
            'dependency' => ['required', 'regex:/^[\pL\s\-]+$/u']
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
            'document.required' => 'El campo Documento es obligatorio',
            'name.required' => 'El campo Nombres es obligatorio',
            'lastname.required' => 'El campo Apellidos es obligatorio',
            'telephone.required' => 'El campo Celular es obligatorio',
            'email.required' => 'El campo Correo Electrónico es obligatorio',
            'document.min' => 'El campo Documento debe tener al menos 6 dígitos',
            'name.min' => 'El campo Nombres debe tener al menos 2 letras',
            'lastname.min' => 'El campo Apellidos debe tener al menos 2 letras',
            'telephone.min' => 'El campo Celular debe tener al menos 7 dígitos',
            'document.max' => 'El campo Documento debe tener máximo 11 dígitos',
            'telephone.max' => 'El campo Celular debe tener máximo 10 dígitos',
            'document.unique' => 'El documento ya existe',
            'email.email' => 'Diligencie un correo electrónico válido',
            'name.regex' => 'El Nombre no puede tener números',
            'lastname.regex' => 'El Apellido no puede tener números',
            'profession.required' => 'El campo Cargo es obligatorio',
            'profession.regex' => 'El Cargo no puede tener números',
            'dependency.required' => 'El campo Dependencia es obligatorio',
            'dependency.regex' => 'El campo Dependencia no puede tener números'
        ];
    }
}
