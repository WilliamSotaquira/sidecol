@extends ('layouts.admin')
@section ('contenido')
@include('seguridad.permisosroles.encabezado')



<section class="content">

  {!!Form::model($PermisosRoles,['method'=>'PUT','route'=>['seguridad.permisosroles.update',$PermisosRoles->id],'files'=>'true'])!!}
  {{Form::token()}} 


  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Editar Asignación {{$PermisosRoles->id}}</h3>
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
                <label for="role_id" class="col-xs-12 col-sm-3 control-label">Rol </label>
                <div class="col-sm-9">
                  <select name="role_id" class="form-control selectpicker" data-live-search="true" data-size="6" id="role_id" required>
                   @foreach($roles as $rol)

                   @if ( $rol->id==$PermisosRoles->role_id) 
                   <option value="{{$rol->id}}" selected >{{$rol->id}} . {{$rol->name}} : <strong>{{$rol->slug}}</strong></option>

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
              <label for="permission_id" class="col-xs-12 col-sm-3 control-label">Permiso</label>
              <div class="col-sm-9">
                <select name="permission_id" class="form-control selectpicker" data-live-search="true" data-size="6" id="permission_id" >
                  @foreach($permisos as $permiso)

                  @if ( $permiso->id==$PermisosRoles->permission_id) 
                  <option value="{{$permiso->id}}" selected >{{$permiso->id}} . {{$permiso->name}} : {{$permiso->slug}}</option>
                  @else
                  <option value="{{$permiso->id}}" >{{$permiso->id}} . {{$permiso->name}} : <strong>{{$permiso->slug}}</strong></option>
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

          <a href="{{route('seguridad.permisosroles.index')}}" class="btn btn-info btn_end" id="back" >Atras</a><br>

        </div>
        <div class="col-xs-12 col-sm-4 col-lg-2 text-center" style="padding-bottom: 5px; padding-top: 5px">


         <a href="{{route('seguridad.permisosroles.edit',$PermisosRoles->id)}}" class="btn btn-default btn_end" id="back" >Limpiar</a><br>

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

