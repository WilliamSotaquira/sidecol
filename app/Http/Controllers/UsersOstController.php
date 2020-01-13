<?php

namespace Sidecol\Http\Controllers;

use Illuminate\Http\Request;

use Mail;
use Session;
use Redirect;

use Sidecol\Http\Requests; 
use Illuminate\Http\UploadedFile;
// use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

/*modelos*/
use Sidecol\users_ost;
use Sidecol\User;
use Sidecol\ost;
use Sidecol\evento;
use Sidecol\organizacion;
use Sidecol\org_user;

/*Auxiliares*/
use Sidecol\detalle_ost;
use Sidecol\producto;
use Sidecol\marca;



/*Request*/
use Sidecol\Http\Requests\UsersOstFormRequest;
use Sidecol\Http\Requests\EventoFormRequest;

/*Otros*/
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;
use Response;
use Auth;
use DB;

class UsersOstController extends Controller
{

	var $user_email;
// ----------------------------------------------------------------------------------------------------------------------------------------------

	public function index(Request $request)
	{
		$query=trim($request->get('searchText'));

		$usersosts = DB::table('users_ost as uo')	
		->join('users as us','uo.users_id','=','us.id')

		->join('organizacion_users as ou','us.id','=','ou.users_id')		
		->join('tbl_organizacion as or','ou.organizacion_id','=','or.idtbl_organizacion')		
		->join('tbl_ost as os','uo.ost_id','=','os.idost')
		->join('tbl_detalleost as do','os.idost','=','do.ost_id')

		->select('uo.idusers_ost','uo.jornada','uo.fecha_asg','uo.estado_uo as euo','us.name','us.apellidos','us.celular','us.email','or.razonsocial','os.idost','os.tipo_os','os.estado_os as eos')

		->where('os.idost','LIKE','%'.$query.'%')
		->orwhere('us.name','LIKE','%'.$query.'%')
		->orwhere('us.apellidos','LIKE','%'.$query.'%')
		->orwhere('or.razonsocial','LIKE','%'.$query.'%')
		->orwhere('uo.fecha_asg','LIKE','%'.$query.'%')

		
		->orderBy('uo.fecha_asg','desc')
		->paginate(20); 

		// dd($usersosts);


		return view ('servicios.usersosts.index',["usersosts"=>$usersosts,"searchText"=>$query]);
	}
// ----------------------------------------------------------------------------------------------------------------------------------------------

	public function create($id)
	{
		$id = Crypt::decrypt($id);  
		
		$users = DB::table('users as us')
		->join('organizacion_users as ou','us.id','=','ou.users_id')
		->join('tbl_organizacion as or','ou.organizacion_id','=','or.idtbl_organizacion')
		->join('role_user as ru','us.id','=','ru.user_id')
		->join('roles as ro','ru.role_id','=','ro.id')
		->select('us.id','us.name','us.apellidos','or.razonsocial','ro.id as role_id','ro.name as rname')
		->where('ro.id','=','12')
		->orwhere('ro.id','=','13')
		->get();
		// dd($users);



		if ($id=='0'){
			$osts = DB::table('tbl_ost as os')
			->where('os.estado_os','=','1')
			->orwhere('os.estado_os','=','6')
			->orwhere('os.estado_os','=','8')
			->orderBy('os.idost','desc')
			->get();
			// dd($osts);

		}else{
			$osts = DB::table('tbl_ost as os')
			->where('os.idost','=',$id)
			->get();
			// dd($osts);
		}

		

		return view ("servicios.usersosts.create",["users"=>$users,"osts"=>$osts,"id"=>$id]);
	}
// ----------------------------------------------------------------------------------------------------------------------------------------------

	public function store(UsersOstFormRequest $request)
	{

		// dd($request); 

		try {

			DB::beginTransaction();

			$asignacion = users_ost::create($request->all()); 
			$idorden = $request->ost_id;



			$servicio=DB::table('tbl_ost as os')					
			->join('tbl_detalleost as do','os.idost','=','do.ost_id')
			->join('users_ost as uo','os.idost','=','uo.ost_id')
			->join('users as u','uo.users_id','=','u.id')
			->join('organizacion_users as ou','u.id','=','ou.users_id')
			->join('tbl_organizacion as or','ou.organizacion_id','=','or.idtbl_organizacion')
			->select('os.idost','os.observaciones','os.tipo_os','os.estado_os','os.created_at','do.iddetalleost','do.contacto_ost','do.direccion_ost','do.celular_ost','do.telefono_ost','do.email_ost as user_mail','do.falla','do.estado_garantia','uo.fecha_asg','uo.jornada','u.name','u.apellidos','u.email as tec_mail','or.razonsocial')
			->where('os.idost','=',$idorden)	
			->first();

			// dd($servicio);
			$iddetalle = $servicio->iddetalleost;

			$productos = DB::table('do_productos as dp')
			->join('tbl_producto as pr','dp.producto_id','=','pr.idproducto')
			->join('tbl_marca as ma','pr.marca_id','=','ma.idmarca')
			->join('tbl_subcategoria as sc','pr.subcategoria_id','=','sc.idsubcategoria')
			->join('tbl_categoria as ca','sc.categoria_id','=','ca.idcategoria')
			->where('dp.detalleost_id','=',$iddetalle)
			->get();

			// dd(count($productos));	
			//existen dos variables de productos

			// dd($servicio);
			

			$cant = 0;
			$det = '';
			// $referencia = $productos->iddetalleost;	
			// dd($referencia);


			while ($cant < count($productos)) {


				// dd($det);
				$referencia = $productos[$cant]->referencia;		
				$categoria = $productos[$cant]->categoria;		
				$marca = $productos[$cant]->marca;		
				$det=$categoria.' '.$marca.': <strong>'.$referencia.'</strong>. <br>'.$det;

				$cant++;
			}

			// dd($det);	
			


			$idservicio = Crypt::encrypt($idorden);
			$contacto = $servicio->contacto_ost;
			$direccion = $servicio->direccion_ost;
			$celular = $servicio->celular_ost;
			$telefono = $servicio->telefono_ost;
			$user_email = $servicio->user_mail;
			$fecha_asg = $servicio->fecha_asg;
			$jornada = $servicio->jornada;
			$falla = $servicio->falla;
			$observaciones = $servicio->observaciones;
			$name = $servicio->name;
			$apellidos = $servicio->apellidos;
			$tec_mail = $servicio->tec_mail;
			$razonsocial = $servicio->razonsocial;
			$tipo_os = $servicio->tipo_os;

			// dd($idservicio);

			if ($jornada === 1) 
			{
				$jornada = 'Mañana';
			}else{
				$jornada = 'Tarde';
			}

			if($tipo_os=1){
				$tipo_os='Instalación';
			}elseif($tipo_os=2){
				$tipo_os='Mantenimiento';
			}elseif($tipo_os=3){
				$tipo_os='Garantía';
			}elseif($tipo_os=4){
				$tipo_os='Otro';
			}else{
				$tipo_os='Error en dato';
			}


			$data = array(
				'idservicio' => $idservicio, 
				'contacto' => $contacto, 
				'direccion' => $direccion, 
				'celular' => $celular, 
				'telefono' => $telefono, 
				'user_email' => $user_email, 
				'fecha_asg' => $fecha_asg,  
				'jornada' => $jornada,  
				'falla' => $falla,  
				'observaciones' => $observaciones,  
				'name' => $name, 
				'apellidos' => $apellidos, 
				'mail_tech' => $tec_mail, 
				'razonsocial' => $razonsocial, 
				'tipo' => $tipo_os, 
				'productos'=>$det,
			);


			Mail::send('emails.asignacion',$data,function($message) use ($tec_mail){
				$message->subject('Asignación de Servicio Técnico');
				$message->to($tec_mail);
				Session::flash('success','Su correo fue enviado correctamente');
			});

// Orden de servicio tecnico Asignada a un tecnico o taller
			
			$osts = ost::findOrFail($idorden);
			$osts->estado_os=2;
			$osts->update();


			$user=Auth::user()->id;
			$evento = new evento();
			$evento->tipo_evento='Asignación de tecnico a OST';
			$evento->descripcion="user:".$user." data".$asignacion;
			$evento->estado=1;
			$evento->save();

			DB::commit();


			return redirect()->route('servicios.osts.index')->with('success','Asignación de servicio a técnico guardada con éxito');


		} catch (Exception $e) {

			DB::rollback();
			echo "Existe un problema al cargar la información";

		}



	}
// ----------------------------------------------------------------------------------------------------------------------------------------------

	public function show($id)
	{

		$id = Crypt::decrypt($id); 

		$data =  DB::table('users_ost as uo')
		->join('tbl_ost as os','uo.ost_id','=','os.idost')
		->join('users as us','uo.users_id','=','us.id')
		->join('organizacion_users as ou','us.id','=','ou.users_id')
		->join('tbl_organizacion as or','ou.organizacion_id','=','or.idtbl_organizacion')
		->where('os.idost','=',$id)
		->first();

		// dd($data,$id);




		return view('servicios.usersosts.show',["data"=>$data]); 

	}
// ----------------------------------------------------------------------------------------------------------------------------------------------

	public function edit($id)
	{

		$id = Crypt::decrypt($id); 
		$data=users_ost::findOrFail($id);

		$tecnicos = DB::table('users as us')
		->join('organizacion_users as ou','us.id','=','ou.users_id')
		->join('tbl_organizacion as or','ou.organizacion_id','=','or.idtbl_organizacion')
		->join('role_user as ru','us.id','=','ru.user_id')
		->join('roles as ro','ru.role_id','=','ro.id')
		->select('us.id','us.name','us.apellidos','or.razonsocial','ro.id as role_id','ro.name as rname')
		->where('ro.id','=','12')
		->orwhere('ro.id','=','13')
		->get();


		return view('servicios.usersosts.edit',["data"=>$data,"tecnicos"=>$tecnicos]);
	}
// ----------------------------------------------------------------------------------------------------------------------------------------------

	public function update(request $request,$id)
	{
		// dd($request);
		
		$usersosts=users_ost::findOrFail($id);	
		$usersosts->fill($request->all())->save();
		

		$user=Auth::user()->id;
		$evento = new evento();
		$evento->tipo_evento=84;
		$evento->descripcion="user:".$user." data".$usersosts;
		$evento->estado=1;
		$evento->save();

		try {

			DB::beginTransaction();

			// $asignacion = users_ost::create($request->all()); 
			$idorden = $request->ost_id;
			// dd($idorden);

			$servicio=DB::table('tbl_ost as os')					
			->join('tbl_detalleost as do','os.idost','=','do.ost_id')
			->join('users_ost as uo','os.idost','=','uo.ost_id')
			->join('users as u','uo.users_id','=','u.id')
			->join('organizacion_users as ou','u.id','=','ou.users_id')
			->join('tbl_organizacion as or','ou.organizacion_id','=','or.idtbl_organizacion')
			->select('os.idost','os.observaciones','os.tipo_os','os.estado_os','os.created_at','do.iddetalleost','do.contacto_ost','do.direccion_ost','do.celular_ost','do.telefono_ost','do.email_ost as user_mail','do.falla','do.estado_garantia','uo.fecha_asg','uo.jornada','u.name','u.apellidos','u.email as tec_mail','or.razonsocial')
			->where('os.idost','=',$idorden)	
			->first();

			// dd($servicio);
			$iddetalle = $servicio->iddetalleost;

			$productos = DB::table('do_productos as dp')
			->join('tbl_producto as pr','dp.producto_id','=','pr.idproducto')
			->join('tbl_marca as ma','pr.marca_id','=','ma.idmarca')
			->join('tbl_subcategoria as sc','pr.subcategoria_id','=','sc.idsubcategoria')
			->join('tbl_categoria as ca','sc.categoria_id','=','ca.idcategoria')
			->where('dp.detalleost_id','=',$iddetalle)
			->get();

			// dd(count($productos));	
			//existen dos variables de productos

			// dd($servicio);
			

			$cant = 0;
			$det = '';
			// $referencia = $productos->iddetalleost;	
			// dd($referencia);


			while ($cant < count($productos)) {


				// dd($det);
				$referencia = $productos[$cant]->referencia;		
				$categoria = $productos[$cant]->categoria;		
				$marca = $productos[$cant]->marca;		
				$det=$categoria.' '.$marca.': <strong>'.$referencia.'</strong>. <br>'.$det;

				$cant++;
			}

			// dd($det);	
			


			$idservicio = Crypt::encrypt($idorden);
			$contacto = $servicio->contacto_ost;
			$direccion = $servicio->direccion_ost;
			$celular = $servicio->celular_ost;
			$telefono = $servicio->telefono_ost;
			$user_email = $servicio->user_mail;
			$fecha_asg = $servicio->fecha_asg;
			$jornada = $servicio->jornada;
			$falla = $servicio->falla;
			$observaciones = $servicio->observaciones;
			$name = $servicio->name;
			$apellidos = $servicio->apellidos;
			$tec_mail = $servicio->tec_mail;
			$razonsocial = $servicio->razonsocial;
			$tipo_os = $servicio->tipo_os;

			// dd($idservicio);

			if ($jornada === 1) 
			{
				$jornada = 'Mañana';
			}else{
				$jornada = 'Tarde';
			}

			if($tipo_os=1){
				$tipo_os='Instalación';
			}elseif($tipo_os=2){
				$tipo_os='Mantenimiento';
			}elseif($tipo_os=3){
				$tipo_os='Garantía';
			}elseif($tipo_os=4){
				$tipo_os='Otro';
			}else{
				$tipo_os='Error en dato';
			}


			$data = array(
				'idservicio' => $idservicio, 
				'contacto' => $contacto, 
				'direccion' => $direccion, 
				'celular' => $celular, 
				'telefono' => $telefono, 
				'user_email' => $user_email, 
				'fecha_asg' => $fecha_asg,  
				'jornada' => $jornada,  
				'falla' => $falla,  
				'observaciones' => $observaciones,  
				'name' => $name, 
				'apellidos' => $apellidos, 
				'mail_tech' => $tec_mail, 
				'razonsocial' => $razonsocial, 
				'tipo' => $tipo_os, 
				'productos'=>$det,
			);


			Mail::send('emails.reasignacion',$data,function($message) use ($tec_mail){
				$message->subject('Reasignación de Orden de Servicio Técnico');
				$message->to($tec_mail);
				Session::flash('success','Su correo fue enviado correctamente');
			});


			$osts = ost::findOrFail($idorden);
			$osts->estado_os=2;
			$osts->update();


			$user=Auth::user()->id;
			$evento = new evento();
			$evento->tipo_evento=84;
			$evento->descripcion="user:".$user." data".$usersosts;
			$evento->estado=1;
			$evento->save();

			DB::commit();


			return redirect()->route('servicios.osts.index')->with('success','La reasigación ha sido completada con éxito');


		} catch (Exception $e) {

			DB::rollback();
			echo "Existe un problema al cargar la información";

		}

	}
// ----------------------------------------------------------------------------------------------------------------------------------------------

	public function destroy($id)
	{
		$marcasubcategorias=marca_subcategoria::findOrFail($id);

		$c = $marcasubcategorias->role_id;


		if($c === 1 || $c === 2 )
		{

			return redirect()->route('productos.marcasubcategorias.index')->with('danger','No se puede eliminar la asignación debido a que este usuario tiene privilegios...');			

		}else{

			$marcasubcategorias =marca_subcategoria::findOrFail($id);

			$user=Auth::user()->id;

			$evento = new evento();
			$evento->tipo_evento=85;
			$evento->descripcion="user:".$user." data".$marcasubcategorias;
			$evento->estado=1;
			$evento->save();

			$marcasubcategorias->delete();

			return redirect()->route('productos.marcasubcategorias.index')->with('danger','Asignación eliminada con éxito');
		}

	}
// ----------------------------------------------------------------------------------------------------------------------------------------------

}
