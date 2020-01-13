<?php

namespace Sidecol\Http\Controllers;

use Illuminate\Http\Request;

use Sidecol\Http\Requests; 
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

/*modelos*/
use Sidecol\rol_usuario;
use Sidecol\evento;

/*Request*/
use Sidecol\Http\Requests\RolUsuarioFormRequest;
use Sidecol\Http\Requests\EventoFormRequest;

/*Otros*/

use Carbon\Carbon;
use Response;
use Auth;
use DB;

class DemoController extends Controller
{
// ----------------------------------------------------------------------------------------------------------------------------------------------

    public function index(Request $request)
    {
        $query=trim($request->get('searchText'));
        
        //

        return view ('seguridad.roluser.index',["RolUsers"=>$RolUsers,"searchText"=>$query]);
    }
// ----------------------------------------------------------------------------------------------------------------------------------------------

    public function create()
    {
        //

        return view ("seguridad.roluser.create",["usuarios"=>$usuarios,"roles"=>$roles]);
    }
// ----------------------------------------------------------------------------------------------------------------------------------------------

    public function store(demoFormRequest $request)
    {
        //

        return redirect()->route('seguridad.roluser.index')->with('success','Asignación guardada con éxito');
    }
// ----------------------------------------------------------------------------------------------------------------------------------------------

    public function show($id)
    {
        //

        return view("clientes.sede.show", ["forms"=>$forms]); 

    }
// ----------------------------------------------------------------------------------------------------------------------------------------------

    public function edit($id)
    {
        //

        return view('seguridad.roluser.edit',["RolUsers"=>$RolUsers,"users"=>$users,"roles"=>$roles]);
    }
// ----------------------------------------------------------------------------------------------------------------------------------------------

    public function update(demoFormRequest $request,$id)
    {
        //

        return redirect()->route('seguridad.roluser.index')->with('warning','Asignación editada con éxito');
    }
// ----------------------------------------------------------------------------------------------------------------------------------------------

    public function destroy($id)
    {
        //
        return redirect()->route('seguridad.roluser.index')->with('danger','Rol eliminado con exito');
    }
// ----------------------------------------------------------------------------------------------------------------------------------------------
}
