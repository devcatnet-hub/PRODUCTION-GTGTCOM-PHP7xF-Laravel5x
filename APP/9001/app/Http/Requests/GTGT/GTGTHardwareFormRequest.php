<?php


namespace App\Http\Requests\GTGT;

use Illuminate\Foundation\Http\FormRequest;

class GTGTHardwareFormRequest extends FormRequest
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

    public function rules()
    {
        return [
          'inventario' => 'required|string|max:20|unique:gtgthardware',
          'tipo' => 'required|string|max:100',
          'numeroserie' => 'required|string|max:100|unique:gtgthardware',
        ];
    }

    public function messages()
    {
        return [
            'inventario.required' => 'El campo Numero de Inventario es requerido',
            'tipo.required' => 'El campo Tipo de Hardware es requerido',
            'numeroserie.required' => 'El campo Numero de Serie es requerido',

            'inventario.max' => 'El máximo permitido en el campo Numero de Inventario es 20 caracteres',
            'tipo.max' => 'El máximo permitido en el campo Tipo de Harware son 100 caracteres',
            'numeroserie.max' => 'El máximo permitido en el campo Numero de Serie son 100 caracteres',

            'inventario.unique' => 'El valor del campo Numero de Inventario debe de ser unico',
            'numeroserie.unique' => 'El valor del campo Numero de Serie debe de ser unico',
        ];
    }
}
