@extends ('layouts.admin')
@section ('contenido')
@include('seguridad.permisos.encabezado')


<section class="content">

  {!!Form::open(array('url'=>'seguridad/permisos/store','method'=>'POST','autocomplete'=>'off', 'files'=> true))!!}
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

<!-- * Tabla: permissions
             * id
             * name
             * slug
             * description       
             * created_at
             * updated_at -->

<div class="container-fluid">

  <div class="box-body">
    <div class="col-xs-12 col-sm-8 ">

      <div class="row row-first" >
        <div class="col-xs-12 col-sm-12">
          <div class="form-group ">
            <label for="name" class="col-xs-12 col-sm-2">Nombre Permiso</label>
            <div class="col-sm-10">
              <input type="text" id="name" name="name" class="form-control" placeholder="Ejemplo: Creación de marcas..." value="{{old('name')}}" required>
            </div>            
          </div>            
        </div>            
      </div>            

      <div class="row">
        <div class="col-xs-12 col-sm-12">
          <div class="form-group">
            <label for="slug" class="col-xs-12 col-sm-2">Identificador</label>
            <div class="col-sm-10">
              <input type="text" id="slug" name="slug" class="form-control" placeholder="Ejemplo: marca.create" value="{{old('slug')}}" required>
            </div>
          </div>
        </div>
      </div>



      <div class="row ">
        <div class="col-xs-12 col-sm-12">
          <div class="form-group">
            <label for="description" class="col-xs-12 col-sm-2 control-label">Descrición</label>
            <div class="col-sm-10">
             <!-- <input type="text" class="form-control"  > -->
             <textarea name="description" id="description" class="form-control" rows="3" placeholder="Permite la creacion  de un nuevo registro de permiso..." value="{{old('description')}}" required></textarea>
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

          <a href="{{route('seguridad.permisos.index')}}" class="btn btn-info btn_end" id="back" >Atras</a><br>

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


