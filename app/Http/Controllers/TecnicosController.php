<?php

namespace Sidecol\Http\Controllers;

use Illuminate\Http\Request;

use Mail;
use Session;

use Sidecol\Http\Requests; 
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

use Sidecol\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Support\Facades\Redirect;

use Sidecol\Http\Requests\UserFormRequest;


/*modelos*/
use Sidecol\rol_usuario;
use Sidecol\users_ost;
use Sidecol\User;
use Sidecol\ost;
use Sidecol\detalle_ost;
use Sidecol\evento;
use Sidecol\eventos_osts;
use Sidecol\organizacion;
use Sidecol\org_user;

/*Auxiliares*/
use Sidecol\producto;
use Sidecol\marca;

/*Otros*/
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;

use Response;
use Auth;
use DB;


class TecnicosController extends Controller
{
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	Public function ostsindex(Request $request){

		$id=Auth::user()->id;

		if ($id){

			$query=trim($request->get('searchText'));
			$datos = DB::table('tbl_ost as ost')
			->join('tbl_detalleost as do','ost.idost','=','do.ost_id')
			->join('users_ost as uo','ost.idost','=','uo.ost_id')
			->join('users as us','uo.users_id','=','us.id')
			->join('organizacion_users as ou','us.id','=','ou.users_id')
			->where('us.id','=',$id)
			->where('ost.estado_os','!=','9')			
			->where('ost.estado_os','!=','13')			
			->where ('uo.estado_uo','!=',2)
			->where('uo.estado_uo','=','1')
			->where('ost.idost','LIKE','%'.$query.'%')
			->orderBy('ost.idost','desc')
			->paginate(20);

    	// dd($datos);	    	
			return view('servicios.tecnicos.osts.index',["datos"=>$datos,"searchText"=>$query]);

		}else{

			echo "error en la carga de datos, no se detecta usuario";

		}

	}
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	public function ostsedit($id){


		$id = Crypt::decrypt($id); 

		$data = DB::table('tbl_ost as o')
		->join('tbl_detalleost as do','o.idost','=','do.ost_id')
		->join('municipios as mu','do.municipio_id','=','mu.id_municipio')
		->join('departamentos as de','mu.departamento_id','=','de.id_departamento')
		->where('o.idost','=',$id)
		->first();

		$productos = DB::table('do_productos as dp')
		->join('tbl_producto as pr','dp.producto_id','=','pr.idproducto')
		->join('tbl_marca as ma','pr.marca_id','=','ma.idmarca')
		->join('tbl_subcategoria as sc','pr.subcategoria_id','=','sc.idsubcategoria')
		->join('tbl_categoria as ca','sc.categoria_id','=','ca.idcategoria')
		->where('dp.detalleost_id','=',$id)
		->get();

		$municipios = DB::table('municipios as m')
		->join('departamentos as d','m.departamento_id','=','d.id_departamento')
		->get();


		$articulos = DB::table('tbl_producto as p')
		->join('tbl_marca as mc','p.marca_id','=','mc.idmarca')
		->join('tbl_subcategoria as sc','p.subcategoria_id','=','sc.idsubcategoria')
		->join('tbl_categoria as c','sc.categoria_id','=','c.idcategoria')
		->get();

		// dd($data);

		return view('servicios.tecnicos.osts.edit',["data"=>$data,"productos"=>$productos,"municipios"=>$municipios,"articulos"=>$articulos]);	

	} 
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	public function ostsupdate(Request $request, $id){

		try {


			DB::beginTransaction();

			$osts=ost::findOrFail($id);    
			$osts->observaciones=$request->get('observaciones');
			// $osts->estado_os=$request->get('estado_os');
			// $osts->tipo_os=$request->get('tipo_os');
			$osts->update();

			$iddetalleost = DB::table('tbl_detalleost')
			->where('ost_id','=',$osts->idost)
			->select('iddetalleost')
			->first();

			$iddo = $iddetalleost->iddetalleost;

			// dd($request);

			if (!empty($iddetalleost)) {

				$detalle_ost=detalle_ost::findOrFail($iddo);	
				// $detalle_ost->contacto_ost=$request->get('contacto_ost');
				// $detalle_ost->tipo_doc=$request->get('tipo_doc');
				// $detalle_ost->numero_doc=$request->get('numero_doc');
				// $detalle_ost->direccion_ost=$request->get('direccion_ost');
				$detalle_ost->celular_ost=$request->get('celular_ost');
				$detalle_ost->telefono_ost=$request->get('telefono_ost');
				$detalle_ost->email_ost=$request->get('email_ost');
				$detalle_ost->nro_factura=$request->get('nro_factura');
				$detalle_ost->estado_garantia=$request->get('estado_garantia');
				$detalle_ost->estado_garantia=$request->get('estado_garantia');
				$detalle_ost->nro_serie=$request->get('nro_serie');
				$detalle_ost->falla=$request->get('falla');
				// $detalle_ost->municipio_id=$request->get('municipio_id');
				$detalle_ost->update();


				$user=Auth::user()->id;
				$evento = new evento();
				$evento->tipo_evento='Taller - Edicion OST';
				$evento->descripcion="user:".$user." osts".$osts."detalle_ost".$detalle_ost;
				$evento->estado=1;
				$evento->save();

				DB::commit();

				return redirect()->route('servicios.tecnicos.osts.index')->with('warning','Orden de Servicio y detalles editados con éxito');
			}

		} catch (Exception $e) {

			DB::rollback();

			return redirect()->route('servicios.tecnicos.index')->with('warning','Error excepcion: '.$e);

		}

	} 
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function eventosindex(Request $request){


		$query=trim($request->get('searchText'));

		$id=Auth::user()->id;

		$talleruser = DB::table('organizacion_users as ou')
		->join('tbl_organizacion as or','ou.organizacion_id','=','or.idtbl_organizacion')
		->where('ou.users_id','=',$id)
		->first();
		$idtaller=$talleruser->organizacion_id;
		// dd($talleruser);

		$eventososts =  DB::table('eventos_osts as eo')
		->join('tbl_ost as os','eo.idost','=','os.idost')
		->join('users_ost as uo','os.idost','=','uo.ost_id')
		->join('users as us','uo.users_id','=','us.id')
		->join('organizacion_users as ou','us.id','=','ou.users_id')
		->join('tbl_organizacion as or','ou.organizacion_id','=','or.idtbl_organizacion')
		->select('eo.ideventososts','eo.tipoevento','os.idost','eo.descripcion','eo.soporte','eo.sujeto','eo.created_at')

		->where('eo.sujeto','=',$id)
		->where('os.idost','LIKE','%'.$query.'%')
		->orderBy('eo.ideventososts','desc')
		->paginate(50);

		$users = DB::table('users')
		->get();

		// dd($eventososts);ID
// OST	Tipo	Descripción	Soporte	Usuario	Fecha

		return view ('servicios.tecnicos.eventos.index',["eventososts"=>$eventososts,"users"=>$users,"talleruser"=>$talleruser,"searchText"=>$query]);

	}
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	public function eventoscreate($id){

		$id = Crypt::decrypt($id);  
			// dd($id);

		$iduser=Auth::user()->id;
		$talleruser = DB::table('organizacion_users as ou')
		->join('tbl_organizacion as or','ou.organizacion_id','=','or.idtbl_organizacion')
		->where('ou.users_id','=',$iduser)
		->first();
		$idtaller=$talleruser->organizacion_id;

		$iduser=Auth::id();
		$users = DB::table('users as us')
		->join('organizacion_users as ou','us.id','=','ou.users_id')
		->join('tbl_organizacion as or','ou.organizacion_id','=','or.idtbl_organizacion')
		->join('role_user as ru','us.id','=','ru.user_id')
		->join('roles as ro','ru.role_id','=','ro.id')
		->select('us.id','us.name','us.apellidos','or.razonsocial','ro.id as role_id','ro.name as rname')
		->where('ou.organizacion_id','=',$idtaller)
		->get();
			// dd($users);

		$osts = DB::table('tbl_ost as os')
		->join('tbl_detalleost as do','os.idost','=','do.ost_id')
		->join('users_ost as uo','os.idost','=','uo.ost_id')
		->join('users as us','uo.users_id','=','us.id')
		->join('organizacion_users as ou','us.id','=','ou.users_id')
		->select('os.idost','os.observaciones','do.contacto_ost')
		->where('ou.users_id','=',$iduser)
		->where('os.estado_os','!=','8')
		->where('os.estado_os','!=','9')
		->get();

			// dd($osts);

		return view ("servicios.tecnicos.eventos.create",["users"=>$users,"osts"=>$osts,"id"=>$id]);	


	}
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	

	public function eventosstore(request $request){


		// dd($request);

		$iduser = Auth::id();
		$rol = DB::table('role_user as ru')
		->where('ru.user_id','=',$iduser)
		->select('ru.role_id')
		->first();
		$role_id=$rol->role_id;

		$tipoevento = $request->tipoevento;

		switch ($tipoevento) {

			case '1':
			$idorden = $request->idost;
			$evento=eventos_osts::create($request->all());
			$image = $request->file('soporte');
			if ($request->file('soporte')) {
				$path = Storage::disk('public')->put('soportes',$request->file('soporte'));
				$evento->fill(['soporte' => asset($path)])->save();
			}
			$osts = ost::findOrFail($idorden);
			$osts->estado_os=8;
			$osts->update();
			$iddetalleost = DB::table('users_ost as uo')
			->where('uo.ost_id','=',$idorden)
			->select('uo.idusers_ost')
			->first();
			$users_ost=users_ost::findOrFail($iddetalleost->idusers_ost);	
			$users_ost->estado_uo=1;
			$users_ost->update();
			break;

			case '2':
			$idorden = $request->idost;
			$evento=eventos_osts::create($request->all());
			$image = $request->file('soporte');
			if ($request->file('soporte')) {
				$path = Storage::disk('public')->put('soportes',$request->file('soporte'));
				$evento->fill(['soporte' => asset($path)])->save();
			}
			$osts = ost::findOrFail($idorden);
			$osts->estado_os=10;
			$osts->update();
			$iddetalleost = DB::table('users_ost as uo')
			->where('uo.ost_id','=',$idorden)
			->select('uo.idusers_ost')
			->first();
			$users_ost=users_ost::findOrFail($iddetalleost->idusers_ost);	
			$users_ost->estado_uo=0;
			$users_ost->update();
			break;

			case '3': case '4': case '7':
			$evento=eventos_osts::create($request->all());
			$image = $request->file('soporte');

			if ($request->file('soporte')) {
				$path = Storage::disk('public')->put('soportes',$request->file('soporte'));
				$evento->fill(['soporte' => asset($path)])->save();
			}
			break;

			case '5': case '6':
			$idorden = $request->idost;
			$evento=eventos_osts::create($request->all());
			$image = $request->file('soporte');
			if ($request->file('soporte')) {
				$path = Storage::disk('public')->put('soportes',$request->file('soporte'));
				$evento->fill(['soporte' => asset($path)])->save();
			}
			$osts = ost::findOrFail($idorden);
			$osts->estado_os=11;
			$osts->update();
			break;

			default:
			return 'No existe tipo de evento';
			break;

		}		

		return redirect()->route('servicios.tecnicos.eventos.index')->with('success','El evento ha sido creado con éxito');		

		
	}


	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	

}
