<?php

namespace Sidecol\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductosBodegaFormRequest extends FormRequest
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
            
            // 'idProductoBodega'=>'required|max:11',
            'bodega_id'=>'required|max:11',
            'producto_id'=>'required|max:11',
            'cantidad'=>'required|max:11',
        ];
    }
}
