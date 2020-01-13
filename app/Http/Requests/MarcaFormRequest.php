<?php

namespace Sidecol\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MarcaFormRequest extends FormRequest
{


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
            
            // 'idtbl_marca'=>'required|max:11',
            'marca'=>'max:45',
            'tiempogarantia'=>'max:45',
            'image'=>'required|mimes:jpeg,png',
          

        ];
    }
}
