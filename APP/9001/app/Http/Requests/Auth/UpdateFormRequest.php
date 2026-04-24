<?php


namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
          'fname' => 'required|string|max:255',
          'lname' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'fname.required' => 'El campo es requerido',
            'lname.required' => 'El campo es requerido',
            'fname.max' => 'El máximo permitido son 255 caracteres',
            'lname.max' => 'El máximo permitido son 255 caracteres',
        ];
    }
}
