@extends ('layouts.admin')
@section ('contenido')
@include('productos.marcasubcategorias.encabezado')



<section class="content">

  {!!Form::model($marcasubcategorias,['method'=>'PUT','route'=>['productos.marcasubcategorias.update',$marcasubcategorias->idmarcasubcategoria],'files'=>'true'])!!}
  {{Form::token()}}


  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Editar Asignación {{$marcasubcategorias->idmarcasubcategoria}}</h3>
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
      <div class="box-body">
        <div class="col-xs-12 col-sm-8">

          <div class="row "> 
            <div class="col-xs-12 col-sm-12">
              <div class="form-group">
                <label for="marca_id" class="col-xs-12 col-sm-3 control-label">Marca </label>
                <div class="col-sm-9">
                  <select name="marca_id" class="form-control selectpicker" data-live-search="true" data-size="6" id="marca_id" required>
                   @foreach($marcas as $marca)

                   @if ( $marca->idmarca==$marcasubcategorias->marca_id) 
                   <option value="{{$marca->idmarca}}" selected >{{$marca->idmarca}} . {{$marca->marca}}</option>

                   @endif
                   @endforeach 

                 </select>                                              
               </div> 
             </div>
           </div>
         </div>


         <div class="row row-first"> 
          <div class="col-xs-12 col-sm-12">
            <div class="form-group">
              <label for="subcategoria_id" class="col-xs-12 col-sm-3 control-label">Permiso</label>
              <div class="col-sm-9">
                <select name="subcategoria_id" class="form-control selectpicker" data-live-search="true" data-size="6" id="subcategoria_id" >
                  @foreach($subcategorias as $subcategoria)

                  @if ( $subcategoria->idsubcategoria==$marcasubcategorias->subcategoria_id) 
                  <option value="{{$subcategoria->idsubcategoria}}" selected >{{$subcategoria->idsubcategoria}} . {{$subcategoria->subcategoria}}</option>
                  @else
                  <option value="{{$subcategoria->idsubcategoria}}" >{{$subcategoria->idsubcategoria}} . {{$subcategoria->subcategoria}}</strong></option>
                  @endif

                  @endforeach               

                </select>                                              
              </div> 
            </div>
          </div>
        </div>




      </div>
    </div>


  </div>

  <div class="box-footer " id="guardar">
    <div class="row">
      <div class="col-sm-12">

        <div class="col-xs-0 col-sm-0 col-lg-3 text-center" style="padding-bottom: 5px; padding-top: 5px"></div>
        <div class="col-xs-12 col-sm-4 col-lg-2 text-center" style="padding-bottom: 5px; padding-top: 5px">

          <a href="{{route('productos.marcasubcategorias.index')}}" class="btn btn-info btn_end" id="back" >Atras</a><br>

        </div>
        <div class="col-xs-12 col-sm-4 col-lg-2 text-center" style="padding-bottom: 5px; padding-top: 5px">


         <a href="{{route('productos.marcasubcategorias.edit',$marcasubcategorias->idmarcasubcategoria)}}" class="btn btn-default btn_end" id="back" >Limpiar</a><br>

       </div>
       <div class="col-xs-12 col-sm-4 col-lg-2 text-center"  style="padding-bottom: 5px; padding-top: 5px">


        <button class="btn btn-danger btn_end" type="submit" > Guardar </button>


      </div>
      <div class="col-xs-0 col-sm-0 col-lg-3 text-center" style="padding-bottom: 5px; padding-top: 5px"></div>

    </div>

  </div>


</div>

</div>
{!!Form::close()!!}
</section>
@endsection


@section('scripts')

<script>

</script>


@endsection

