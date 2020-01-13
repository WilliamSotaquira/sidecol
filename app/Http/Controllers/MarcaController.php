<?php

namespace Sidecol\Http\Controllers;

use Illuminate\Http\Request;

use Sidecol\Http\Requests; 
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

/*modelos*/
use Sidecol\marca;
use Sidecol\evento;

/*Request*/
use Sidecol\Http\Requests\MarcaFormRequest;
use Sidecol\Http\Requests\EventoFormRequest;

/*Otros*/

use Carbon\Carbon;
use Response;
use Auth;
use DB;


class MarcaController extends Controller
{
// ----------------------------------------------------------------------------------------------------------------------------------------------

    public function index(Request $request)
    {
        $query=trim($request->get('searchText'));

        $marcas =  DB::table('tbl_marca as m')
        ->where('m.marca','LIKE','%'.$query.'%')
        ->select('m.idmarca','m.marca','m.tiempogarantia','m.image')
        ->orderBy('m.idmarca','desc')
        ->paginate(7);
        
        //

        return view ('productos.marcas.index',["marcas"=>$marcas,"searchText"=>$query]);
    }
// ----------------------------------------------------------------------------------------------------------------------------------------------

    public function create()
    {
        //

        return view ("productos.marcas.create");
    }
// ----------------------------------------------------------------------------------------------------------------------------------------------

    public function store(MarcaFormRequest $request)
    {


// dd($request);
        $marca = marca::create($request->all());

        $image = $request->file('image');

        if ($request->file('image')) {

            $path = Storage::disk('public')->put('img_marca',$request->file('image'));
            $marca->fill(['image' => asset($path)])->save();
        }

        $user=Auth::user()->id;
        $evento = new evento();
        $evento->tipo_evento=106;
        $evento->descripcion="user:".$user." data".$marca;
        $evento->estado=1;
        $evento->save();

        return redirect()->route('productos.marcas.index')->with('success','Marca guardada con éxito');
    }
// ----------------------------------------------------------------------------------------------------------------------------------------------

    public function show($id)
    {
        //Metodo sin uso

        return view("clientes.sede.show", ["forms"=>$forms]); 

    }
// ----------------------------------------------------------------------------------------------------------------------------------------------

    public function edit($id)
    {
        $marcas =  marca::findOrFail($id);                

        return view('productos.marcas.edit',["marcas"=>$marcas]);
    }
// ----------------------------------------------------------------------------------------------------------------------------------------------

    public function update(MarcaFormRequest $request,$id)
    {
        $marcas =  marca::findOrFail($id);        
        
        $marcas->fill($request->all());        

        if ($request->file('image')) {

            $path = Storage::disk('public')->put('marcas',$request->file('image'));
            $marcas->fill(['image' => asset($path)])->save();
        }

        // dd($marcas);

        $marcas->save();


        return redirect()->route('productos.marcas.index')->with('warning','Marca actualizada con exito');
    }

// ----------------------------------------------------------------------------------------------------------------------------------------------

    public function destroy($id)
    {
        $marca =marca::findOrFail($id);

        $user=Auth::user()->id;

        $evento = new evento();
        $evento->tipo_evento=85;
        $evento->descripcion="user:".$user." data".$marca;
        $evento->estado=1;
        $evento->save();

        $marca->delete();

        return redirect()->route('productos.marcas.index')->with('danger','Marca eliminada con exito');
    }
// ----------------------------------------------------------------------------------------------------------------------------------------------
}
