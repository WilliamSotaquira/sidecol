@extends ('layouts.admin')
@section ('contenido')
@include('productos.productosbodegas.encabezado')



<section class="content">

  {!!Form::model($productosbodega,['method'=>'PUT','route'=>['productos.productosbodegas.update',$productosbodega->idProductoBodega],'files'=>'true'])!!}
  {{Form::token()}}


  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Editar Asignación {{$productosbodega->idProductoBodega}}</h3>
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

          <div class="row row-first"> 
            <div class="col-xs-12 col-sm-12">
              <div class="form-group">
                <label for="bodega_id" class="col-xs-12 col-sm-3 control-label">Bodega </label>
                <div class="col-sm-9">
                  <select name="bodega_id" class="form-control selectpicker" data-live-search="true" data-size="6" id="bodega_id" required>
                   @foreach($bodegas as $bodega)

                   @if ( $bodega->idBodega==$productosbodega->bodega_id) 
                   <option value="{{$bodega->idBodega}}" selected >{{$bodega->idBodega}} . {{$bodega->TipoBodega}}</option>
                   @else
                   <option value="{{$bodega->idBodega}}" >{{$bodega->idBodega}} . {{$bodega->TipoBodega}}</option>
                   @endif
                   @endforeach 

                 </select>                                              
               </div> 
             </div>
           </div>
         </div>


         <div class="row "> 
          <div class="col-xs-12 col-sm-12">
            <div class="form-group">
              <label for="producto_id" class="col-xs-12 col-sm-3 control-label">Permiso</label>
              <div class="col-sm-9">
                <select name="producto_id" class="form-control selectpicker" data-live-search="true" data-size="6" id="producto_id" required="required" >
                  @foreach($productos as $producto)

                  @if ( $producto->idproducto==$productosbodega->producto_id) 
                  <option value="{{$producto->idproducto}}" selected >{{$producto->idproducto}} . {{$producto->referencia}}</option>
                  @else
                  <option value="{{$producto->idproducto}}" >{{$producto->idproducto}} . {{$producto->referencia}}</option>
                  @endif

                  @endforeach               

                </select>                                              
              </div> 
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-xs-12 col-sm-12">
            <div class="form-group ">
              <label for="cantidad" class="col-xs-12 col-sm-3">Cantidad</label>
              <div class="col-sm-5">
                <input type="number" id="cantidad" name="cantidad" class="form-control" placeholder="Escriba..." value="{{$productosbodega->cantidad}}" required>
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

          <a href="{{route('productos.productosbodegas.index')}}" class="btn btn-info btn_end" id="back" >Atras</a><br>

        </div>
        <div class="col-xs-12 col-sm-4 col-lg-2 text-center" style="padding-bottom: 5px; padding-top: 5px">


         <a href="{{route('productos.productosbodegas.edit',$productosbodega->idProductoBodega)}}" class="btn btn-default btn_end" id="back" >Limpiar</a><br>

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

