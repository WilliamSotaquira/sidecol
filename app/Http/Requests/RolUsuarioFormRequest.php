<?php

namespace Sidecol\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RolUsuarioFormRequest extends FormRequest
{
   /* 
    Tabla: role_user
        id
        role_id
        user_id
        created_at
        updated_at
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

            // 'id'=>'required|max:13',
            'role_id'=>'required|max:10',
            'user_id'=>'required|max:10',
            // 'created_at'=>'required|max:13',
            // 'updated_at'=>'required|max:13',


        ];
    }
}
