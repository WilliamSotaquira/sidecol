@extends ('layouts.admin')
@section ('contenido')
@include('seguridad.permisosusuarios.encabezado')



<section class="content">


  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Asignación de Permisos a Usuarios Agregados</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <div class="container-fluid">

        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-check"></i> ¡Completado!</h4>
          {{session('success')}}    
        </div>
        @elseif(session()->has('danger'))
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-ban"></i> ¡Advertencia!</h4>
          {{session('danger')}}          
        </div>
        @elseif(session()->has('warning'))
        <div class="alert alert-warning alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-ban"></i> ¡Alerta!</h4>
          {{session('warning')}}          
        </div>
        @endif

        <div class="row mt-1 justify-content-between align-items-center" >
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            @can('permisosusuarios.create')
            <center><a href="{{route ('seguridad.permisosusuarios.create')}}" ><button class="btn btn-success">Crear Nuevo Asignación</button></a></center>
            @endcan
          </div>
          <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">

           @include('seguridad.permisosusuarios.search') 

         </div> 
       </div>
       <div class="box-body">  


        <div class="table-responsive">
          <table id="tbl_rol" class="table table-striped table-condensed table-hover">
            <thead>

              <th width="18%">Usuario</th>
              <th width="17%">Rol</th>
              <th width="30%">Permiso Asignado</th>
              <th width="16%">Creación</th>
              <th width="20%" colspan="2"><center>Opciones</center></th>

            </thead>

            <tfoot>

              <tr>

                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th colspan="2"></th>

              </tr>
            </tfoot>

            <tbody>
              @foreach($PermisosUsuarios as $PermisoUsuario)
              <tr>
                <td>&nbsp;&nbsp;{{$PermisoUsuario->uname}} {{$PermisoUsuario->apellidos}}</td>
                <td>{{$PermisoUsuario->rolname}}</td>
                <td>{{$PermisoUsuario->pname}}: {{$PermisoUsuario->description}}.</td>
                <td>{{$PermisoUsuario->created_at}}</td>
                
                <td align="center">
                  @can('permisosusuarios.edit')
                  <a href="{{route ('seguridad.permisosusuarios.edit', $PermisoUsuario->id )}}" class="btn btn-sm btn-info"> Editar </a>
                  @endcan
                </td>
                <td align="center">
                  @can('permisosusuarios.destroy')
                  <a href="" data-target=" #modal-delete-{{$PermisoUsuario->id}}" data-toggle="modal"><button class="btn btn-sm btn-danger">Eliminar</button></a> 
                  @endcan
                </td>
              </tr>
              <!-- modal -->
              @include('seguridad.permisosusuarios.modal') 
              <!-- fin del modal -->
              @endforeach
            </tbody>



          </table>
          {{$PermisosUsuarios->render()}}

        </div>  

      </div>

      <!-- /.box-bod
        y -->
    <!-- <div class="box-footer text-center"
      <a href="javascript:void(0)" class="uppercase"></a>
    </div> -->
    <!-- /.box-footer -->

  </div>
</div>

</section>


@endsection