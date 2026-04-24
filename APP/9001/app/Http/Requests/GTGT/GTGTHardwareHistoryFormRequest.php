<?php


namespace App\Http\Requests\GTGT;

use Illuminate\Foundation\Http\FormRequest;

class GTGTHardwareHistoryFormRequest extends FormRequest
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
          'fechaevento' => 'required|date',
          'evento' => 'required|string|max:100',
        ];
    }

    public function messages()
    {
        return [
            'fechaevento.required' => 'El campo Fecha del Cambio de Estado es requerido',
            'evento.required' => 'El campo Descripcion del Cambio es requerido',
            'evento.max' => 'El máximo permitido en el campo Descripcion del Cambio son 100 caracteres',
        ];
    }
}
