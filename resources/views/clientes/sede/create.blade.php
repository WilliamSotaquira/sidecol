@extends ('layouts.admin')
@section ('contenido')


<section class="content-header">
  <h1>                  
    Menú de Sucursal
    <small>Version 2.0</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="/"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li><a href="/">Comercial</a></li>
    <li><a href="/">Clientes</a></li>
    <li><a href="{{route('clientes.sede.index')}}">Sucursal</a></li>
    <li class="active">Crear Nuevo Registro</li>
  </ol>
</section>

<section class="content">

  {!!Form::open(array('url'=>'clientes/sede/store','method'=>'POST','autocomplete'=>'off', 'files'=> true))!!}
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
              Recuerde que para crear un nuevo registro de Sucursal es necesario que ya exista su respectiva ORGANIZACION...
            </div>


     <div class="box-body">
      <div class="col-xs-12 col-sm-8">


        <div class="row row-first"> 
          <div class="col-xs-12 col-sm-12">
            <div class="form-group">
              <label for="fk_organizacion" class="col-xs-12 col-sm-2 control-label">Organizacion</label>
              <div class="col-sm-10">
               <select name="fk_organizacion" class="form-control selectpicker" data-size="6" data-live-search="true" id="fk_organizacion" value="{{old('fk_organizacion')}}" required>
                <option selected ="true">Seleccione &hellip;</option> 
                @foreach($org as $o) 
                <option value="{{$o->idtbl_organizacion}}">{{$o->nit}} - {{$o->razonsocial}}</option>
                @endforeach

              </select>
            </div>
          </div>
        </div>
      </div>



      <div class="row ">
        <div class="col-xs-12 col-sm-12">
          <div class="form-group">
            <label for="nombresede" class="col-xs-12 col-sm-2 control-label">Sucursal</label>
            <div class="col-sm-10">
             <input type="text" class="form-control" name="nombresede" id="nombresede" value="{{old('nombresede')}}" required >
           </div> 
         </div> 
       </div> 
     </div> 

     <div class="row ">
      <div class="col-xs-12 col-sm-12">
        <div class="form-group">
          <label for="email" class="col-xs-12 col-sm-2 control-label">E-mail</label>
          <div class="col-sm-10">
           <input type="email" class="form-control" name="email" id="email" value="{{old('email')}}" required >
         </div> 
       </div> 
     </div> 
   </div> 

   <div class="row ">
    <div class="col-xs-12 col-sm-12">
      <div class="form-group">
        <label for="direccion" class="col-xs-12 col-sm-2 control-label">Dirección</label>
        <div class="col-sm-10">
         <input type="text" class="form-control" name="direccion" id="direccion" value="{{old('direccion')}}" required >
       </div> 
     </div> 
   </div> 
 </div> 

 <div class="row ">
  <div class="col-xs-12 col-sm-12">
    <div class="form-group">
      <label for="telefono" class="col-xs-12 col-sm-2 control-label">Telefono</label>
      <div class="col-sm-10">
       <input type="text" class="form-control" name="telefono" id="telefono" value="{{old('telefono')}}" required >
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
        <option value="0">Inactivo</option>
        <option value="1">Activo</option>


      </select>
    </div>
  </div>
</div>
</div>

<div class="row">
  <div class="col-xs-12 col-sm-12">
    <div class="form-group">
      <label for="fk_ciudad" class="col-xs-12 col-sm-2 control-label">Ciudad</label>
      <div class="col-sm-10">
       <select name="fk_ciudad" class="form-control selectpicker" data-size="6" data-live-search="true" id="fk_ciudad" value="{{old('fk_ciudad')}}" required>
        <option selected ="true">Seleccione &hellip;</option> 
        @foreach($ciudad as $o) 
        <option value="{{$o->id_municipio}}">{{$o->municipio}} - {{$o->departamento}}</option>
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

          <a href="{{route('clientes.organizacion.index')}}" class="btn btn-info btn_end" id="back" >Atras</a><br>

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



