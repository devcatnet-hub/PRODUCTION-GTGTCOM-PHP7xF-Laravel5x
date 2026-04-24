<?php


namespace App\Http\Requests\Menu;

use Illuminate\Foundation\Http\FormRequest;

class SubMenuFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
          'title' => 'required|string|max:50',
          'link' => 'required|string|max:200',
          'order' => 'required|max:2',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'El campo Titulo es requerido',
            'link.required' => 'El campo Link es requerido y debe de ser una Ruta valida',
            'order.required' => 'El campo Orden es requerido y su valor debe de ser entre 1 y 99',
            'tittle.max' => 'El máximo permitido en el campo Titulo son 50 caracteres',
            'link.max' => 'El máximo permitido en el campo Link son 200 caracteres y debe de ser una Ruta valida',
            'order.max' => 'El máximo permitido en el campo Orden son 2 y su valor debe de ser entre 1 y 99',
        ];
    }
}
