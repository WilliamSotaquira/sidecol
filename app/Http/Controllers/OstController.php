<?php

namespace Sidecol\Http\Controllers;

use Illuminate\Http\Request;

use Sidecol\Http\Requests; 
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

/*modelos*/ 
use Sidecol\ost;
use Sidecol\detalle_ost;
use Sidecol\evento;
use Sidecol\do_productos;

/*Request*/
use Sidecol\Http\Requests\OstFormRequest;
use Sidecol\Http\Requests\DetalleOstFormRequest;
use Sidecol\Http\Requests\EventoFormRequest;

/*Otros*/
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;
use Response;
use Auth;
use DB;

class OstController extends Controller
{

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	

	public function Index(Request $request){

		$query=trim($request->get('searchText'));
		
		$iduser = Auth::id();

		$rol = DB::table('role_user as ru')
		->where('ru.user_id','=',$iduser)
		->select('ru.role_id')
		->first();

		$role_id=$rol->role_id;

		switch ($role_id) {
			case 1:	case 2:	case 3:	case 4:	case 5:	case 6:

			$osts =  DB::table('tbl_ost as ost')
			->join('tbl_detalleost as do','ost.idost','=','do.ost_id')
			->where('ost.estado_os','LIKE','%'.$query.'%')
			->orwhere('ost.observaciones','LIKE','%'.$query.'%')
			->orwhere('do.contacto_ost','LIKE','%'.$query.'%')
			->orwhere('ost.idost','LIKE','%'.$query.'%')
			->orderBy('ost.idost','desc')
			->paginate(20);

			return view ('servicios.osts.index',["osts"=>$osts,"role_id"=>$role_id,"searchText"=>$query]);			

			break;

			case 12: case 13:

			$osts =  DB::table('tbl_ost as ost')
			->join('tbl_detalleost as do','ost.idost','=','do.ost_id')
			->join('users_ost as uo','ost.idost','=','uo.ost_id')
			->where('uo.users_id','=',$iduser)
			->orwhere('ost.estado_os','LIKE','%'.$query.'%')
			->orwhere('ost.observaciones','LIKE','%'.$query.'%')
			->orwhere('do.contacto_ost','LIKE','%'.$query.'%')
			->orwhere('ost.idost','LIKE','%'.$query.'%')
			->orderBy('ost.idost','desc')
			->paginate(20);
			// dd($osts);

			return view ('servicios.osts.index',["osts"=>$osts,"role_id"=>$role_id,"searchText"=>$query]);			

			break;
			
			default:
			return view ('home');
			break;

		}



		
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	

	public function create(){

		$municipios = DB::table('municipios as m')
		->join('departamentos as d','m.departamento_id','=','d.id_departamento')->get();


		$productos = DB::table('tbl_producto as p')
		->join('tbl_marca as mc','p.marca_id','=','mc.idmarca')
		->join('tbl_subcategoria as sc','p.subcategoria_id','=','sc.idsubcategoria')
		->join('tbl_categoria as c','sc.categoria_id','=','c.idcategoria')
		->get();
		
		$facturas = DB::table('tbl_compra as c')
		->get();

		return view ("servicios.osts.create",["productos"=>$productos,"municipios"=>$municipios]);
	}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	

	public function store(request $request){
		
		// Creacion de la Orden de servicio tecnico: Esta clase se encarga de completar la preOrden de servicio tecnico que apartir de este momento pasa a ser OST 
		
		// dd($request);

		try {

			DB::beginTransaction();

			$osts = new ost;
			$osts->observaciones=$request->get('observaciones');
			$osts->tipo_os=$request->get('tipo_os');
			$osts->estado_os=1;
			$osts->save();

			if ($request){

				$detalles_osts= new detalle_ost;
				$detalles_osts->contacto_ost=$request->get('contacto_ost');
				$detalles_osts->tipo_doc=$request->get('tipo_doc');
				$detalles_osts->numero_doc=$request->get('numero_doc');
				$detalles_osts->direccion_ost=$request->get('direccion_ost');
				$detalles_osts->celular_ost=$request->get('celular_ost');
				$detalles_osts->telefono_ost=$request->get('telefono_ost');
				$detalles_osts->email_ost=$request->get('email_ost');
				$detalles_osts->nro_factura=$request->get('nro_factura');
				$detalles_osts->estado_garantia=$request->get('estado_garantia');
				$detalles_osts->nro_serie=$request->get('nro_serie');
				$detalles_osts->falla=$request->get('falla');
				$detalles_osts->ost_id=$osts->idost;
				$detalles_osts->municipio_id=$request->get('municipio_id');
				$detalles_osts->save();	


				$idproductos=$request->get('producto_id');
				$referencia=$request->get('referencia');
				$categoria=$request->get('categoria');
				$marca=$request->get('marca');

				// dd($detalles_osts->iddetalleost);

				$cant = 0;
				while ($cant < count($idproductos)) {

					$productos  = new do_productos;
					// dd($productos);
					$productos->detalleost_id=$detalles_osts->iddetalleost;
					$productos->producto_id=$idproductos[$cant];
					$productos->save();

					$cant++;
				}

				DB::commit();


				$user=Auth::user()->id;
				$evento = new evento();
				$evento->tipo_evento='Se ha creado OST';
				$evento->descripcion="user:".$user." osts".$osts."detalles_osts".$detalles_osts;
				$evento->estado=1;
				$evento->save();
			}

			return redirect()->route('servicios.osts.index')->with('success','Servicio creado con exito');
		} catch (Exception $e) {

			DB::rollback();
			return redirect()->route('servicios.osts.index')->with('warning','No se ha creado el servicio');

		}
	}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	

	public function show($id){

		$id = Crypt::decrypt($id); 

		$osts=DB::table('tbl_ost as os')			
		->join('tbl_detalleost as do','os.idost','=','do.ost_id')
		->join('municipios as mu','do.municipio_id','=','mu.id_municipio')
		->join('departamentos as de','mu.departamento_id','=','de.id_departamento')
		->where('os.idost','=',$id)	
		->first();
		// dd($osts);


		$iddetalle = $osts->iddetalleost;
		$productos = DB::table('do_productos as dp')
		->join('tbl_producto as pr','dp.producto_id','=','pr.idproducto')
		->join('tbl_marca as ma','pr.marca_id','=','ma.idmarca')
		->join('tbl_subcategoria as sc','pr.subcategoria_id','=','sc.idsubcategoria')
		->join('tbl_categoria as ca','sc.categoria_id','=','ca.idcategoria')
		->where('dp.detalleost_id','=',$iddetalle)
		->get();


			// dd($osts);
		return view ('servicios.osts.show',["osts"=>$osts,"productos"=>$productos]);







	}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	public function edit($id)
	{

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


		return view('servicios.osts.edit',["data"=>$data,"productos"=>$productos,"municipios"=>$municipios,"articulos"=>$articulos]);
	}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	

	public function update( Request $request,$id)
	{
		try {


			DB::beginTransaction();

			$osts=ost::findOrFail($id);    
			$osts->observaciones=$request->get('observaciones');
			$osts->estado_os=$request->get('estado_os');
			$osts->tipo_os=$request->get('tipo_os');
			$osts->update();

			$iddetalleost = DB::table('tbl_detalleost')
			->where('ost_id','=',$osts->idost)
			->select('iddetalleost')
			->first();

			if (!empty($iddetalleost)) {


				$detalle_ost=detalle_ost::findOrFail($iddetalleost->iddetalleost);
				$detalle_ost->contacto_ost=$request->get('contacto_ost');
				$detalle_ost->tipo_doc=$request->get('tipo_doc');
				$detalle_ost->numero_doc=$request->get('numero_doc');
				$detalle_ost->direccion_ost=$request->get('direccion_ost');
				$detalle_ost->celular_ost=$request->get('celular_ost');
				$detalle_ost->telefono_ost=$request->get('telefono_ost');
				$detalle_ost->email_ost=$request->get('email_ost');
				$detalle_ost->nro_factura=$request->get('nro_factura');
				$detalle_ost->estado_garantia=$request->get('estado_garantia');
				$detalle_ost->estado_garantia=$request->get('estado_garantia');
				$detalle_ost->nro_serie=$request->get('nro_serie');
				$detalle_ost->falla=$request->get('falla');
				$detalle_ost->municipio_id=$request->get('municipio_id');
				$detalle_ost->update();

				$user=Auth::user()->id;
				$evento = new evento();
				$evento->tipo_evento='Edicion OST';
				$evento->descripcion="user:".$user." osts".$osts."detalle_ost".$detalle_ost;
				$evento->estado=1;
				$evento->save();

				DB::commit();

				return redirect()->route('servicios.osts.index')->with('warning','Orden de Servicio y detalles editados con éxito');
			}

		} catch (Exception $e) {

			DB::rollback();

			return redirect()->route('servicios.osts.index')->with('warning','Error excepcion: '.$e);

		}




	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	

	public function destroy($id){

		$iduser = Auth::id();


		try {

			$osts=ost::findOrFail($id);    	
			$osts->estado_os=9;
			$osts->update();



			$user=Auth::user()->id;
			$evento = new evento();
			$evento->tipo_evento='OST rechazada por'+$iduser;
			$evento->descripcion="user:".$user." osts".$osts;
			$evento->estado=1;
			$evento->save();

			return redirect()->route('servicios.osts.index')->with('danger','Asignación eliminado con exito');

		} catch (Exception $e) {

			return redirect()->route('servicios.osts.index')->with('danger','Error Exception: '.$e);

		}


	}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	

	public function subcreate($id)
	{


		$id = Crypt::decrypt($id); 
		// dd($id);

		$data = DB::table('tbl_ost as o')
		->join('tbl_detalleost as do','o.idost','=','do.ost_id')
		->join('municipios as mu','do.municipio_id','=','mu.id_municipio')
		->join('departamentos as de','mu.departamento_id','=','de.id_departamento')
		->where('o.idost','=',$id)
		->first();


		$productos = DB::table('tbl_producto as p')
		->join('tbl_marca as mc','p.marca_id','=','mc.idmarca')
		->join('tbl_subcategoria as sc','p.subcategoria_id','=','sc.idsubcategoria')
		->join('tbl_categoria as c','sc.categoria_id','=','c.idcategoria')
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

		return view('servicios.osts.subcreate',["data"=>$data,"productos"=>$productos,"municipios"=>$municipios,"articulos"=>$articulos]);
	}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	public function subupdate(request $request, $id){

		// dd($request);

		try {

			DB::beginTransaction();			

			$osts=ost::findOrFail($id);    
			$osts->observaciones=$request->get('observaciones');
			$osts->estado_os=1;
			$osts->tipo_os=$request->get('tipo_os');
			$osts->update();



			$iddetalleost = DB::table('tbl_detalleost')
			->where('ost_id','=',$osts->idost)
			->select('iddetalleost')
			->first();

			if (!empty($iddetalleost)) {


				$detalle_ost=detalle_ost::findOrFail($iddetalleost->iddetalleost);
				$detalle_ost->contacto_ost=$request->get('contacto_ost');
				$detalle_ost->tipo_doc=$request->get('tipo_doc');
				$detalle_ost->numero_doc=$request->get('numero_doc');
				$detalle_ost->direccion_ost=$request->get('direccion_ost');
				$detalle_ost->celular_ost=$request->get('celular_ost');
				$detalle_ost->telefono_ost=$request->get('telefono_ost');
				$detalle_ost->email_ost=$request->get('email_ost');
				$detalle_ost->nro_factura=$request->get('nro_factura');
				$detalle_ost->estado_garantia=$request->get('estado_garantia');
				$detalle_ost->estado_garantia=$request->get('estado_garantia');
				$detalle_ost->nro_serie=$request->get('nro_serie');
				$detalle_ost->falla=$request->get('falla');
				$detalle_ost->municipio_id=$request->get('municipio_id');
				$detalle_ost->update();

				// dd($detalle_ost);

				$idproductos=$request->get('producto_id');
				$referencia=$request->get('referencia');
				$categoria=$request->get('categoria');
				$marca=$request->get('marca');


				if(!empty($idproductos)){

			// dd($idproductos);
					$cant = 0;
					while ($cant < count($idproductos)) {

						$productos  = new do_productos;			
						$productos->detalleost_id=$detalle_ost->iddetalleost;
						$productos->producto_id=$idproductos[$cant];
						$productos->save();
						$cant++;
					}
					$msj = "Los productos se guardaron correctamente.";

				}else{
					$msj = "Los productos no se guardaron.";
				}

				$user=Auth::user()->id;
				$evento = new evento();
				$evento->tipo_evento='Se completa OST';
				$evento->descripcion="user:".$user." osts".$osts."detalle_ost".$detalle_ost;
				$evento->estado=1;
				$evento->save();

				DB::commit();


				return redirect()->route('servicios.osts.index')->with('warning','La Orden de Servicio Técnico (OST) y sus detalles editados con éxito, '.$msj);
			}


		} catch (Exception $e) {

			DB::rollback();
			return redirect()->route('servicios.osts.index')->with('danger','¡Error! no se completo el registro exepcion: '.$e);

		}


	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	




}



