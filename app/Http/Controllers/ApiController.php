<?php

namespace Sidecol\Http\Controllers;

use Illuminate\Http\Request;


use Sidecol\Http\Requests; 
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

/*modelos*/
use Sidecol\users_ost;
use Sidecol\User;
use Sidecol\ost;
use Sidecol\evento;
use Sidecol\eventos_osts;
use Sidecol\organizacion;
use Sidecol\org_user;
use Sidecol\detalle_ost;


use DB;
use Auth;

/*Request*/
use Sidecol\Http\Requests\UsersOstFormRequest;

class ApiController extends Controller
{
	public function cargarRole($id){

		try {

			$data = DB::table('roles as ro')
			->join('role_user as ru','ro.id','=','ru.role_id')
			->join('users as us','ru.user_id','=','us.id')
			->where('ru.user_id','=',$id)
			->select('ro.name','ro.description','ro.id','us.created_at')
			->get();



		 // $data=$id;
			return $data;
			
		} catch (Exception $e) {

			return $e;
			
		}
		
	}

	public function PorAsignar($id){

		// $PorAsignar = DB::table('tbl_ost as os')
		// ->join('users_ost as uo','os.idost','=','tbl_ost_idtbl_ost')
		// ->join('users as us','uo.users_id','=','us.id')
		// ->where('uo.users_id','=',$id)
		// ->where('os.estado','=',3)
		// ->count();

		$PorAsignar = DB::table('users_ost as uo')
		->join('tbl_ost as os','uo.tbl_ost_idtbl_ost','=','os.idost')
		->where('uo.users_id','=',$id)
		->where('os.estado','=',2)
		->count();


		return $PorAsignar;
	}

	public function Comprobar(request $request){

		$fecha = $request->fecha;
		$jornada = $request->jornada;
		$id = $request->id;

		$data = DB::table('users_ost as uo')
		->where('uo.users_id','=',$id)
		->where('uo.fecha_asg','=',$fecha)
		->where('uo.jornada','=',$jornada)
		->count();

		return $data;
	}

	public function tipousuario(request $request){

		$iduser = $request->id;

		$rol =DB::table('role_user as ru')
		->where('ru.user_id','=',$iduser)	
		->select('ru.role_id')
		->first();
		$role_id=$rol->role_id;


		return $role_id;
	}

	public function cargardatos(request $request){

		$idost=$request->id;
		$ost = DB::table('tbl_ost as os')
		->select('os.observaciones')
		->where('os.idost','=',$idost)			
		->first();
		$data=$ost->observaciones;


		return $data;

	}

	public function contacto(request $request){

		$idost=$request->id;

		$data = ost::findOrFail($idost); 
		$data->estado_os=4;
		$data->update();

		return $data;
	}
}
