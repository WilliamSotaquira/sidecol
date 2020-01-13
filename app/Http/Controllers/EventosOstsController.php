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
use Sidecol\eventos_osts;
use Sidecol\organizacion;
use Sidecol\org_user;
use Sidecol\detalle_ost;


/*Otros*/
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;
use Response;
use Auth;
use DB;

class EventosOstsController extends Controller
{

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	

	public function index(Request $request){


		$query=trim($request->get('searchText'));

		$eventososts =  DB::table('eventos_osts as eo')
		->join('tbl_ost as os','eo.idost','=','os.idost')
		->join('users_ost as uo','os.idost','=','uo.ost_id')
		->join('users as us','uo.users_id','=','us.id')
		->join('organizacion_users as ou','us.id','=','ou.users_id')
		->join('tbl_organizacion as or','ou.organizacion_id','=','or.idtbl_organizacion')
		->select('eo.ideventososts','eo.tipoevento','os.idost','eo.descripcion','eo.soporte','eo.sujeto','eo.created_at')

		->where('os.idost','LIKE','%'.$query.'%')
		->orwhere('eo.descripcion','LIKE','%'.$query.'%')
		->orderBy('eo.ideventososts','desc')
		->paginate(20);

		$users = DB::table('users')
		->get();

		// dd($users);

		return view ('servicios.eventososts.index',["eventososts"=>$eventososts,"users"=>$users,"searchText"=>$query]);


	}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	

	public function create($id){

		$id = Crypt::decrypt($id);  

		// dd($id);
		$iduser=Auth::id();


		$users = DB::table('users as us')
		->join('organizacion_users as ou','us.id','=','ou.users_id')
		->join('tbl_organizacion as or','ou.organizacion_id','=','or.idtbl_organizacion')
		->join('role_user as ru','us.id','=','ru.user_id')
		->join('roles as ro','ru.role_id','=','ro.id')
		->select('us.id','us.name','us.apellidos','or.razonsocial','ro.id as role_id','ro.name as rname')
		->where('ro.id','=','12')
		->orwhere('us.id','=',$iduser)
		->first();

		$role_user=$users->role_id;
		// dd($role_user);

		if ($id=='0'){
			if ($role_user  === 12 || $role_user  === 13){

				$osts = DB::table('tbl_ost as os')
				->join('users_ost as uo','os.idost','=','uo.ost_id')
				->join('tbl_detalleost as do','os.idost','=','do.ost_id')
				->where('uo.users_id','=',$iduser)
				->get();
				// dd($osts);

				return view ("servicios.eventososts.create",["users"=>$users,"osts"=>$osts,"id"=>$id]);	

			}elseif ($role_user  === 5 || $role_user  === 9){

				$osts = DB::table('tbl_ost as os')
				->join('users_ost as uo','os.idost','=','uo.ost_id')				
				->join('tbl_detalleost as do','os.idost','=','do.ost_id')
				->where('uo.users_id','=',$iduser)			
				->where('os.idost','=',$id)
				->get();
				// dd($osts);

				return view ("servicios.eventososts.create",["users"=>$users,"osts"=>$osts,"id"=>$id]);	

			}
			elseif ($role_user  === 1 || $role_user  === 2){

				$osts = DB::table('tbl_ost as os')
				->join('users_ost as uo','os.idost','=','uo.ost_id')				
				->join('tbl_detalleost as do','os.idost','=','do.ost_id')
				->get();
				// dd($osts);

				return view ("servicios.eventososts.create",["users"=>$users,"osts"=>$osts,"id"=>$id]);	
			}

		}
		else{

			$osts = DB::table('tbl_ost as os')
			->join('users_ost as uo','os.idost','=','uo.ost_id')						
			->join('tbl_detalleost as do','os.idost','=','do.ost_id')
			->get();

			return view ("servicios.eventososts.create",["users"=>$users,"osts"=>$osts,"id"=>$id]);	

		}




	}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	

	public function store(request $request){
		
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
			switch ($role_id) {

				case '1': case '2': case '5': case '6':
				$idorden = $request->idost;
				$evento=eventos_osts::create($request->all());
				$image = $request->file('soporte');
				if ($request->file('soporte')) {
					$path = Storage::disk('public')->put('soportes',$request->file('soporte'));
					$evento->fill(['soporte' => asset($path)])->save();
				}
				$osts = ost::findOrFail($idorden);
				$osts->estado_os=13;
				$osts->update();
				$iddetalleost = DB::table('users_ost as uo')
				->where('uo.ost_id','=',$idorden)
				->select('uo.idusers_ost')
				->first();
				$users_ost=users_ost::findOrFail($iddetalleost->idusers_ost);	
				$users_ost->estado_uo=1;
				$users_ost->update();
				break;

				default:								
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
			}
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
			$users_ost->estado_uo=1;
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
		

		return redirect()->route('servicios.osts.index')->with('success','El evento ha sido creado con éxito');		

	}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	public function aceptar($id){

		$id = Crypt::decrypt($id);  

		return view('servicios.eventososts.aceptar',['idost'=>$id]);
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	

	public function ratificar($id){

		// Aceptacion de la OST

		$idosts = Crypt::decrypt($id); 
		// dd($idosts);

		$iddetalleost = DB::table('users_ost as uo')
		->where('uo.ost_id','=',$idosts)
		->select('uo.idusers_ost')
		->first();
		// dd();

		$osts=ost::findOrFail($idosts);	
		$osts->estado_os='3';
		$osts->update();

		$users_ost=users_ost::findOrFail($iddetalleost->idusers_ost);	
		$users_ost->estado_uo='1';
		$users_ost->update();


		$servicio=DB::table('tbl_ost as os')			
		->where('os.idost','=',$idosts)		
		->join('tbl_detalleost as do','os.idost','=','do.ost_id')
		->join('users_ost as uo','os.idost','=','uo.ost_id')
		->join('users as u','uo.users_id','=','u.id')
		->join('organizacion_users as ou','u.id','=','ou.users_id')
		->join('tbl_organizacion as or','ou.organizacion_id','=','or.idtbl_organizacion')
		->select('os.idost','os.observaciones','os.tipo_os','os.estado_os','os.created_at','do.iddetalleost','do.contacto_ost','do.direccion_ost','do.celular_ost','do.telefono_ost','do.email_ost as user_mail','do.falla','do.estado_garantia','uo.fecha_asg','uo.jornada','u.name','u.apellidos','u.email as tec_mail','u.celular as cel_tech','or.razonsocial')
		->where('os.idost','=',$idosts)	
		->first();

		// dd($servicio);

		$idservicio = Crypt::encrypt($idosts);
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
		$cel_tech = $servicio->cel_tech;
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
			'cel_tech' => $cel_tech, 
			'razonsocial' => $razonsocial, 
			'tipo' => $tipo_os, 
		);


		Mail::send('emails.confirmacion_adm',$data,function($message){
			$message->subject('Servicio Técnico Confirmado');
			$message->to('william.sotaquira@grupo-idea.com');
			Session::flash('success','Su correo fue enviado correctamente');
		});

		return redirect()->route('servicios.osts.index')->with('warning','Asignación confirmada con éxito');



	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	

	public function aceptarcliente($id){

		$idosts = Crypt::decrypt($id); 
		// dd($id);

		$data_ost = ost::findOrFail($idosts); 
		$data_ost->estado_os=3;
		$data_ost->update();

		// dd($idosts);

		$iddetalleost = DB::table('users_ost as uo')
		->where('uo.ost_id','=',$idosts)
		->select('uo.idusers_ost')
		->first();
		// dd($iddetalleost);



		$osts=DB::table('tbl_ost as os')			
		->where('os.idost','=',$idosts)		
		->join('tbl_detalleost as do','os.idost','=','do.ost_id')
		->join('users_ost as uo','os.idost','=','uo.ost_id')
		->join('users as u','uo.users_id','=','u.id')
		->join('organizacion_users as ou','u.id','=','ou.users_id')
		->join('tbl_organizacion as or','ou.organizacion_id','=','or.idtbl_organizacion')
		->join('municipios as mu','do.municipio_id','=','mu.id_municipio')
		->join('departamentos as de','mu.departamento_id','=','de.id_departamento')
		->select('os.idost','os.observaciones','os.tipo_os as tost','os.estado_os','os.created_at','do.iddetalleost','do.contacto_ost','do.direccion_ost','do.celular_ost','do.telefono_ost','do.email_ost as user_mail','do.falla','do.estado_garantia','uo.fecha_asg','uo.jornada','u.name','u.apellidos','u.email as tec_mail','u.celular as cel_tech','or.razonsocial','mu.id_municipio','mu.municipio','de.departamento','do.nro_factura','do.nro_serie')
		->where('os.idost','=',$idosts)	
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
		// dd($productos);

		$idusers_ost=$iddetalleost->idusers_ost;
		$data=users_ost::findOrFail($idusers_ost);
		// dd($data);


		$tecnicos = DB::table('users as us')
		->join('organizacion_users as ou','us.id','=','ou.users_id')
		->join('tbl_organizacion as or','ou.organizacion_id','=','or.idtbl_organizacion')
		->join('role_user as ru','us.id','=','ru.user_id')
		->join('roles as ro','ru.role_id','=','ro.id')
		->select('us.id','us.name','us.apellidos','or.razonsocial','ro.id as role_id','ro.name as rname')
		->where('ro.id','=','12')
		->orwhere('ro.id','=','13')
		->get();
		// dd($tecnicos);




		$servicio=DB::table('tbl_ost as os')			
		->where('os.idost','=',$idosts)		
		->join('tbl_detalleost as do','os.idost','=','do.ost_id')
		->join('users_ost as uo','os.idost','=','uo.ost_id')
		->join('users as u','uo.users_id','=','u.id')
		->join('organizacion_users as ou','u.id','=','ou.users_id')
		->join('tbl_organizacion as or','ou.organizacion_id','=','or.idtbl_organizacion')
		->select('os.idost','os.observaciones','os.tipo_os','os.estado_os','os.created_at','do.iddetalleost','do.contacto_ost','do.direccion_ost','do.celular_ost','do.telefono_ost','do.email_ost as user_mail','do.falla','do.estado_garantia','uo.fecha_asg','uo.jornada','u.name','u.apellidos','u.email as tec_mail','u.celular as cel_tech','or.razonsocial')
		->where('os.idost','=',$idosts)	
		->first();

		// dd($servicio);	

		$idservicio = Crypt::encrypt($idosts);
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
		$cel_tech = $servicio->cel_tech;
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


		$log = array(
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
			'cel_tech' => $cel_tech, 
			'razonsocial' => $razonsocial, 
			'tipo' => $tipo_os, 
		);


		Mail::send('emails.confirmacion_user',$log,function($message) use ($user_email){
			$message->subject('Servicio Técnico Confirmado');
			$message->to($user_email);
			Session::flash('success','Su correo fue enviado correctamente');
		});



		return view('servicios.eventososts.aceptarcliente',["data"=>$data,"productos"=>$productos,"osts"=>$osts,"tecnicos"=>$tecnicos]);

	}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	

	public function updateservice(request $request){

// En esta clase se acepta contacto y se confirma la orden de servicio tecnico
		// dd($request);
		try {

			DB::beginTransaction();

			$idost=$request->ost_id;
			$idusers_ost=$request->idusers_ost;
			$iddetalleost=$request->iddetalleost;

			$data_ost = ost::findOrFail($idost); 
			$data_ost->observaciones=$request->get('observaciones');
			$data_ost->tipo_os=$request->get('tipo_os');
			$data_ost->estado_os=5;
			$data_ost->update();

			$data_detalleost = detalle_ost::findOrFail($iddetalleost);
			$data_detalleost->nro_factura=$request->get('nro_factura');
			$data_detalleost->nro_serie=$request->get('nro_serie');
			$data_detalleost->estado_garantia=$request->get('estado_garantia');
			$data_detalleost->falla=$request->get('falla');
			$data_detalleost->update();

			$data_usersosts =  users_ost::findOrFail($idusers_ost);
			$data_usersosts->users_id=$request->get('users_id');
			$data_usersosts->user_asg=$request->get('huesped');
			$data_usersosts->fecha_asg=$request->get('fecha_asg');
			$data_usersosts->jornada=$request->get('jornada');
			$data_usersosts->estado_uo=1;
			$data_usersosts->update();

			$evento_ost = new eventos_osts;
			$evento_ost->tipoevento=1; 
			$evento_ost->descripcion='Confirmacion entre partes de la orden de servicio tecnico'; 
			$evento_ost->estado_eo=1; 
			$evento_ost->idost=$idost; 
			$evento_ost->sujeto=Auth::id(); 
			$evento_ost->save();

// enviar email

			$servicio=DB::table('tbl_ost as os')			
			->join('tbl_detalleost as do','os.idost','=','do.ost_id')
			->join('users_ost as uo','os.idost','=','uo.ost_id')
			->join('users as u','uo.users_id','=','u.id')
			->join('organizacion_users as ou','u.id','=','ou.users_id')
			->join('tbl_organizacion as or','ou.organizacion_id','=','or.idtbl_organizacion')
			->select('os.idost','os.observaciones','os.tipo_os','os.estado_os','os.created_at','do.iddetalleost','do.contacto_ost','do.direccion_ost','do.celular_ost','do.telefono_ost','do.email_ost as user_mail','do.falla','do.estado_garantia','uo.fecha_asg','uo.jornada','u.name','u.apellidos','u.email as tec_mail','u.celular as cel_tech','or.razonsocial')
			->where('os.idost','=',$idost)	
			->first();

		// dd($servicio);

			$idservicio = Crypt::encrypt($idost);
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
			$cel_tech = $servicio->cel_tech;
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
				'cel_tech' => $cel_tech, 
				'razonsocial' => $razonsocial, 
				'tipo' => $tipo_os, 
			);


			Mail::send('emails.confirmacion_adm',$data,function($message){
				$message->subject('Servicio Técnico Confirmado');
				$message->to('william.sotaquira@grupo-idea.com');
				Session::flash('success','Su correo fue enviado correctamente');
			});

			Mail::send('emails.confirmacion_tec',$data,function($message) use ($tec_mail){
				$message->subject('Servicio Técnico Confirmado');
				$message->to($tec_mail);
				Session::flash('success','Su correo fue enviado correctamente');
			});

			Mail::send('emails.confirmacion_user',$data,function($message) use ($user_email){
				$message->subject('Servicio Técnico Confirmado');
				$message->to($user_email);
				Session::flash('success','Su correo fue enviado correctamente');
			});


// cerrar envio email

			DB::commit();
			return redirect()->route('servicios.tecnicos.osts.index')->with('success','Asignación aceptada y confirmada con éxito');

		} catch (Exception $e) {

			DB::rollback();
			return redirect()->route('servicios.tecnicos.osts.index')->with('warning','Error: '.$e);			

		}




	}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	public function rechazar($id){

		$id = Crypt::decrypt($id); 
		$user=Auth::id();

		$iduser = Auth::id();
		$rol = DB::table('role_user as ru')
		->join('roles as ro','ru.role_id','=','ro.id')
		->where('ru.user_id','=',$iduser)
		->select('ru.role_id','ro.name')
		->first();
		$role_id=$rol->role_id;
		$role_name=$rol->name;
		// dd($role_name);


		$data_ost = ost::findOrFail($id); 
		$data_ost->estado_os=9;
		$data_ost->update();

		$evento_ost = new eventos_osts;
		$evento_ost->tipoevento=3; 
		$evento_ost->descripcion='La orden ha sido rechazada'; 
		$evento_ost->estado_eo=1; 
		$evento_ost->idost=$id; 
		$evento_ost->sujeto=$user; 
		$evento_ost->save();

		return redirect()->route('home')->with('warning','La orden ha sido rechazada con éxito');



	}

}
