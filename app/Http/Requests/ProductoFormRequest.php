<?php

namespace Sidecol\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoFormRequest extends FormRequest
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
            
            // 'idproducto'=>'required|max:11',
            'referencia'=>'required|max:45',
            'articulo'=>'required|max:300',
            'estado'=>'max:11',
            'subcatergoria_id'=>'max:45',
            'marca'=>'max:45',
            'costoventa'=>'max:11',
            'costoanterior'=>'max:11',
            // 'created_at'=>'required',
            // 'updated_at'=>'required',

        ];
    }
}

