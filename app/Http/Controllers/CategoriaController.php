<?php

namespace Sidecol\Http\Controllers;

use Illuminate\Http\Request;

use Sidecol\Http\Requests; 
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

/*modelos*/
use Sidecol\categoria;
use Sidecol\evento;

/*Request*/
use Sidecol\Http\Requests\CategoriaFormRequest;
use Sidecol\Http\Requests\EventoFormRequest;

/*Otros*/

use Carbon\Carbon;
use Response;
use Auth;
use DB;

class CategoriaController extends Controller
{
   // ----------------------------------------------------------------------------------------------------------------------------------------------

	public function index(Request $request)
	{
		$query=trim($request->get('searchText'));

		$categorias = DB::table('tbl_categoria as c')
		->where('c.categoria','LIKE','%'.$query.'%')

		->select('c.idcategoria','c.categoria','c.estado','c.created_at','c.updated_at')

		->orderBy('c.idcategoria','desc')
		->paginate(7); 

		// dd($categorias);

		return view ('productos.categorias.index',["categorias"=>$categorias,"searchText"=>$query]);
	}
// ----------------------------------------------------------------------------------------------------------------------------------------------

	public function create()
	{

		return view ("productos.categorias.create");
	}
// ----------------------------------------------------------------------------------------------------------------------------------------------

	public function store(CategoriaFormRequest $request)
	{
        // dd($request);

		$categorias = categoria::create($request->all()); 


		return redirect()->route('productos.categorias.index')->with('success','Categoría guardada con éxito');
	}
// ----------------------------------------------------------------------------------------------------------------------------------------------

	public function show($id)
	{
        //metodo sin funcionamiento

		return view("clientes.sede.show", ["forms"=>$forms]); 

	}
// ----------------------------------------------------------------------------------------------------------------------------------------------

	public function edit($id)
	{
        $categorias=categoria::findOrFail($id);

        // dd($categorias);

		return view('productos.categorias.edit',["categorias"=>$categorias]);
	}
// ----------------------------------------------------------------------------------------------------------------------------------------------

	public function update(CategoriaFormRequest $request,$id)
	{
        $categorias = categoria::findOrFail($id); 
		$categorias->fill($request->all())->save();  

		return redirect()->route('productos.categorias.index')->with('warning','Categoría editada con éxito');
	}
// ----------------------------------------------------------------------------------------------------------------------------------------------

	public function destroy($id)
	{
        $categorias = categoria::findOrFail($id);
		$categorias->estado='2';
		$categorias->update();
		
		return redirect()->route('productos.categorias.index')->with('danger','Categoría eliminada con exito');
	}
// ----------------------------------------------------------------------------------------------------------------------------------------------
}
