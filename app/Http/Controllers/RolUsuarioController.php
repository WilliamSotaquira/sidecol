<?php

namespace Sidecol\Http\Controllers;

use Illuminate\Http\Request;

use Sidecol\Http\Requests; 
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

use Sidecol\rol_usuario;
use Sidecol\evento;

use Sidecol\Http\Requests\RolUsuarioFormRequest;
use Sidecol\Http\Requests\EventoFormRequest;
use Response;
use Auth;

use DB;

class RolUsuarioController extends Controller
{
	public function Index(Request $request){

		$query=trim($request->get('searchText'));

		$RolUsers =  DB::table('role_user as ru')
		->join('users as u','ru.user_id','=','u.id')
		->join('roles as r','ru.role_id','=','r.id')


		->select('ru.id','u.documento','u.name as nombre','u.apellidos','r.id as rolid','r.name','r.slug','r.description')
		->where('u.documento','LIKE','%'.$query.'%')
		->orwhere('u.name','LIKE','%'.$query.'%')
		->orwhere('u.apellidos','LIKE','%'.$query.'%')
		->orwhere('r.name','LIKE','%'.$query.'%')
		->orwhere('r.slug','LIKE','%'.$query.'%')
		->orderBy('ru.id','desc')
		->paginate(20);

		return view ('seguridad.roluser.index',["RolUsers"=>$RolUsers,"searchText"=>$query]);
	}

	public function create()
	{
		$usuarios = DB::table('users')->get();
		$roles = DB::table('roles')->get();


		return view ("seguridad.roluser.create",["usuarios"=>$usuarios,"roles"=>$roles]);
	}
	Public function store(RolUsuarioFormRequest $request){

		$user_id = $request->get('user_id');
		$role_id = $request->get('role_id');

		// dd($request);
		

		$cont = 0;

		while ($cont < count($role_id))

		{
			$n = $user_id;
			$RolUsers = new rol_usuario();
			$RolUsers->user_id=$user_id[$cont];
			$RolUsers->role_id=$role_id[$cont];
			// dd($request);
			$RolUsers->save();
			$cont=$cont+1;

			$user=Auth::user()->id;
			$evento = new evento();
			$evento->tipo_evento=78;
			$evento->descripcion="user:".$user." data".$RolUsers;
			$evento->estado=1;
			$evento->save();
			

		}
		return redirect()->route('seguridad.roluser.index')->with('success','Asignación guardada con éxito');

	}

	public function edit ($id){

		$RolUsers=rol_usuario::findOrFail($id);
		$users = DB::table('users')->get();
		$roles = DB::table('roles')->get();
		// dd($RolUsers);


		return view('seguridad.roluser.edit',["RolUsers"=>$RolUsers,"users"=>$users,"roles"=>$roles]);

	}
	
	public function update (RolUsuarioFormRequest $request, $id){



		$RolUsers=rol_usuario::findOrFail($id);	
		$RolUsers->role_id=$request->get('role_id');
		$RolUsers->user_id=$request->get('user_id');
		 // dd($RolUsers);
		$RolUsers->update();

		$user=Auth::user()->id;
		$evento = new evento();
		$evento->tipo_evento=79;
		$evento->descripcion="user:".$user." data".$RolUsers;
		$evento->estado=1;
		$evento->save();

		// dd($RolUsers);


		return redirect()->route('seguridad.roluser.index')->with('success','Asignación editada con éxito');

	}
	
	public function destroy ($id){

		$RolUsers = rol_usuario::findOrFail($id);

		$c = $RolUsers->role_id;

		if($c === 6)
		{

			return redirect()->route('seguridad.roluser.index')->with('danger','No se puede eliminar debido a que este usuario tiene privilegios...');			

		}else{

			$RolUsers =rol_usuario::findOrFail($id);

			$user=Auth::user()->id;

			$evento = new evento();
			$evento->tipo_evento=80;
			$evento->descripcion="user:".$user." data".$RolUsers;
			$evento->estado=1;
			$evento->save();

			$RolUsers->delete();			


			return redirect()->route('seguridad.roluser.index')->with('success','Rol eliminado con exito');
		}

		




	}

}
