<?php

namespace Sidecol\Http\Controllers;

use Illuminate\Http\Request;

use Sidecol\Http\Requests; 
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

/*modelos*/
use Sidecol\org_user;
use Sidecol\evento;

/*Request*/
use Sidecol\Http\Requests\OrgUserFormRequest;
use Sidecol\Http\Requests\EventoFormRequest;

/*Otros*/

use Carbon\Carbon;
use Response;
use Auth;
use DB;

class OrgUserController extends Controller
{

// ----------------------------------------------------------------------------------------------------------------------------------------------

	public function index(Request $request)
	{
		$query=trim($request->get('searchText'));

		$org_users = DB::table('organizacion_users as orgu')

		->join('tbl_organizacion as o','orgu.organizacion_id','=','o.idtbl_organizacion')
		->join('users as u','orgu.users_id','=','u.id')
		
		


		->select('orgu.id','orgu.estado','o.nit','o.razonsocial','u.id as idu','u.name','u.apellidos','u.documento','u.celular','u.email')
		->where('u.name','LIKE','%'.$query.'%')
		->orwhere('u.apellidos','LIKE','%'.$query.'%')
		->orwhere('o.nit','LIKE','%'.$query.'%')
		->orwhere('o.razonsocial','LIKE','%'.$query.'%')
		->orderBy('orgu.id','desc')
		->paginate(7); 
		
		// dd($org_users);
		

		return view ('users.orgsusers.index',["org_users"=>$org_users,"searchText"=>$query]);
	}
// ----------------------------------------------------------------------------------------------------------------------------------------------

	public function create()
	{
		$usuarios = DB::table('users')->get();
		$orgs = DB::table('tbl_organizacion')->get();

		return view ("users.orgsusers.create",["usuarios"=>$usuarios,"orgs"=>$orgs]);
	}
// ----------------------------------------------------------------------------------------------------------------------------------------------

	public function store(OrgUserFormRequest $request)
	{
		$asignacion = org_user::create($request->all()); 

		return redirect()->route('users.orgsusers.index')->with('success','Asignación guardada con éxito');
	}
// ----------------------------------------------------------------------------------------------------------------------------------------------

	public function show($id)
	{
        // modelo sin uso

    // return view("clientes.sede.show", ["forms"=>$forms]); 

	}
// ----------------------------------------------------------------------------------------------------------------------------------------------

	public function edit($id)
	{
		$org_users=org_user::findOrFail($id);
		$usuarios = DB::table('users')->get();
		$orgs = DB::table('tbl_organizacion')->get();

		// dd($org_users);

		return view('users.orgsusers.edit',["org_users"=>$org_users,"orgs"=>$orgs,"usuarios"=>$usuarios]);
	}
// ----------------------------------------------------------------------------------------------------------------------------------------------

	public function update(OrgUserFormRequest $request,$id)
	{
		$asignacion=org_user::findOrFail($id);               	
		$asignacion->fill($request->all())->save();   

        // dd($asignacion);

		return redirect()->route('users.orgsusers.index')->with('warning','Asignación editada con éxito');
	}
// ----------------------------------------------------------------------------------------------------------------------------------------------

	public function destroy($id)
	{
		$asignacion=org_user::findOrFail($id);
		$asignacion->delete();

		$user=Auth::user()->id;

		$evento = new evento();
		$evento->tipo_evento=90;
		$evento->descripcion="user:".$user." data".$asignacion;
		$evento->estado=1;
		$evento->save();

		return redirect()->route('users.orgsusers.index')->with('danger','Asignación eliminado con exito');
	}
// ----------------------------------------------------------------------------------------------------------------------------------------------
}
