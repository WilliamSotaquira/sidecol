@extends ('layouts.admin')
@section ('contenido')
@include('productos.subcategorias.encabezado')



<section class="content">

  {!!Form::open(array('url'=>'productos/subcategorias/store','method'=>'POST','autocomplete'=>'off', 'files'=> true))!!}
  {{ csrf_field() }}

  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Agregar Nuevo Registro</h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse">
          <i class="fa fa-minus"></i>
        </button>
      </div>
    </div>

    @if (count($errors)>0)
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>
          {{$error}}
        </li>
        @endforeach
      </ul>
    </div>
    @endif    




    <div class="container-fluid">

      <div class="alert alert-info alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-ban"></i> ¡Informacion!</h4>
        Recuerde que para crear una nueva Asigancion Subcategoria es necesario que ya exista su respectiva Categoria...
      </div>


      <div class="box-body">
        <div class="col-xs-12 col-sm-8">



         <div class="row row-first"> 
          <div class="col-xs-12 col-sm-12">
            <div class="form-group">
              <label for="categoria_id" class="col-xs-12 col-sm-2 control-label">Categoría</label>
              <div class="col-sm-10">
               <select name="categoria_id" class="form-control selectpicker" data-size="6" data-live-search="true" id="categoria_id" value="{{old('categoria_id')}}" required>
                <option selected ="true">Seleccione &hellip;</option> 
                @foreach($categorias as $sc) 
                <option value="{{$sc->idcategoria}}">{{$sc->idcategoria}} - {{$sc->categoria}}</option>
                @endforeach

              </select>
            </div>
          </div>
        </div>
      </div>

         <div class="row ">
          <div class="col-xs-12 col-sm-12">
            <div class="form-group">
              <label for="subcategoria" class="col-xs-12 col-sm-2 control-label">Nombre Subcategoria</label>
              <div class="col-sm-10">
               <input type="text" class="form-control" name="subcategoria" id="subcategoria" value="{{old('subcategoria')}}" required >
             </div> 
           </div> 
         </div> 
       </div>




    <div class="row">
      <div class="col-xs-12 col-sm-12">
        <div class="form-group">
          <label for="estado" class="col-xs-12 col-sm-2 control-label">Estado</label>
          <div class="col-sm-10">
           <select name="estado" class="form-control selectpicker" data-live-search="true" id="estado" value="{{old('estado')}}" required>
            <option selected ="true">Seleccione &hellip;</option>  
            <option value="0">Activo</option>
            <option value="1">Deshabilitado</option>


          </select>
        </div>
      </div>
    </div>
  </div>


</div>
</div>


</div> 
<div class="box-footer " id="guardar">
  <div class="container-fluid">
    <div class="row-bottons">
      <div class="col-sm-12">
        <div class="col-xs-0 col-sm-0 col-lg-3 text-center" style="padding-bottom: 5px; padding-top: 5px"></div>
        <div class="col-xs-12 col-sm-4 col-lg-2 text-center" style="padding-bottom: 5px; padding-top: 5px">

          <button class="btn btn-primary btn_end" type="submit" > Guardar </button>

        </div>
        <div class="col-xs-12 col-sm-4 col-lg-2 text-center" style="padding-bottom: 5px; padding-top: 5px">

          <a class="btn btn-danger btn_end" type="reset" id="limpiar">Limpiar</a>

        </div>
        <div class="col-xs-12 col-sm-4 col-lg-2 text-center"  style="padding-bottom: 5px; padding-top: 5px">

          <a href="{{route('productos.subcategorias.index')}}" class="btn btn-info btn_end" id="back" >Atras</a><br>

        </div>
        <div class="col-xs-0 col-sm-0 col-lg-3 text-center" style="padding-bottom: 5px; padding-top: 5px"></div>

      </div>      
    </div>
  </div>

</div>

</div>

{!!Form::close()!!}
</section>


@endsection



