<?php

namespace Sidecol\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserFormRequest extends FormRequest
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

    /*
    tabla: users 
        id
        name
        apellidos
        email
        password
        celular
        tipo_documento
        documento
        direccion
        score
        remember_token
        created_at
        updated_at
    */

        'name'=>'required|max:120',
        'apellidos'=>'required|max:250',
        'email'=>'required|max:120|unique:users',
        'password'=>'required|max:120',
        'celular'=>'required|max:50',
        'tipo_documento'=>'required|max:50',
        'documento'=>'required|max:50|unique:users',
        'direccion'=>'required|max:50',
      

        ];
    }
}
