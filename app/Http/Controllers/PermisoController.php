<?php

namespace Sidecol\Http\Controllers;

use Illuminate\Http\Request;

use Sidecol\Http\Requests; 
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

use Caffeinated\Shinobi\Models\Permission;
use Response;

use DB;

class PermisoController extends Controller
{

	/**
     * Tabla: permissions
             * id
             * name
             * slug
             * description	     
             * created_at
             * updated_at
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request){

    	if ($request) {

    	$query=trim($request->get('searchText'));

    	$permisos=DB::table('permissions as p')
    	->where('p.name','LIKE','%'.$query.'%')
    	->orwhere('p.description','LIKE','%'.$query.'%')
    	

    	->select('p.id','p.name','p.slug','p.description','p.created_at','p.updated_at')
    	->orderBy('p.id','desc')
    	->paginate(7);


    	}

    	return view ('seguridad.permisos.index',["permisos"=>$permisos,"searchText"=>$query]);
    }

      public function show ($id){

    	$permisos=DB::table('permissions as p')
    	->select('p.id','p.name','p.slug','p.description','p.created_at','p.updated_at')
    	->where('p.id','=',$id)
    	->first();

    	return view ('seguridad.permisos.show',["permisos"=>$permisos]);
    }

    public function create (){

    	return view ('seguridad.permisos.create');
    }

    public function store(Request $request){

    	// dd($request);

    	$permisos = Permission::create($request->all()); 

    	return redirect()->route('seguridad.permisos.index')->with('success','Permiso guardado con éxito');

    }

    public function edit ($id){

    	$permisos=Permission::findOrFail($id);

    	 // dd($permisos);

    	return view("seguridad.permisos.edit", ["permisos"=>$permisos]);
    }
    public function update(Request $request, $id){

    	$permisos = Permission::findOrFail($id);             	
    	$permisos->fill($request->all())->save();   

       //dd($permisos);    


    	return redirect()->route('seguridad.permisos.show', ["permisos"=>$permisos])->with('warning','Permiso actualizado con éxito');

    }
     public function destroy($id){

    	$permisos = Permission::findOrFail($id);
    	$permisos->slug='Desactivado';
    	$permisos->update();

    	return view ('seguridad.permisos.show', ["permisos"=>$permisos])->with('danger','Rol Desactivado con éxito');

    }

}
