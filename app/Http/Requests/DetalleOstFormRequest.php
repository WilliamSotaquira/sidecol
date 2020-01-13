<?php

namespace Sidecol\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DetalleOstFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            // 'iddetalleost'=>'required|max:11',           
            // 'contacto_ost'=>'max:45',
            // 'tipo_doc'=>'required|max:11',
            // 'numero_doc'=>'required|max:25',
            // 'direccion_ost'=>'required|max:200',
            // 'celular_ost'=>'required|max:15',
            // 'telefono_ost'=>'required|max:15',
            // 'email_ost'=>'required|max:45',
            // 'nro_factura'=>'required|max:45',
            // 'estado_garantia'=>'required|max:45',
            // 'nro_serie'=>'required|max:45',
            // 'falla'=>'required|max:45',
            // 'ost_id'=>'required|max:11',
            // 'municipio_id'=>'required|max:11',

        ];
    }
}