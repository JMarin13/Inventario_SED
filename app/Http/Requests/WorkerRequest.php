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
            'document' => ['required', 'unique:workers,document', 'min:6', 'max:11']
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
            'document.min' => 'El campo Documento debe tener al menos 6 dígitos',
            'document.max' => 'El campo Documento debe tener máximo 11 dígitos',
            'document.numeric' => 'El campo Documento debe ser numérico. No puede tener letras o caracteres especiales',
            'document.unique' => 'El documento ya existe'
        ];
    }
}
