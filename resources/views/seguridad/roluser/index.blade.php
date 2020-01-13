@extends ('layouts.admin')
@section ('contenido')
@include('seguridad.roluser.encabezado')


<section class="content">


  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Asignación de Roles a Usuarios Agregados</h3>

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
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-ban"></i> ¡Alerta!</h4>
          {{session('warning')}}          
        </div>
        @endif

        <div class="row mt-1 justify-content-between align-items-center" >
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            @can('users.create')
            <center><a href="{{route ('seguridad.roluser.create')}}" ><button class="btn btn-success">Crear Nuevo Asignación</button></a></center>
            @endcan
          </div>
          <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
           @include('seguridad.roluser.search') 
         </div> 
       </div>
       <div class="box-body">  


        <div class="table-responsive">
          <table id="tbl_rol" class="table table-striped table-condensed table-hover">
            <thead>

              <th>ID</th>
              <th>Identificación</th>
              <th>Usuario</th>
              <th>Rol Asignado</th>
              <th>Descripción</th>
              <th colspan="3">Opciones</th>

            </thead>

            <tfoot>

              <tr>

                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th colspan="2"></th>
              </tr>
            </tfoot>

            <tbody>
              @foreach($RolUsers as $RolUser)
              <tr>
                <td class="text-center">{{$RolUser->id}}</td>
                <td>{{$RolUser->documento}}</td>
                <td width="15%">{{$RolUser->nombre}} {{$RolUser->apellidos}}</td>
                <td>{{$RolUser->name}}</td>
                <td width="25%">{{$RolUser->slug}} | {{$RolUser->description}}</td>
                
                <td align="center">
                  @if($RolUser->rolid != 6  && $RolUser->rolid != 7 )
                  @can('users.edit')             
                  <a href="{{route ('seguridad.roluser.edit', $RolUser->id )}}" class="btn btn-sm btn-info"> Editar </a>
                  @endcan
                  @else
                 Sin opciones
                  @endif

                </td>
                <td align="center">

                   @if($RolUser->rolid != 6 && $RolUser->rolid != 7 )
                  @can('users.edit')             
                  <a href="" data-target=" #modal-delete-{{$RolUser->id}}" data-toggle="modal"><button class="btn btn-sm btn-danger">Eliminar</button></a> 
                  @endcan
                  @endif

                 

               </td>
             </tr>
             @include('seguridad.roluser.modal')         

             @endforeach
           </tbody>



         </table>
         {{$RolUsers->render()}}

       </div>  

     </div>

     <!-- /.box-body -->
    <!-- <div class="box-footer text-center"
      <a href="javascript:void(0)" class="uppercase"></a>
    </div> -->
    <!-- /.box-footer -->

  </div>
</div>

</section>

@endsection