<?php

namespace Sidecol\Http\Controllers;

use Illuminate\Http\Request;

use Sidecol\Http\Requests; 
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

/*modelos*/
use Sidecol\marca_subcategoria;
use Sidecol\evento;

/*Request*/
use Sidecol\Http\Requests\MarcasubcategoriaFormRequest;
use Sidecol\Http\Requests\EventoFormRequest;

/*Otros*/

use Carbon\Carbon;
use Response;
use Auth;
use DB;

class MarcaSubcategoriaController extends Controller
{
    
// ----------------------------------------------------------------------------------------------------------------------------------------------

	public function index(Request $request)
	{
		$query=trim($request->get('searchText'));

		$marcasubcategorias = DB::table('tbl_marcasubcategoria as ms')
		->join('tbl_marca as m','ms.marca_id','=','m.idmarca')
		->join('tbl_subcategoria as s','ms.subcategoria_id','=','s.idsubcategoria')
		->select('ms.idmarcasubcategoria','m.idmarca','m.marca','s.idsubcategoria','s.subcategoria')
		->where('m.marca','LIKE','%'.$query.'%')
		->orwhere('s.subcategoria','LIKE','%'.$query.'%')
		
		->orderBy('ms.idmarcasubcategoria','desc')
		->paginate(7); 

		// dd($marcasubcategorias);

		return view ('productos.marcasubcategorias.index',["marcasubcategorias"=>$marcasubcategorias,"searchText"=>$query]);
	}
// ----------------------------------------------------------------------------------------------------------------------------------------------

	public function create()
	{
		$marcas = DB::table('tbl_marca')->get();
		$subcategorias = DB::table('tbl_subcategoria')->get();
        //

		return view ("productos.marcasubcategorias.create",["marcas"=>$marcas,"subcategorias"=>$subcategorias]);
	}
// ----------------------------------------------------------------------------------------------------------------------------------------------

	public function store(MarcasubcategoriaFormRequest $request)
	{
		$marca_id = $request->get('marca_id');
		$subcategoria_id = $request->get('subcategoria_id');

		// dd($marca_id);
		

		$cont = 0;

		while ($cont < count($subcategoria_id))

		{
			
			$marcasubcategorias = new marca_subcategoria();
			$marcasubcategorias->marca_id=$marca_id[$cont];
			$marcasubcategorias->subcategoria_id=$subcategoria_id[$cont];
			// dd($request);
			$marcasubcategorias->save();
			$cont=$cont+1;

			// $user=Auth::user()->id;
			// $evento = new evento();
			// $evento->tipo_evento=83;
			// $evento->descripcion="user:".$user." data".$marcasubcategorias;
			// $evento->estado=1;
			// $evento->save();
			

		}

		return redirect()->route('productos.marcasubcategorias.index')->with('success','Asignación guardada con éxito');
	}
// ----------------------------------------------------------------------------------------------------------------------------------------------

	public function show($id)
	{
        //

		// return view("clientes.sede.show", ["forms"=>$forms]); 

	}
// ----------------------------------------------------------------------------------------------------------------------------------------------

	public function edit($id)
	{
		$marcasubcategorias=marca_subcategoria::findOrFail($id);
		$marcas = DB::table('tbl_marca')->get();
		$subcategorias = DB::table('tbl_subcategoria')->get();

		return view('productos.marcasubcategorias.edit',["marcasubcategorias"=>$marcasubcategorias,"marcas"=>$marcas,"subcategorias"=>$subcategorias]);
	}
// ----------------------------------------------------------------------------------------------------------------------------------------------

	public function update(MarcasubcategoriaFormRequest $request,$id)
	{
		$marcasubcategorias=marca_subcategoria::findOrFail($id);	
		$marcasubcategorias->marca_id=$request->get('marca_id');
		$marcasubcategorias->subcategoria_id=$request->get('subcategoria_id');
		 // dd($marcasubcategorias);
		$marcasubcategorias->update();

		$user=Auth::user()->id;
		$evento = new evento();
		$evento->tipo_evento=84;
		$evento->descripcion="user:".$user." data".$marcasubcategorias;
		$evento->estado=1;
		$evento->save();

		// dd($marcasubcategorias);

		return redirect()->route('productos.marcasubcategorias.index')->with('warning','Asignación editada con éxito');
	}
// ----------------------------------------------------------------------------------------------------------------------------------------------

	public function destroy($id)
	{
		$marcasubcategorias=marca_subcategoria::findOrFail($id);

		$c = $marcasubcategorias->role_id;
	

		if($c === 1 || $c === 2 )
		{

			return redirect()->route('productos.marcasubcategorias.index')->with('danger','No se puede eliminar la asignación debido a que este usuario tiene privilegios...');			

		}else{

			$marcasubcategorias =marca_subcategoria::findOrFail($id);

			$user=Auth::user()->id;

			$evento = new evento();
			$evento->tipo_evento=85;
			$evento->descripcion="user:".$user." data".$marcasubcategorias;
			$evento->estado=1;
			$evento->save();

			$marcasubcategorias->delete();
			
			return redirect()->route('productos.marcasubcategorias.index')->with('danger','Asignación eliminada con éxito');
		}
       
	}
// ----------------------------------------------------------------------------------------------------------------------------------------------

}
