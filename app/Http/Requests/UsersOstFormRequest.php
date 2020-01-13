<?php

namespace Sidecol\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersOstFormRequest extends FormRequest
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

            // 'idusers_ost'=>'required|max:11',
            'users_id'=>'required|max:10',
            'ost_id'=>'required|max:11',
            'jornada'=>'required|max:11',
            'fecha_asg'=>'required|max:15',
            'estado_uo'=>'max:11',
        //     'created_at'=>'required',
        //     'updated_at'=>'required',
        // 
        ];
    }
}
