<?php

namespace Sidecol\Http\Controllers;

use Illuminate\Http\Request;

use Sidecol\Http\Requests; 
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

use Caffeinated\Shinobi\Models\Role;
use Response;

use DB;

class RolController extends Controller
{
    /**
     * Tabla: roles
             * id
             * name
             * slug
             * description	     
             * created_at
             * updated_at
             * special
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {

    	if ($request) {

    	// $roles=Role::get()

    		$roles=DB::table('roles')
            ->orderBy('id','desc')
            ->paginate(20);


        }

        return view ('seguridad.roles.index',["roles"=>$roles]);

    }
    public function show ($id){

    	$roles=DB::table('roles as r')
    	->select('r.id','r.name','r.slug','r.description','r.created_at','r.updated_at','r.special')
    	->where('r.id','=',$id)
    	->first();

    	return view ('seguridad.roles.show',["roles"=>$roles]);


    }
    public function create(){

    	return view ('seguridad.roles.create');
    }

    public function store(Request $request){

    	// dd($request);

    	$roles = role::create($request->all()); 

    	return redirect()->route('seguridad.roles.index')->with('success','Rol guardado con exito');

    }
    public function edit($id){

    	$roles=role::findOrFail($id);

    	// dd($roles);

    	return view("seguridad.roles.edit", ["roles"=>$roles]);

    }
    public function update(Request $request, $id){

    	$roles = role::findOrFail($id);             	
    	$roles->fill($request->all())->save();   

       // dd($roles);    


    	return redirect()->route('seguridad.roles.show', ["roles"=>$roles])->with('warning','Rol actualizado con exito');
        // return view("clientes.organizacion.show", ["formorg"=>$formorg]); 

    }
    public function destroy($id){

    	$roles = role::findOrFail($id);
    	$roles->special=null;
    	$roles->update();

    	return view ('seguridad.roles.show', ["roles"=>$roles])->with('danger','Rol actualizado con exito');

    }

}
