<?php

namespace Sidecol\Http\Controllers;

use Illuminate\Http\Request;

use Sidecol\Http\Requests; 
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

/*modelos*/
use Sidecol\subcategoria;
use Sidecol\evento;

/*Request*/
use Sidecol\Http\Requests\SubcategoriaFormRequest;
use Sidecol\Http\Requests\EventoFormRequest;

/*Otros*/

use Carbon\Carbon;
use Response;
use Auth;
use DB; 

// idsubcategoria	subcategoria	estado	categoria_id	created_at	updated_at

class SubcategoriaController extends Controller
{

// ----------------------------------------------------------------------------------------------------------------------------------------------

	public function index(Request $request)
	{


		$query=trim($request->get('searchText'));

		$subcategorias = DB::table('tbl_SubCategoria as sc')
		->join('tbl_Categoria as c','sc.categoria_id','=','c.idcategoria')

		->select('sc.idsubcategoria','sc.subcategoria','sc.estado','sc.created_at','sc.updated_at','c.idcategoria','c.categoria')

		->where('sc.subcategoria','LIKE','%'.$query.'%')
		->where('c.categoria','LIKE','%'.$query.'%')

		->orderBy('sc.idsubcategoria','desc')
		->paginate(7);

		



		return view ('productos.subcategorias.index',["subcategorias"=>$subcategorias,"searchText"=>$query]);
	}
// ----------------------------------------------------------------------------------------------------------------------------------------------

	public function create()
	{
        $categorias = DB::table('tbl_Categoria')->get();

		return view ("productos.subcategorias.create",["categorias"=>$categorias]);
	}
// ----------------------------------------------------------------------------------------------------------------------------------------------

	public function store(SubcategoriaFormRequest $request)
	{
        $subcategorias = subcategoria::create($request->all()); 

		return redirect()->route('productos.subcategorias.index')->with('success','SubCategoria asignada y guardada con éxito');
	}
// ----------------------------------------------------------------------------------------------------------------------------------------------

	public function show($id)
	{
        //No disponible en este modelo

		return view("productos.subcategorias.index.show", ["forms"=>$forms]); 

	}
// ----------------------------------------------------------------------------------------------------------------------------------------------

	public function edit($id)
	{
        $subcategorias=subcategoria::findOrFail($id);

        $categorias=DB::table('tbl_Categoria')->get(); 


		return view('productos.subcategorias.edit',["subcategorias"=>$subcategorias,"categorias"=>$categorias]);
	}
// ----------------------------------------------------------------------------------------------------------------------------------------------

	public function update(SubcategoriaFormRequest $request,$id)
	{
        $subcategoria =  subcategoria::findOrFail($id);             	
    	$subcategoria->fill($request->all())->save();   


		return redirect()->route('productos.subcategorias.index')->with('warning','Asignación editada con éxito');
	}
// ----------------------------------------------------------------------------------------------------------------------------------------------

	public function destroy($id)
	{
        $subcategoria = subcategoria::findOrFail($id);
    	$subcategoria->estado='2';
    	$subcategoria->update();

		return redirect()->route('productos.subcategorias.index')->with('danger','Rol eliminado con exito');
	}
// ----------------------------------------------------------------------------------------------------------------------------------------------
}
