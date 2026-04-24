<?php


namespace App\Http\Requests\GTBS;

use Illuminate\Foundation\Http\FormRequest;

class GTBSParticipantesFormRequest extends FormRequest
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
          'nombre' => 'required|string|max:100',
          'cargo' => 'required|string|max:100',
          'empresa' => 'required|string|max:100',
          'telefono' => 'required|string|max:100',
          'email' => 'required|string|max:100',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El campo Nombre es requerido',
            'cargo.required' => 'El campo Cargo es requerido',
            'empresa.required' => 'El campo Empresa es requerido',
            'telefono.required' => 'El campo Telefono es requerido',
            'email.required' => 'El campo eMail es requerido',
            'nombre.max' => 'El máximo permitido en el campo Nombre son 100 caracteres',
            'cargo.max' => 'El máximo permitido en el campo Cargo son 100 caracteres',
            'empresa.max' => 'El máximo permitido en el campo Empresa son 100 caracteres',
            'telefono.max' => 'El máximo permitido en el campo Telefono son 20 caracteres',
            'email.max' => 'El máximo permitido en el campo eMail son 100 caracteres',
        ];
    }
}
