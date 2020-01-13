<?php

namespace Sidecol\Http\Controllers;

use Illuminate\Http\Request;


use Sidecol\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use Sidecol\Http\Requests; 
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

use Sidecol\User;
use Sidecol\Http\Requests\UserFormRequest;
use Response;

use DB;

class UserController extends Controller
{

    public function index(Request $request)
    {

        if ($request) {

       // $users=User::get();
       // dd($users);
            $query=trim($request->get('searchText'));

            $users=DB::table('users as u')

            ->where('u.name','LIKE','%'.$query.'%')
            ->orwhere('u.apellidos','LIKE','%'.$query.'%')
            ->orwhere('u.documento','LIKE','%'.$query.'%')
            ->orwhere('u.email','LIKE','%'.$query.'%')

            ->select('u.id','u.name','u.apellidos','u.email','u.documento','u.created_at')
            ->orderBy('u.id','desc')

            ->paginate(6);

        }

        return view ('users.users.index',["users"=>$users,"searchText"=>$query]);

    }

    public function show($id)
    {
        //dd($id);
        $users=DB::table('users as u') 
        
        ->select('u.id','u.name','u.apellidos','u.email','u.celular','u.tipo_documento','u.documento','u.direccion','u.score','u.created_at','u.updated_at')
        ->where('u.id','=',$id) 
        ->first(); 
        //dd($users);

        return view('users.users.show', ["users"=>$users]); 
    }

    public function create()
    {
        return view ('users.users.create');
    }

    
    public function store(Request $request)
    {

        $password = $request->password;
        $cedula =  $request->documento;

        if ($pasword =! null) {

         $users = User::create($request->all());

         $password = Hash::make($users['password']);
         $users->password= $password;
         $users->update();         

     }

     return redirect()->route('users.users.index')->with('success','Usuario guardado con exito');
 }


 public function edit($id)
 {
          //dd($id);
    $users=DB::table('users as u') 

    ->select('u.id','u.name','u.apellidos','u.email','u.celular','u.tipo_documento','u.documento','u.password','u.direccion','u.score','u.created_at','u.updated_at')
    ->where('u.id','=',$id) 
    ->first(); 
        //dd($users);

    return view('users.users.edit', ["users"=>$users]); 
}


public function update(Request $request, $id)
{
    $password = $request->password;

    if ($password = null) {
        $users=User::findOrFail($id);
        $users->fill($request->all());

        return redirect()->route('users.users.show', ["users"=>$users])->with('warning','Cliente actualizado con exito');

    }
    else
    {
            //dd('hay clave');
        $users=User::findOrFail($id);
        $users->fill($request->all());
        $password = Hash::make($users['password']);
        $users->password= $password;
        $users->update();  

        
        return redirect()->route('users.users.show', ["users"=>$users])->with('warning','Cliente actualizado con exito');

    }
}
public function destroy($id)
{
    dd($id); 

    $users = User::findOrFail($id);
    $users->email='Usuario Desactivado';
    $users->password='';
    $users->score='';
    $users->update();

    return redirect()->route('users.users.show', ["formorg"=>$users])->with('darger','Cliente desactivado con exito');

}


}
