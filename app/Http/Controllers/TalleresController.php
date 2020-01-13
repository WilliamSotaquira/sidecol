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

class TalleresController extends Controller
{
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	Public function Index(Request $request){

		$id=Auth::user()->id;

		$talleruser = DB::table('organizacion_users as ou')
		->join('tbl_organizacion as or','ou.organizacion_id','=','or.idtbl_organizacion')
		->where('ou.users_id','=',$id)
		->first();
		$idtaller=$talleruser->organizacion_id;
		// dd($talleruser);



		if ($idtaller){

			$query=trim($request->get('searchText'));

			$datos = DB::table('tbl_ost as ost')
			->join('tbl_detalleost as do','ost.idost','=','do.ost_id')
			->join('users_ost as uo','ost.idost','=','uo.ost_id')
			->join('users as us','uo.users_id','=','us.id')
			->join('organizacion_users as ou','us.id','=','ou.users_id')
			->where('ou.organizacion_id','=',$idtaller)
			->where ('uo.estado_uo','!=',2)
			->where('uo.estado_uo','=','1')
			->where('ost.idost','LIKE','%'.$query.'%')
			->orderBy('ost.idost','desc')
			->paginate(20);



    	// dd($datos);	    	

			return view('servicios/talleres/osts/index',["datos"=>$datos,"talleruser"=>$talleruser,"searchText"=>$query]);
		}else{

			return "error en la carga de datos, no se detecta taller para este usuario";

		}

	}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	Public function edit($id){


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

		return view('servicios.talleres.osts.edit',["data"=>$data,"productos"=>$productos,"municipios"=>$municipios,"articulos"=>$articulos]);	
	}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	public function update( Request $request,$id)
	{
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

				return redirect()->route('servicios.talleres.osts.index')->with('warning','Orden de Servicio y detalles editados con éxito');
			}

		} catch (Exception $e) {

			DB::rollback();

			return redirect()->route('servicios.talleres.index')->with('warning','Error excepcion: '.$e);

		}

	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	

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

		->where('ou.organizacion_id','=',$idtaller)
		->where('os.idost','LIKE','%'.$query.'%')
		->orderBy('eo.ideventososts','desc')
		->paginate(50);

		$users = DB::table('users')
		->get();


		// dd($eventososts);ID
// OST	Tipo	Descripción	Soporte	Usuario	Fecha

		return view ('servicios.talleres.eventos.index',["eventososts"=>$eventososts,"users"=>$users,"talleruser"=>$talleruser,"searchText"=>$query]);

	}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
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
		->where('ou.organizacion_id','=',$idtaller)
		->where('os.estado_os','!=','8')
		->where('os.estado_os','!=','9')
		->get();

		// dd($osts);

		return view ("servicios.talleres.eventos.create",["users"=>$users,"osts"=>$osts,"id"=>$id]);	

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

		return redirect()->route('servicios.talleres.eventos.index')->with('success','El evento ha sido creado con éxito');		

	}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
///////////


	public function edit_uo ($id)
	{

		$user_id=Auth::user()->id;

		$talleruser = DB::table('organizacion_users as ou')
		->join('tbl_organizacion as or','ou.organizacion_id','=','or.idtbl_organizacion')
		->where('ou.users_id','=',$user_id)
		->first();
		$idtaller=$talleruser->organizacion_id;

		$id = Crypt::decrypt($id); 
		$data=users_ost::findOrFail($id);

		$tecnicos = DB::table('users as us')
		->join('organizacion_users as ou','us.id','=','ou.users_id')
		->join('tbl_organizacion as or','ou.organizacion_id','=','or.idtbl_organizacion')

		->where('ou.organizacion_id','=',$idtaller)

		->get();



		// dd($id,$idtaller,$data,$tecnicos);


		return view('servicios.talleres.osts.reasignar',["data"=>$data,"tecnicos"=>$tecnicos]);
	}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	

	public function update_uo(request $request,$id){

		// dd($request);

		$usersosts=users_ost::findOrFail($id);	
		$usersosts->fill($request->all())->save();


		$user=Auth::user()->id;
		$evento = new evento();
		$evento->tipo_evento='Reasignacion de Técnico';
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
			// $referencia = $productos;	
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
			// dd($data);


			Mail::send('emails.reasignacion',$data,function($message) use ($tec_mail,$razonsocial){
				$message->subject('Asignacion de orden de Servicio - '.$razonsocial);
				$message->to($tec_mail);
				Session::flash('success','Su correo fue enviado correctamente');
			});


			$osts = ost::findOrFail($idorden);
			$osts->estado_os=2;
			$osts->update();

			$user=Auth::user()->id;
			$evento = new evento();
			$evento->tipo_evento='Reasignacion de Técnico';
			$evento->descripcion="user:".$user." data".$usersosts;
			$evento->estado=1;
			$evento->save();

			$evento_ost = new eventos_osts;
			$evento_ost->tipoevento=3; 
			$evento_ost->descripcion='Taller modificó asignacion de OST'.$id.': '.$name.' '.$apellidos.', '.$fecha_asg.', '.$jornada.'.'; 
			$evento_ost->estado_eo=1; 
			$evento_ost->idost=$id; 
			$evento_ost->sujeto=Auth::id(); 
			$evento_ost->save();


			DB::commit();


			return redirect()->route('servicios.talleres.osts.index')->with('success','La reasigación ha sido completada con éxito');


		} catch (Exception $e) {

			DB::rollback();
			echo "Existe un problema al cargar la información";

		}
	}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	public function tecnicosindex (request $request){

		$query=trim($request->get('searchText'));

		$user_id=Auth::user()->id;

		$talleruser = DB::table('organizacion_users as ou')
		->join('tbl_organizacion as or','ou.organizacion_id','=','or.idtbl_organizacion')
		->where('ou.users_id','=',$user_id)
		->first();
		$idtaller=$talleruser->organizacion_id;

		$users=DB::table('users as us')
		->join('organizacion_users as ou','us.id','=','ou.users_id')
		->join('tbl_organizacion as or','ou.organizacion_id','=','or.idtbl_organizacion')
		->join('role_user as ru','us.id','=','ru.user_id')
		->join('roles as ro','ru.role_id','=','ro.id')
		->select('us.id','us.name as nombre','us.apellidos','us.email','us.documento','us.created_at','ro.name as rol')
		->where('or.idtbl_organizacion','=',$idtaller)
		->where('ou.estado','=','1')		
		->where('us.name','LIKE','%'.$query.'%')

		->orderBy('us.id','desc')

		->paginate(50);
		// dd($users);

		return view('servicios.talleres.tecnicos.index',["users"=>$users,"talleruser"=>$talleruser,"searchText"=>$query]);

	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function tecnicoscreate (){
		return view ('servicios.talleres.tecnicos.create');
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	
	public function tecnicosstore (request $request){

		$rules = ['email'=>'required|unique:users'];
		$validator = Validator::make($request->all(), $rules);
		if ($validator->fails()) {
       // handler errors
			$erros = $validator->errors();
			// dd($erros);
			return redirect()->route('servicios.talleres.tecnicos.index')->with('danger','Error este correo ya se encuentra en el sistema, verifique los datos e intentelo nuevamente.');
		}else{	

			try {

				$user_id=Auth::user()->id;

				$talleruser = DB::table('organizacion_users as ou')
				->join('tbl_organizacion as or','ou.organizacion_id','=','or.idtbl_organizacion')
				->where('ou.users_id','=',$user_id)
				->first();
				$idtaller=$talleruser->organizacion_id;

				DB::beginTransaction();		

				$password = $request->password;
				$cedula =  $request->documento;

				if ($pasword =! null) {

					$users = User::create($request->all());


					$password = Hash::make($users['password']);
					$users->password= $password;
					$users->update();         

				}

				$iduser=$users->id;

				// dd($iduser, $idtaller);	

				$asignacion = new org_user;
				$asignacion->organizacion_id = $idtaller;
				$asignacion->users_id = $iduser;
				$asignacion->estado = 1;
				$asignacion->save();

				$RolUsers = new rol_usuario();
				$RolUsers->user_id=$iduser;
				$RolUsers->role_id=20;
				$RolUsers->save();



				DB::commit();
				return redirect()->route('servicios.talleres.tecnicos.index')->with('warning','Usuario guardado con exito, se encuentra a la espera de su activación por parte del adminnistrador');

			} catch (Exception $e) {

				report($e);

				DB::rollback();			
				return redirect()->route('servicios.talleres.tecnicos.index')->with('danger','Error '.$e.' guardando el registro, verifique los datos e intentelo nuevamente.');
			}
		}
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	public function tecnicosshow($id){
		        //dd($id);
		$users=DB::table('users as u') 
		->select('u.id','u.name','u.apellidos','u.email','u.celular','u.tipo_documento','u.documento','u.direccion','u.score','u.created_at','u.updated_at')
		->where('u.id','=',$id) 
		->first(); 
        //dd($users);

		return view('servicios.talleres.tecnicos.show', ["users"=>$users]); 
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	public function tecnicosdestroy($id)
	{
		dd($id); 

		$users = User::findOrFail($id);
		$users->email='Usuario Desactivado';
		$users->password='';
		$users->score='';
		// $users->update();

		return redirect()->route('servicios.talleres.tecnicos.show', ["formorg"=>$users])->with('darger','Cliente desactivado con exito');

	}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

}
