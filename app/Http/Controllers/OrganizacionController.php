<?php

namespace Sidecol\Http\Controllers;    

use Illuminate\Http\Request;

use Sidecol\Http\Requests; 
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Sidecol\Http\Requests\OrganizacionFormRequest;
use Sidecol\Http\Requests\EventoFormRequest;


use Sidecol\organizacion;
use Sidecol\evento;
use DB;
use Response;



class OrganizacionController extends Controller
{
    /**
     * Tabla: tbl_organizacion

             * idtbl_organizacion
             * nit
             * razonsocial
             * image     
             * margen
             * estado
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request)
        {
            $query=trim($request->get('searchText'));

            $org=DB::table('tbl_organizacion as org')
            
            ->where('org.nit','LIKE','%'.$query.'%')
            ->orwhere('org.razonsocial','LIKE','%'.$query.'%')

            ->select('org.idtbl_organizacion','org.nit','org.razonsocial','org.image','org.margen','org.estado')
            ->orderBy('org.idtbl_organizacion','desc')
            ->paginate(7);


        }

        return view ('clientes.organizacion.index',["organizacion"=>$org,"searchText"=>$query]) ;
    }

    public function show($id)
    {
        // dd($id);
        $formorg=DB::table('tbl_organizacion as org') 
        
        ->select('org.idtbl_organizacion','org.nit','org.razonsocial','org.image','org.margen','org.estado') 
        ->where('org.idtbl_organizacion','=',$id) 
        ->first(); 
        //dd($formorg);

        return view("clientes.organizacion.show", ["formorg"=>$formorg]); 
    }

    
    public function create()
    {


        return view ("clientes.organizacion.create");
    }



    public function store(OrganizacionFormRequest $request)
    {       

        $organizacion = organizacion::create($request->all());
        $image = $request->file('image');


        if ($request->file('image')) {
            $path = Storage::disk('public')->put('organizaciones',$request->file('image'));
            $organizacion->fill(['image' => asset($path)])->save();
        }



        $evento= new evento;
        $evento->tipo_evento="1";
        $evento->descripcion="Creacion de Organizacion";
        $evento->save(); 



        return redirect()->route('clientes.organizacion.index')->with('success','Cliente creado con exito');

    }   
    

    public function edit($id)
    {
        $formorg=DB::table('tbl_organizacion as org')         
        ->select('org.idtbl_organizacion','org.nit','org.razonsocial','org.image','org.margen','org.estado') 
        ->where('org.idtbl_organizacion','=',$id) 

        ->first(); 

        // $d=organizacion::findOrFail($id);
          //dd($formorg->image);


        // return view("clientes.organizacion.edit", ["formorg"=>$formorg]);  
        return view("clientes.organizacion.edit",["formorg"=>$formorg]);
    }


    public function update(OrganizacionFormRequest $request, $id)
    {
        $organizacion =  organizacion::findOrFail($id);        
        
        $organizacion->fill($request->all());        

        if ($request->file('image')) {

            $path = Storage::disk('public')->put('organizacion',$request->file('image'));
            $organizacion->fill(['image' => asset($path)])->save();
        }

        // dd($organizacion);

        $organizacion->save();


        return redirect()->route('clientes.organizacion.show', ["formorg"=>$organizacion])->with('warning','Cliente actualizado con exito');
        // return view("clientes.organizacion.show", ["formorg"=>$formorg]); 

    }
    

    public function destroy($id)
    {
        // dd($id);
        $organizacion = organizacion::findOrFail($id);
        $organizacion->estado='2';
        $organizacion->update();

        return redirect()->route('clientes.organizacion.show', ["formorg"=>$organizacion])->with('danger','Cliente desactivado con exito');

    }

}
