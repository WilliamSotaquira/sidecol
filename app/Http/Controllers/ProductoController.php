<?php

namespace Sidecol\Http\Controllers;

use Illuminate\Http\Request;

use Sidecol\Http\Requests; 
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

/*modelos*/
use Sidecol\producto;
use Sidecol\evento;

/*Request*/
use Sidecol\Http\Requests\ProductoFormRequest;
use Sidecol\Http\Requests\EventoFormRequest;

/*Otros*/

use Carbon\Carbon;
use Response;
use Auth;
use DB;

class ProductoController extends Controller
{

// ----------------------------------------------------------------------------------------------------------------------------------------------

	public function index(Request $request)
	{
		$query=trim($request->get('searchText'));
		$productos = DB::table('tbl_producto as pr')

		->join('tbl_marca as ma','pr.marca_id','=','ma.idmarca')
		->join('tbl_subcategoria as sc','pr.subcategoria_id','=','sc.idsubcategoria')	
		->join('tbl_categoria as ca','sc.categoria_id','=','ca.idcategoria')	
		
		->where('pr.referencia','LIKE','%'.$query.'%')
		->orwhere('ma.marca','LIKE','%'.$query.'%')
		->orwhere('sc.subcategoria','LIKE','%'.$query.'%')
		->orwhere('ca.categoria','LIKE','%'.$query.'%')

		->orderBy('pr.idproducto','desc')
		->paginate(20);

		 // dd($productos);

        //

		return view ('productos.productos.index',["productos"=>$productos,"searchText"=>$query]);
	}
// ----------------------------------------------------------------------------------------------------------------------------------------------

	public function create()
	{
		$subcategorias = DB::table('tbl_subcategoria as sc')
		->join('tbl_categoria as c','sc.categoria_id','=','c.idcategoria')
		->select('sc.idsubcategoria','sc.subcategoria','c.idcategoria','c.categoria')
		->get();
		
		$marcas = DB::table('tbl_marca')->get();

		// dd($subcategorias);	

		return view ("productos.productos.create",["subcategorias"=>$subcategorias,"marcas"=>$marcas]);
	}
// ----------------------------------------------------------------------------------------------------------------------------------------------

	public function store(ProductoFormRequest $request)
	{
		// dd($request);
		$producto = producto::create($request->all());

		$user=Auth::user()->id;
		$evento = new evento();
		$evento->tipo_evento=106;
		$evento->descripcion="user:".$user." data".$producto;
		$evento->estado=1;
		$evento->save();

		return redirect()->route('productos.productos.index')->with('success','Asignación guardada con éxito');
	}
// ----------------------------------------------------------------------------------------------------------------------------------------------

	public function show($id)
	{
        //

		return view("productos.productos.show", ["forms"=>$forms]); 

	}
// ----------------------------------------------------------------------------------------------------------------------------------------------

	public function edit($id)
	{
		$productos=producto::findOrFail($id);
		$marcas = DB::table('tbl_marca')->get();
		
		$subcategorias = DB::table('tbl_subcategoria as sc')
		->join('tbl_categoria as c','sc.categoria_id','=','c.idcategoria')
		->get();
		

		// dd($marcas);



		return view('productos.productos.edit',["productos"=>$productos,"marcas"=>$marcas,"subcategorias"=>$subcategorias]);
	}
// ----------------------------------------------------------------------------------------------------------------------------------------------

	public function update(ProductoFormRequest $request,$id)
	{
		$productos = producto::findOrFail($id);             	
		$productos->fill($request->all())->save();   

		return redirect()->route('productos.productos.index')->with('warning','Producto editado con éxito');
	}
// ----------------------------------------------------------------------------------------------------------------------------------------------

	public function destroy($id)
	{
		$producto = producto::findOrFail($id);
		$producto->estado='2';
		$producto->update();

		return redirect()->route('productos.productos.index')->with('danger','Rol eliminado con exito');
	}
// ----------------------------------------------------------------------------------------------------------------------------------------------
}
