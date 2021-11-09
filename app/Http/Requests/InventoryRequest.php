<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InventoryRequest extends FormRequest
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
            // Requerimientos de validaciones
            'serial' => ['required', 'unique:inventories,serial'],
            'brand' => ['required', 'regex:/^[\pL\s\-]+$/u'],
            'model' => ['required'],
            'description' => ['required', 'regex:/^[\pL\s\-]+$/u'],
            'color' => ['required', 'regex:/^[\pL\s\-]+$/u'],
            'status' => ['required', 'regex:/^[\pL\s\-]+$/u'],
            'date_assignment' => ['required'],
            'worker_id' => ['required']
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
            // Mensajes de error de las validaciones
            'serial.required' => 'El campo Serial es obligatorio',
            'brand.required' => 'El campo Marca es obligatorio',
            'brand.regex' => 'El campo Marca no puede tener números',
            'model.required' => 'El campo Modelo es obligatorio',
            'description.required' => 'El campo Descripción es obligatorio',
            'color.required' => 'El campo Color es obligatorio',
            'status.required' => 'El campo Estado es obligatorio',
            'description.regex' => 'El campo Descripción no puede tener números',
            'color.regex' => 'El campo Color no puede tener números',
            'status.regex' => 'El campo Estado no puede tener números',
            'date_assignment.required' => 'El campo Fecha de Asignación es obligatorio',
            'worker_id.required' => 'Debes seleccionar un funcionario para asignar la herramienta',
            'name.regex' => 'El Nombre no puede tener números',
            'serial.unique' => 'El serial ya existe'
        ];
    }
}
