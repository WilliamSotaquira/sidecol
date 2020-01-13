<?php

namespace Sidecol\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OstFormRequest extends FormRequest
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
            
            // 'idost'=>'required|max:11',
            // 'observaciones'=>'max:500',
            'tipo_os'=>'required|max:45',
            'estado_os'=>'max:11',
            'tipo_doc'=>'max:11',
            'numero_doc'=>'max:11',            
            // 'created_at'=>'required',
            // 'updated_at'=>'required',

        ];
    }
    
}
