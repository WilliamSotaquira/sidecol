<?php

namespace Sidecol\Http\Controllers;

use Illuminate\Http\Request;

use Sidecol\Http\Requests; 
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Sidecol\Http\Requests\SedeFormRequest;


use Sidecol\sede;
use DB;

class SedeController extends Controller
{

    /**
    protected $table='tbl_sede';
    protected $primaryKey='idtbl_sede';
    public $timestamps=false;

        // idtbl_sede
        // nombresede
        // email
        // direccion
        // telefono
        // estado
        // fk_organizacion
        // fk_ciudad

     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

    	if ($request)
    	{
    		$query=trim($request->get('searchText'));

    		$sede=DB::table('tbl_sede as sede')
        ->join('municipios as c','sede.fk_ciudad','=','c.id_municipio') 
        ->join('tbl_organizacion as o','sede.fk_organizacion','=','o.idtbl_organizacion')

        ->select('sede.idtbl_sede','sede.nombresede', 'sede.email', 'sede.direccion', 'sede.telefono', 'sede.estado','c.municipio','o.razonsocial')
        ->where('sede.nombresede','LIKE','%'.$query.'%')
        ->orwhere('sede.email','LIKE','%'.$query.'%')
        ->orwhere('o.razonsocial','LIKE','%'.$query.'%')
        ->orwhere('c.municipio','LIKE','%'.$query.'%')
        ->orderBy('sede.idtbl_sede','desc')
        ->paginate(7);
        
      }
      

      return view ('clientes.sede.index',["sede"=>$sede,"searchText"=>$query]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $ciudad=DB::table('municipios as c')
      ->join('departamentos as d','c.departamento_id','=','d.id_departamento')
      ->select('c.id_municipio','c.municipio','d.id_departamento','d.departamento')
      ->get();
      $org=DB::table('tbl_organizacion')->get();


      

      return view ("clientes.sede.create",["ciudad"=>$ciudad,"org"=>$org]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function show($id)
    {
        // dd($id);
    	$forms=DB::table('tbl_sede as s') 
      ->join('tbl_organizacion as o','s.fk_organizacion','=','o.idtbl_organizacion')
      ->join('municipios as c','s.fk_ciudad','=','c.id_municipio')
      ->join('departamentos as d','c.departamento_id','=','d.id_departamento')

      ->select('s.idtbl_sede','s.nombresede','s.email','s.direccion','s.telefono','s.estado','o.nit','o.razonsocial','c.id_municipio','c.municipio','d.id_departamento','d.departamento') 
      ->where('s.idtbl_sede','=',$id) 
      ->first(); 
        // dd($forms);

      return view("clientes.sede.show", ["forms"=>$forms]); 

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Sidecol\organizacion  $organizacion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    	$forms=sede::findOrFail($id);
      // dd($forms);

      $ciudad=DB::table('municipios as c')
      ->join('departamentos as d','c.departamento_id','=','d.id_departamento')
      ->select('c.id_municipio','c.municipio','d.id_departamento','d.departamento')
      ->get();

      $org=DB::table('tbl_organizacion')->get(); 
        // dd($forms);

      return view("clientes.sede.edit", ["forms"=>$forms,"org"=>$org,"ciudad"=>$ciudad]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Sidecol\organizacion  $organizacion
     * @return \Illuminate\Http\Response
     */
    public function update(SedeFormRequest $request, $id)
    {
    	
      $sede =  sede::findOrFail($id);             	
    	$sede->fill($request->all())->save();   

      // dd($sede);    


    	return redirect()->route('clientes.sede.show', ["forms"=>$sede])->with('warning','Cliente actualizado con exito');
        // return view("clientes.organizacion.show", ["formorg"=>$formorg]); 

    }
    public function store(SedeFormRequest $request)
    {     

      // dd($request);  

      $sede = sede::create($request->all()); 



      return redirect()->route('clientes.sede.index')->with('success','Sede guardada con exito');

    }    

    public function destroy($id)
    {
      // dd($id);
    	$sede = sede::findOrFail($id);
    	$sede->estado='3';
    	$sede->update();

    	return redirect()->route('clientes.sede.show', ["formorg"=>$sede])->with('danger','Cliente desactivado con exito');

    }
    
  }
