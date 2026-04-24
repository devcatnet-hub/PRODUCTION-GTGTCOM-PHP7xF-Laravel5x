<?php


namespace App\Http\Requests\GTGT;

use Illuminate\Foundation\Http\FormRequest;

class GTGTObjectFormRequest extends FormRequest
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
          'icono' => 'required|string|max:50',
          'nombre' => 'required|string|max:50',
        ];
    }

    public function messages()
    {
        return [
            'icono.required' => 'El campo Icono es requerido y debe ser un valor valido',
            'icono.max' => 'El máximo permitido en el campo Icono es de 50 caracteres',
            'nombre.required' => 'El campo Nombre es requerido',
            'nombre.max' => 'El máximo permitido en el campo Nombre es de 50 caracteres',
        ];
    }
}
