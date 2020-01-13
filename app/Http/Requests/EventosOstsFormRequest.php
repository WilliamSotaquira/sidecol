<?php

namespace Sidecol\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventosOstsFormRequest extends FormRequest
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

            // 'ideventososts'=>'required|max:13',
            'tipoevento'=>'required|max:13',
            'descripcion'=>'required|max:13',
            'soporte'=>'required|max:13',
            'estado_eo'=>'required|max:13',
            'idost'=>'required|max:13',
            // 'created_at'=>'required|max:13',   
            // 'updated_at'=>'required|max:13',
            'sujeto'=>'required|max:13',

        ];
    }
}
