<?php

namespace Sidecol\Http\Controllers;

use Illuminate\Http\Request;

use Sidecol\Http\Requests; 
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

/*modelos*/
use Sidecol\permiso_rol;
use Sidecol\evento;

/*Request*/
use Sidecol\Http\Requests\PermisoRolFormRequest;
use Sidecol\Http\Requests\EventoFormRequest;

/*Otros*/

use Carbon\Carbon;
use Response;
use Auth;
use DB;


class PermisoRolController extends Controller

{
// ----------------------------------------------------------------------------------------------------------------------------------------------

	public function index(Request $request)
	{
		$query=trim($request->get('searchText'));

		$PermisosRoles = DB::table('permission_role as pr')
		->join('roles as r','pr.role_id','=','r.id')
		->join('permissions as p','pr.permission_id','=','p.id')
		->select('pr.id','r.name as rname','r.slug as rslug','r.description as rdescription','p.name as pname','p.slug as pslug','p.description as pdescription','pr.created_at')
		->where('r.name','LIKE','%'.$query.'%')
		->where('r.slug','LIKE','%'.$query.'%')
		->orwhere('p.name','LIKE','%'.$query.'%')
		->orwhere('p.slug','LIKE','%'.$query.'%')
		->orderBy('pr.id','desc')
		->paginate(7); 

		return view ('seguridad.permisosroles.index',["PermisosRoles"=>$PermisosRoles,"searchText"=>$query]);
	}
// ----------------------------------------------------------------------------------------------------------------------------------------------

	public function create()
	{
		$permisos = DB::table('permissions')->get();
		$roles = DB::table('roles')->get();
        //

		return view ("seguridad.permisosroles.create",["permisos"=>$permisos,"roles"=>$roles]);
	}
// ----------------------------------------------------------------------------------------------------------------------------------------------

	public function store(PermisoRolFormRequest $request)
	{
		try {

			DB::beginTransaction();

			$role_id = $request->get('role_id');
			$permission_id = $request->get('permission_id');

		// dd(count($role_id));


			$cont = 0;

			while ($cont < count($role_id))

			{

				$PermisosRoles = new permiso_rol();
				$PermisosRoles->role_id=$role_id[$cont];
				$PermisosRoles->permission_id=$permission_id[$cont];
				$PermisosRoles->save();
				$cont=$cont+1;

				$user=Auth::user()->id;
				$evento = new evento();
				$evento->tipo_evento=83;
				$evento->descripcion="user:".$user." data".$PermisosRoles;
				$evento->estado=1;
				$evento->save();



				DB::commit();



			}
			// dd($PermisosRoles);
		} catch (Exception $e) {

			DB::rollback();
		}

		return redirect()->route('seguridad.permisosroles.index')->with('success','Asignación guardada con éxito');

	}
// ----------------------------------------------------------------------------------------------------------------------------------------------

	public function show($id)
	{
        //

		// return view("clientes.sede.show", ["forms"=>$forms]); 

	}
// ----------------------------------------------------------------------------------------------------------------------------------------------

	public function edit($id)
	{
		$PermisosRoles=permiso_rol::findOrFail($id);
		$permisos = DB::table('permissions')->get();
		$roles = DB::table('roles')->get();

		return view('seguridad.permisosroles.edit',["PermisosRoles"=>$PermisosRoles,"permisos"=>$permisos,"roles"=>$roles]);
	}
// ----------------------------------------------------------------------------------------------------------------------------------------------

	public function update(PermisoRolFormRequest $request,$id)
	{
		$PermisosRoles=permiso_rol::findOrFail($id);	
		$PermisosRoles->permission_id=$request->get('permission_id');
		$PermisosRoles->role_id=$request->get('role_id');
		 // dd($PermisosRoles);
		$PermisosRoles->update();

		$user=Auth::user()->id;
		$evento = new evento();
		$evento->tipo_evento=84;
		$evento->descripcion="user:".$user." data".$PermisosRoles;
		$evento->estado=1;
		$evento->save();

		// dd($PermisosRoles);

		return redirect()->route('seguridad.permisosroles.index')->with('warning','Asignación editada con éxito');
	}
// ----------------------------------------------------------------------------------------------------------------------------------------------

	public function destroy($id)
	{
		$PermisosRoles=permiso_rol::findOrFail($id);

		$c = $PermisosRoles->role_id;
		

		if($c === 1 || $c === 2 )
		{

			return redirect()->route('seguridad.permisosroles.index')->with('danger','No se puede eliminar la asignación debido a que este usuario tiene privilegios...');			

		}else{

			$PermisosRoles =permiso_rol::findOrFail($id);

			$user=Auth::user()->id;

			$evento = new evento();
			$evento->tipo_evento=85;
			$evento->descripcion="user:".$user." data".$PermisosRoles;
			$evento->estado=1;
			$evento->save();

			$PermisosRoles->delete();
			
			return redirect()->route('seguridad.permisosroles.index')->with('danger','Asignación eliminada con éxito');
		}
		
	}
// ----------------------------------------------------------------------------------------------------------------------------------------------
}
