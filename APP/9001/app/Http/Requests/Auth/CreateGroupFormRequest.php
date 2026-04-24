<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class CreateGroupFormRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'group' => 'required|string|max:25|unique:grupos',
          'name' => 'required|string|max:25|unique:grupos',
        ];
    }

    public function messages()
    {
        return [
            'group.required' => 'El campo es requerido',
            'name.required' => 'El campo es requerido',
            'group.max' => 'El máximo permitido son 25 caracteres',
            'name.max' => 'El máximo permitido son 25 caracteres',
        ];
    }
}
