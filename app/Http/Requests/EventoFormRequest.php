<?php

namespace Sidecol\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventoFormRequest extends FormRequest
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

            // 'idtbl_evento'=>'max:11',
            'tipo_evento'=>'required|max:13',
            'descripcion'=>'max:500',
            'estado'=>'required|max:11',
            // 'updated_at'=>'max:13',
            // 'created_at'=>'max:13',


        ];
    }
}
