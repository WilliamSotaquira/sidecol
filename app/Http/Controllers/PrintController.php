<?php

namespace Sidecol\Http\Controllers;

use Illuminate\Http\Request;

use Sidecol\Http\Requests; 
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

/*modelos*/
use Sidecol\rol_usuario;
use Sidecol\evento;

/*Request*/
use Sidecol\Http\Requests\RolUsuarioFormRequest;
use Sidecol\Http\Requests\EventoFormRequest;

/*Otros*/

use Carbon\Carbon;
use Response;
use Auth;
use DB;


class PrintController extends Controller
{

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	public function index(Request $request)
	{
		$query=trim($request->get('searchText'));

        //

		return view ('seguridad.roluser.index',["RolUsers"=>$RolUsers,"searchText"=>$query]);
	}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	public function create()
	{
        //

		return view ("seguridad.roluser.create",["usuarios"=>$usuarios,"roles"=>$roles]);
	}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	public function store(demoFormRequest $request)
	{
        //

		return redirect()->route('seguridad.roluser.index')->with('success','Asignación guardada con éxito');
	}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	public function show($id)
	{
        //

		return view("clientes.sede.show", ["forms"=>$forms]); 

	}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	public function edit($id)
	{
        //

		return view('seguridad.roluser.edit',["RolUsers"=>$RolUsers,"users"=>$users,"roles"=>$roles]);
	}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	public function update(demoFormRequest $request,$id)
	{
        //

		return redirect()->route('seguridad.roluser.index')->with('warning','Asignación editada con éxito');
	}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	public function destroy($id)
	{
        //
		return redirect()->route('seguridad.roluser.index')->with('danger','Rol eliminado con exito');
	}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	public function ImprimirOst($id)
	{
		// dd($id);
		// $id = Crypt::decrypt($id); 

		$osts=DB::table('tbl_ost as os')			
		->join('tbl_detalleost as do','os.idost','=','do.ost_id')
		->join('municipios as mu','do.municipio_id','=','mu.id_municipio')
		->join('departamentos as de','mu.departamento_id','=','de.id_departamento')
		->where('os.idost','=',$id)	
		->first();

		$productos = DB::table('do_productos as dp')
		->join('tbl_producto as pr','dp.producto_id','=','pr.idproducto')
		->join('tbl_marca as ma','pr.marca_id','=','ma.idmarca')
		->join('tbl_subcategoria as sc','pr.subcategoria_id','=','sc.idsubcategoria')
		->join('tbl_categoria as ca','sc.categoria_id','=','ca.idcategoria')
		->where('dp.detalleost_id','=',$id)
		->get();

		$tecnico =  DB::table('users_ost as uo')
		->join('tbl_ost as os','uo.ost_id','=','os.idost')
		->join('users as us','uo.users_id','=','us.id')
		->join('organizacion_users as ou','us.id','=','ou.users_id')
		->join('tbl_organizacion as or','ou.organizacion_id','=','or.idtbl_organizacion')
		->where('os.idost','=',$id)
		->first();

		// dd($id,$osts,$tecnico,$productos);
	

		   //Mediante carbon añadimos a la variable today el dia actual
		$today = Carbon::now()->format('d/m/Y');
			//añadimos el nombre de la vista, en este caso "ejemplo" y la variable "today" que enviaremos a la vista.
		$pdf = \PDF::loadView('impresion.osts.imprimir',["osts"=>$osts,"productos"=>$productos,'tecnico'=>$tecnico,'today'=>$today])->setPaper('letter');
			//el metodo download descargará la vista en formato pdf, en el metodo download escribimos el nombre del archivo (ejemplo.pdf)
		return $pdf->stream();



	// 		// dd($osts);
	// return view ('servicios.osts.show',["osts"=>$osts,"productos"=>$productos]);
	}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

}
