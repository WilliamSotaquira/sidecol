<?php

namespace Sidecol\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriaFormRequest extends FormRequest
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

            // 'idcategoria'=>'required|max:11',
            'categoria'=>'required|max:45',
            'estado'=>'required|max:11',
            // 'created_at'=>'required|max:10',
            // 'updated_at'=>'required|max:10',
        ];
    }
}

