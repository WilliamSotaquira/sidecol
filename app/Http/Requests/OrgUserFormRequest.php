<?php

namespace Sidecol\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrgUserFormRequest extends FormRequest
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

            // 'id'=>'required|max:11',
            'organizacion_id'=>'required|max:11',
            'users_id'=>'required|max:11',
            'estado'=>'required|max:11',
            // 'created_at'=>'required|max:11',
            // 'updated_at'=>'required|max:11',
        ];
    }
}
