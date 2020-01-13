<?php

namespace Sidecol\Http\Controllers;

use Illuminate\Http\Request;

use Sidecol\Http\Requests; 
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

/*modelos*/
use Sidecol\bodega;
use Sidecol\evento;

/*Request*/
use Sidecol\Http\Requests\BodegaFormRequest;
use Sidecol\Http\Requests\EventoFormRequest;

/*Otros*/

use Carbon\Carbon;
use Response;
use Auth;
use DB;


class BodegaController extends Controller
{ 

// ----------------------------------------------------------------------------------------------------------------------------------------------

	public function index(Request $request)
	{
		$query=trim($request->get('searchText'));

		$bodegas= DB::table('tbl_bodega')
		->where('TipoBodega','LIKE','%'.$query.'%')
		->orwhere('Descripcion','LIKE','%'.$query.'%')
		->orwhere('Estado','LIKE','%'.$query.'%')

		->select('idBodega','TipoBodega','Descripcion','Estado','created_at','updated_at')
		->orderBy('idBodega','desc')
		->paginate(7);

		return view ("productos.bodegas.index",["bodegas"=>$bodegas,"searchText"=>$query]);
	}
// ----------------------------------------------------------------------------------------------------------------------------------------------

	public function create()
	{
		return view ("productos.bodegas.create");
	}
// ----------------------------------------------------------------------------------------------------------------------------------------------

	public function store(BodegaFormRequest $request)
	{
		// dd($request);

		$bodega = bodega::create($request->all()); 

		return redirect()->route('productos.bodegas.index')->with('success','Bodega creada con éxito');
	}
// ----------------------------------------------------------------------------------------------------------------------------------------------

	public function show($id)
	{
        //

		return view("clientes.sede.show", ["bodegas"=>$bodegas]); 

	}
// ----------------------------------------------------------------------------------------------------------------------------------------------

	public function edit($id)
	{
		$bodegas=bodega::findOrFail($id);

        // dd($bodegas);

		return view('productos.bodegas.edit',["bodegas"=>$bodegas]);
	}
// ----------------------------------------------------------------------------------------------------------------------------------------------

	public function update(BodegaFormRequest $request,$id)
	{
		$bodegas = bodega::findOrFail($id); 

		$bodegas->fill($request->all())->save();   

		return redirect()->route('productos.bodegas.index')->with('warning','Asignación editada con éxito');
	}
// ----------------------------------------------------------------------------------------------------------------------------------------------

	public function destroy($id)
	{

		$bodegas = bodega::findOrFail($id);
		$bodegas->Estado='2';
		$bodegas->update();

		return redirect()->route('productos.bodegas.index')->with('danger','Bodega eliminada con exito');
	}
// ----------------------------------------------------------------------------------------------------------------------------------------------

}
