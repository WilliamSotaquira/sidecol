<?php

namespace Sidecol\Http\Controllers;

use Illuminate\Http\Request;

use Sidecol\Http\Requests; 
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

/*modelos*/
use Sidecol\permiso_usuario;
use Sidecol\evento;

/*Request*/
use Sidecol\Http\Requests\PermisoUsuarioFormRequest;
use Sidecol\Http\Requests\EventoFormRequest;

/*Otros*/

use Carbon\Carbon;
use Response;
use Auth;
use DB;


class PermisoUsuarioController extends Controller
{
///////////////////////////////////////////////////////////////////////////////

    public function index(Request $request)
    {
     $query=trim($request->get('searchText'));

     $PermisosUsuarios = DB::table('permission_user as pu')
     ->join('users as u','pu.user_id','=','u.id')
     ->join('permissions as pe','pu.permission_id','=','pe.id')
     ->join('role_user as ru','u.id','=','ru.user_id')
     ->join('roles as ro','ru.role_id','=','ro.id')

     ->select('pu.id','u.name as uname','u.apellidos','pe.name as pname','pe.slug as pslug','pe.description','pu.created_at','ro.name as rolname')

     ->where('u.name','LIKE','%'.$query.'%')
     ->where('u.apellidos','LIKE','%'.$query.'%')
     ->orwhere('pe.name','LIKE','%'.$query.'%')
     ->orwhere('pe.slug','LIKE','%'.$query.'%')
     ->orderBy('pu.id','desc')
     ->paginate(7); 

     // dd($PermisosUsuarios);

     return view ('seguridad.permisosusuarios.index',["PermisosUsuarios"=>$PermisosUsuarios,"searchText"=>$query]);
 }
///////////////////////////////////////////////////////////////////////////////

 public function create()
 {
    $usuarios = DB::table('users')->get();

    $roles = DB::table('roles')->get();
    // dd($roles);

    return view ("seguridad.permisosusuarios.create",["usuarios"=>$usuarios,"roles"=>$roles]);
}
///////////////////////////////////////////////////////////////////////////////

public function store(PermisoUsuarioFormRequest $request)
{
    $user_id = $request->get('user_id');
    $permission_id = $request->get('permission_id');

    // dd($request);


    $cont = 0;

    while ($cont < count($permission_id))

    {
        $PermisosUsuarios = new permiso_usuario();
        $PermisosUsuarios->permission_id=$permission_id[$cont];
        $PermisosUsuarios->user_id=$user_id[$cont];
            // dd($request);
        $PermisosUsuarios->save();
        $cont=$cont+1;

        $user=Auth::user()->id;
        $evento = new evento();
        $evento->tipo_evento=83;
        $evento->descripcion="user:".$user." data".$PermisosUsuarios;
        $evento->estado=1;
        $evento->save();


    }
    return redirect()->route('seguridad.permisosusuarios.index')->with('success','Asignación guardada con éxito');
}
///////////////////////////////////////////////////////////////////////////////

public function show($id)
{
        //

    // return view("clientes.sede.show", ["forms"=>$forms]); 

}
///////////////////////////////////////////////////////////////////////////////

public function edit($id)
{
    $PermisosUsuarios=permiso_usuario::findOrFail($id);
    $usuarios = DB::table('users')->get();
    $permisos = DB::table('permissions')->get();

    return view('seguridad.permisosusuarios.edit',["PermisosUsuarios"=>$PermisosUsuarios,"permisos"=>$permisos,"usuarios"=>$usuarios]);
}
///////////////////////////////////////////////////////////////////////////////

public function update(PermisoUsuarioFormRequest $request,$id)
{
    $PermisosUsuarios=permiso_usuario::findOrFail($id);    
    $PermisosUsuarios->permission_id=$request->get('permission_id');
    $PermisosUsuarios->user_id=$request->get('user_id');
         // dd($PermisosUsuarios);
    $PermisosUsuarios->update();

    $user=Auth::user()->id;
    $evento = new evento();
    $evento->tipo_evento=89;
    $evento->descripcion="user:".$user." data".$PermisosUsuarios;
    $evento->estado=1;
    $evento->save();

        // dd($PermisosUsuarios);

    return redirect()->route('seguridad.permisosusuarios.index')->with('warning','Asignación editada con éxito');
}
///////////////////////////////////////////////////////////////////////////////

public function destroy($id)
{
   $PermisosUsuarios =permiso_usuario::findOrFail($id);

   $user=Auth::user()->id;

   $evento = new evento();
   $evento->tipo_evento=90;
   $evento->descripcion="user:".$user." data".$PermisosUsuarios;
   $evento->estado=1;
   $evento->save();

   $PermisosUsuarios->delete();

   return redirect()->route('seguridad.permisosusuarios.index')->with('danger','Asignación eliminado con exito');
}
///////////////////////////////////////////////////////////////////////////////

public function byRole($id){

    $permisos=DB::table('roles as ro')  
    ->join('permission_role as pr','ro.id','=','pr.role_id')
    ->join('permissions as pe','pr.permission_id','=','pe.id')
    ->where('ro.id','=',$id)
    ->select('pe.id as pid','pe.name as pname','pe.description as pdescription','ro.id as rid','ro.name as rname','ro.description as rdescription')
    ->get();

    return $permisos;

}


///////////////////////////////////////////////////////////////////////////////

public function cargarRole(){

        $user =Auth::user()->id;
        $data = DB::table('roles as ro')
        ->join('role_user as ru','ro.id','=','ru.role_id')
        ->where('ru.user_id','=',13)
        ->select('ro.id as roid','ro.name as roname')
        ->first();


  return $data;

}


///////////////////////////////////////////////////////////////////////////////

}
