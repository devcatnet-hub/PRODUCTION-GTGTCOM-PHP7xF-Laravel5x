<?php


namespace App\Http\Requests\Menu;

use Illuminate\Foundation\Http\FormRequest;

class MainMenuFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
          'icon' => 'required|string|max:50',
          'title' => 'required|string|max:50',
          'link' => 'required|string|max:200',
          'order' => 'required|max:2',
        ];
    }

    public function messages()
    {
        return [
            'icon.required' => 'El campo Icono es requerido y debe se ser un valor valido de Material Design Icons',
            'title.required' => 'El campo Titulo es requerido',
            'link.required' => 'El campo Link es requerido y debe de ser una Ruta valida',
            'order.required' => 'El campo Orden es requerido y su valor debe de ser entre 1 y 99',
            'icon.max' => 'El máximo permitido en el campo Icono son 20 caracteres y debe se ser un valor valido de Material Design Icons',
            'tittle.max' => 'El máximo permitido en el campo Titulo son 50 caracteres',
            'link.max' => 'El máximo permitido en el campo Link son 200 caracteres y debe de ser una Ruta valida',
            'order.max' => 'El máximo permitido en el campo Orden son 2 y su valor debe de ser entre 1 y 99',
        ];
    }
}
