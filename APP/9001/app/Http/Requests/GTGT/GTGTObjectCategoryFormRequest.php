<?php


namespace App\Http\Requests\GTGT;

use Illuminate\Foundation\Http\FormRequest;

class GTGTObjectCategoryFormRequest extends FormRequest
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
          'categoria' => 'required|string|max:50',
        ];
    }

    public function messages()
    {
        return [
            'categoria.required' => 'El campo Nombre de la Categoria es requerido',
            'categoria.max' => 'El máximo permitido en el campo Nombre de la Categoria es de 50 caracteres',
        ];
    }
}
