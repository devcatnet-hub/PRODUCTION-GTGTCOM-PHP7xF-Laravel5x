<?php


namespace App\Http\Requests\GTGT;

use Illuminate\Foundation\Http\FormRequest;

class GTGTUpdateHardwareFormRequest extends FormRequest
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
          'tipo' => 'required|string|max:100',
        ];
    }

    public function messages()
    {
        return [
            'tipo.required' => 'El campo Tipo de Hardware es requerido',
            'tipo.max' => 'El máximo permitido en el campo Tipo de Harware son 100 caracteres',
        ];
    }
}
