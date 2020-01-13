<?php

namespace Sidecol\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubcategoriaFormRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [

          // 'idsubcategoria'=>'required|max:10',
          'subcategoria'=>'required|max:45',
          'estado'=>'required|max:11',
          'categoria_id'=>'required|max:11',
          // 'created_at'=>'required',
          // 'updated_at'=>'required',

      ];
  }
}

