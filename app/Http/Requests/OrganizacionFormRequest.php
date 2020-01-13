<?php

namespace Sidecol\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrganizacionFormRequest extends FormRequest
{

    /**
     * Tabla: tbl_organizacion

             * idtbl_organizacion
             * nit
             * razonsocial
             * image     
             * margen
             * estado
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
            
            //'idtbl_organizacion',
            'nit'=>'required|max:13',
            'razonsocial'=>'required|max:45',
            'image'=>'mimes:jpeg,png',
            'margen'=>'required|max:45',
            'estado'=>'required|max:45',
        ];
    }
}
