<?php

namespace Sidecol\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermisoUsuarioFormRequest extends FormRequest
{

        public function authorize()
        {
            return true;
        }

        public function rules()
        {
            return [

               // 'id'=>'required|max:10',
               'permission_id'=>'required|max:10',
               'user_id'=>'required|max:10',
               // 'created_at'=>'required|max:13',
               // 'updated_atJ'=>'required|max:13',
           ];
       }
   }
