<?php

namespace Sidecol\Http\Controllers;

use Illuminate\Http\Request;

use Sidecol\Http\Requests; 
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

use Sidecol\productos_bodega;
use Sidecol\evento;

use Sidecol\Http\Requests\ProductosBodegaFormRequest;
use Sidecol\Http\Requests\EventoFormRequest;
use Response;
use Auth;

use DB;

class ProductosBodegaController extends Controller
{
	


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	public function Index(Request $request){

		$query=trim($request->get('searchText'));

		$productosbodegas =  DB::table('tbl_productobodega as pb')
		->join('tbl_producto as p','pb.producto_id','=','p.idproducto')
		->join('tbl_bodega as b','pb.bodega_id','=','b.idBodega')
		->join('tbl_marca as m','p.marca_id','=','m.idmarca')

		->select('pb.idProductoBodega','pb.cantidad','b.idBodega','b.TipoBodega','p.idproducto','p.referencia','p.articulo','m.marca')
		->where('p.referencia','LIKE','%'.$query.'%')
		->orwhere('b.TipoBodega','LIKE','%'.$query.'%')

		->orderBy('pb.idProductoBodega','desc')
		->paginate(7);

		// dd($productosbodegas);

		return view ('productos.productosbodegas.index',["productosbodegas"=>$productosbodegas,"searchText"=>$query]);
	}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function create()
	{
		$bodegas = DB::table('tbl_bodega')->get();
		$productos = DB::table('tbl_producto as p')
		->join('tbl_marca as m','p.marca_id','=','m.idmarca')
		->get();


		return view ("productos.productosbodegas.create",["productos"=>$productos,"bodegas"=>$bodegas]);
	}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	Public function store(ProductosBodegaFormRequest $request){

		$bodega_id = $request->get('bodega_id');
		$producto_id = $request->get('producto_id');
		$cantidad = $request->get('cantidad');

		// dd($request);
		

		$cont = 0;

		while ($cont < count($producto_id))

		{
			$n = $bodega_id;
			$productosbodega = new productos_bodega();
			$productosbodega->bodega_id=$bodega_id[$cont];
			$productosbodega->producto_id=$producto_id[$cont];
			$productosbodega->cantidad=$cantidad[$cont];
			// dd($request);
			$productosbodega->save();
			$cont=$cont+1;

			$user=Auth::user()->id;
			$evento = new evento();
			$evento->tipo_evento=78;
			$evento->descripcion="user:".$user." data".$productosbodega;
			$evento->estado=1;
			$evento->save();
			

		}
		return redirect()->route('productos.productosbodegas.index')->with('success','Asignación nación guardada con éxito');
	}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	public function edit ($id){

		$productosbodega=productos_bodega::findOrFail($id);
		$bodegas = DB::table('tbl_bodega')->get();
		$productos = DB::table('tbl_producto')->get();
		// dd($productos);


		return view('productos.productosbodegas.edit',["productosbodega"=>$productosbodega,"bodegas"=>$bodegas,"productos"=>$productos]);
	}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	public function update (ProductosBodegaFormRequest $request, $id){

		$productosbodega=productos_bodega::findOrFail($id);	
		$productosbodega->bodega_id=$request->get('bodega_id');
		$productosbodega->producto_id=$request->get('producto_id');
		$productosbodega->cantidad=$request->get('cantidad');
		 // dd($productosbodega);
		$productosbodega->update();

		$user=Auth::user()->id;
		$evento = new evento();
		$evento->tipo_evento=79;
		$evento->descripcion="user:".$user." data".$productosbodega;
		$evento->estado=1;
		$evento->save();

		// dd($productosbodega);

		return redirect()->route('productos.productosbodegas.index')->with('warning','Asignación editada con éxito');

	}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	public function destroy ($id){

		$productosbodega = productos_bodega::findOrFail($id);

		$user=Auth::user()->id;

		$evento = new evento();
		$evento->tipo_evento=80;
		$evento->descripcion="user:".$user." data".$productosbodega;
		$evento->estado=1;
		$evento->save();

		$productosbodega->delete();			

		return redirect()->route('productos.productosbodegas.index')->with('danger','Asignación eliminada con exito');

	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

}
