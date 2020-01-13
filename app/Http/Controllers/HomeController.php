<?php

namespace Sidecol\Http\Controllers;

use Illuminate\Http\Request;

use Sidecol\Http\Requests; 
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

use Caffeinated\Shinobi\Models\Role;

/*modelos*/
use Sidecol\ost;
use Sidecol\detalle_ost;
use Sidecol\evento;
use Sidecol\do_productos;
use Sidecol\organizacion;

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


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function index()
    {
        $productos =  DB::table('tbl_producto as pr')
        ->join('tbl_marca as ma','pr.marca_id','=','ma.idmarca')
        ->join('tbl_subcategoria as sc','pr.subcategoria_id','=','sc.idsubcategoria')
        ->join('tbl_categoria as ca','sc.categoria_id','=','ca.idcategoria')
        ->orderBy('idproducto','desc')
        ->paginate(6);

        // cantidad de servicios tecnicos
        $osts = DB::table('tbl_ost as os')
        ->join('tbl_detalleost as do','os.idost','=','do.ost_id')
        ->orderBy('idost','desc')
        ->paginate(6);


        // dd($osts);



        // total servicios tecnicos en estado_os critico
        $sc = DB::table('tbl_ost')
        ->where('estado_os','=',1)
        ->orwhere('estado_os','=',9)
        ->orwhere('estado_os','=',10)
        ->orwhere('estado_os','=',11)
        ->count();

        // total servicios tecnicos en estado_os por asignar
        $sp = DB::table('tbl_ost')
        ->where('estado_os','=',0)
        ->orwhere('estado_os','=',2)
        ->orwhere('estado_os','=',3)
        ->orwhere('estado_os','=',4)
        ->orwhere('estado_os','=',5)
        ->orwhere('estado_os','=',6)
        ->orwhere('estado_os','=',7)
        ->count();

        // total servicios tecnicos en estado_os completados
        $ss = DB::table('tbl_ost')
        ->where('estado_os','=',8)
        ->orwhere('estado_os','=',13)
        ->count();

        // cantidad de usuarios
        $us = DB::table('users as us')
        ->join('role_user as ru','us.id','=','ru.user_id')
        ->join('roles as ro','ru.role_id','=','ro.id')
        ->where('ro.id','=',13)
        ->count();

        // Rol del ususario
        $id_user =Auth::user()->id;
        $role = DB::table('roles as ro')
        ->join('role_user as ru','ro.id','=','ru.role_id')
        ->where('ru.user_id','=',$id_user)
        ->first();

        $eventososts =  DB::table('eventos_osts as eo')
        ->join('tbl_ost as os','eo.idost','=','os.idost')
        ->orderBy('eo.ideventososts','desc')
        ->paginate(6); 




        // dd($data);
        return view ('home',['productos'=>$productos,'osts'=>$osts,'sc'=>$sc,'sp'=>$sp,'ss'=>$ss,'us'=>$us,'role'=>$role, 'eventososts'=>$eventososts]);
    }

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function preorden(){

        $municipios = DB::table('municipios as m')
        ->join('departamentos as d','m.departamento_id','=','d.id_departamento')->get();


        $productos = DB::table('tbl_producto as p')
        ->join('tbl_marca as mc','p.marca_id','=','mc.idmarca')
        ->join('tbl_subcategoria as sc','p.subcategoria_id','=','sc.idsubcategoria')
        ->join('tbl_categoria as c','sc.categoria_id','=','c.idcategoria')
        ->get();
        
        $facturas = DB::table('tbl_compra as c')
        ->get();

        return view ("preorden",["productos"=>$productos,"municipios"=>$municipios]);
    }

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function poguardar (request $request){

// Creacion de la preorden de servicio: Desde este punto se almacena y se redirige a la vista de OST index
        
        try {

            // dd($request);

            DB::beginTransaction();

            $osts = new ost;
            $osts->observaciones=$request->get('observaciones');
            $osts->tipo_os=4;
            $osts->estado_os=0;
            $osts->save();

            if ($request){

                $detalles_osts= new detalle_ost;
                $detalles_osts->contacto=$request->get('contacto');
                $detalles_osts->email=$request->get('email');
                $detalles_osts->direccion=$request->get('direccion');
                $detalles_osts->municipio_id=$request->get('municipio_id');
                $detalles_osts->celular=$request->get('celular');
                $detalles_osts->ost_id=$osts->idost;
                $detalles_osts->save(); 

                $user=Auth::id();
                $evento = new evento();
                $evento->tipo_evento='Creacion PreOST';
                $evento->descripcion="user:".$user." osts".$osts."detalle_ost".$detalles_osts;
                $evento->estado=1;
                $evento->save();

                DB::commit();
            }

            
            return redirect('/')->with('success','PreOrden de Servicio y detalles creados con éxito');

        }catch (Exception $e){

            DB::rollback();
            return redirect('/')->with('danger','No se ha creado el servicio');
            
        }
    }

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function progreso($id){

        $id = Crypt::decrypt($id); 

        $data = DB::table('tbl_ost as o')
        ->join('tbl_detalleost as do','o.idost','=','do.ost_id')
        ->join('municipios as mu','do.municipio_id','=','mu.id_municipio')
        ->join('departamentos as de','mu.departamento_id','=','de.id_departamento')
        ->where('o.idost','=',$id)
        ->first();
        
        $estado_ost= $data->estado_os;

        switch ($estado_ost) {

            case '0': case '1':
            $estado =  1;
            break;
            case '2':
            $estado =  2;
            break;
            case '3':
            $estado =  3;
            break;
            case '4':
            $estado =  4;
            break;
            case '5':
            $estado =  5;
            break;
            case '6':
            $estado =  6;
            break;
            case '7':
            $estado =  7;
            break;
            case '8':
            $estado =  8;
            break;
            case '9': case '10': case '7':
            $estado =  5;
            break;            
            default:
            $estado =  0;
            break;
        }
        // dd($estado);

        
        return view ("progreso",["id"=>$id,"estado"=>$estado]);

    }
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
}
