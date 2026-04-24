<?php


namespace App\Http\Requests\GTGT;

use Illuminate\Foundation\Http\FormRequest;

class GTGTPersonasFormRequest extends FormRequest
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
          'nombres' => 'required|string|max:50',
          'apellidos' => 'required|string|max:50',
          'departamento' => 'required|string|max:20',
          'puesto' => 'required|string|max:50',
          'telcel' => 'required|string|max:30',
          'dpi' => 'required|string|max:30',
          'status' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'nombres.required' => 'El campo Nombres es requerido',
            'apellidos.required' => 'El campo Apellidos es requerido',
            'departamento.required' => 'El campo Departamento es requerido',
            'puesto.required' => 'El campo Puesto es requerido',
            'telcel.required' => 'El campo Telefono es requerido',
            'dpi.required' => 'El campo DPI es requerido',
            'status.required' => 'El campo Status es requerido',
            'nombres.max' => 'El máximo permitido en el campo Nombres son 50 caracteres',
            'apellidos.max' => 'El máximo permitido en el campo Apellidos son 50 caracteres',
            'departamento.max' => 'El máximo permitido en el campo Departamento son 20 caracteres',
            'puesto.max' => 'El máximo permitido en el campo Puesto son 50 caracteres',
            'telcel.max' => 'El máximo permitido en el campo Telefono son 20 caracteres',
            'dpi.max' => 'El máximo permitido en el campo DPI son 30 caracteres',
        ];
    }
}
