@extends ('layouts.admin')
@section ('contenido')
@include('productos.productos.encabezado')



<section class="content">

  {!!Form::model($productos,['method'=>'PUT','route'=>['productos.productos.update',$productos->idproducto],'files'=>'true'])!!}
  {{Form::token()}}


  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Editar Registro</h3>
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


          <div class="row row-first" >
            <div class="col-xs-12 col-sm-12">
              <div class="form-group ">
                <label for="referencia" class="col-xs-12 col-sm-3">Referencia</label>
                <div class="col-sm-9">
                  <input type="text" id="referencia" name="referencia" class="form-control" placeholder="Escriba..." value="{{$productos->referencia}}" autofocus="autofocus" required>
                </div>            
              </div>            
            </div>            
          </div>  

          <div class="row">
            <div class="col-xs-12 col-sm-12">
             <div class="form-group">
              <label for="marca_id" class="col-xs-12 col-sm-3" >Marca</label>
              <div class="col-sm-9">
                <select id="marca_id" name="marca_id" class="form-control selectpicker" data-live-search="true" id="marca_id" autofocus="autofocus" required>

                  @foreach($marcas as $marca)
                  @if ( $marca->idmarca==$productos->marca_id) 
                  <option value="{{$marca->idmarca}}" selected >{{$marca->idmarca}} . {{$marca->marca}}</option>
                  @else
                  <option value="{{$marca->idmarca}}">{{$marca->idmarca}} - {{$marca->marca}}</option>
                  @endif
                  @endforeach

                </select>                                              
              </div>          
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-xs-12 col-sm-12">
           <div class="form-group">
            <label for="subcategoria_id" class="col-xs-12 col-sm-3" >Sub & Categoría</label>
            <div class="col-sm-9">
              <select id="subcategoria_id" name="subcategoria_id" class="form-control selectpicker" data-live-search="true" id="subcategoria_id" required>

                @foreach($subcategorias as $subcategoria)
                @if ( $subcategoria->idsubcategoria==$productos->subcategoria_id) 
                <option value="{{$subcategoria->idsubcategoria}}" selected >{{$subcategoria->idsubcategoria}} . {{$subcategoria->subcategoria}} - {{$subcategoria->categoria}}</option>
                @else
                <option value="{{$subcategoria->idsubcategoria}}">{{$subcategoria->idsubcategoria}} - {{$subcategoria->subcategoria}} - {{$subcategoria->categoria}}</option>
                @endif
                @endforeach


              </select>                                              
            </div>          
          </div>
        </div>
      </div>          

      <div class="row" >
        <div class="col-xs-12 col-sm-12">
          <div class="form-group ">
            <label for="articulo" class="col-xs-12 col-sm-3">Descripción</label>
            <div class="col-sm-9">
              <input type="text" id="articulo" name="articulo" class="form-control" placeholder="Escriba..." value="{{$productos->articulo}}" required>
            </div>            
          </div>            
        </div>            
      </div>            

        <div class="row "> 
          <div class="col-xs-12 col-sm-12">
            <div class="form-group">
              <label for="estado" class="col-xs-12 col-sm-3 control-label">Estado</label>
              <div class="col-sm-9">
                <select name="estado" class="form-control selectpicker" data-live-search="true" data-size="6" id="estado" required>
                  <option selected disabled="true">Seleccione &hellip;</option>                  
                  @if ($productos->estado===0)  
                  <option value="0" selected>Deshabilitado</option>
                  <option value="1" >Activo</option>

                  @elseif($productos->estado===1) 
                  <option value="0">Deshabilitado</option>
                  <option value="1" selected >Activo</option>

                  @elseif($productos->estado===2) 
                  <option value="0" >Deshabilitado</option>        
                  <option value="1" >Activo</option>
                  <option value="2" selected>Eliminado</option>        
                  @endif                  
                </select>                                              
              </div> 
            </div>
          </div>
        </div>

    <div class="row" >
      <div class="col-xs-12 col-sm-12">
        <div class="form-group ">
          <label for="costoventa" class="col-xs-12 col-sm-3">Precio (PVP)</label>
          <div class="col-sm-9">
            <input type="number" id="costoventa" name="costoventa" class="form-control" placeholder="Escriba..." value="{{$productos->costoventa}}" >
          </div>            
        </div>            
      </div>            
    </div>            

    <div class="row" >
      <div class="col-xs-12 col-sm-12">
        <div class="form-group ">
          <label for="costoanterior" class="col-xs-12 col-sm-3">Ultimo PVP</label>
          <div class="col-sm-9">
            <input type="number" id="costoanterior" name="costoanterior" class="form-control" placeholder="Escriba..." value="{{$productos->costoanterior}}" >
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

        <a href="{{route('productos.productos.index')}}" class="btn btn-info btn_end" id="back" >Atras</a><br>

      </div>
      <div class="col-xs-12 col-sm-4 col-lg-2 text-center" style="padding-bottom: 5px; padding-top: 5px">


       <a href="{{route('productos.productos.edit',$productos->idproducto)}}" class="btn btn-default btn_end" id="back" >Limpiar</a><br>

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
