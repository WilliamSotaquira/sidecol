<?php

namespace Sidecol\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MarcasubcategoriaFormRequest extends FormRequest
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

            // 'idmarcasubcategoria'=>'required|max:11',
            'marca_id'=>'required|max:11',
            'subcategoria_id'=>'required|max:11',
            // 'created_at'=>'required',
            // 'updated_at'=>'required',
        ];
    }
}
