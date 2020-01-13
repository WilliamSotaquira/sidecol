@extends ('layouts.admin')
@section ('contenido')
@include('users.orgsusers.encabezado')



<section class="content">


  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Asignaciónes de Usuarios a Organizaciones </h3>

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
            @can('orgsusers.create')
            <center><a href="{{route ('users.orgsusers.create')}}" ><button class="btn btn-success">Crear Nueva Asignación</button></a></center>
            @endcan
          </div>
          <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">

           @include('users.orgsusers.search') 

         </div> 
       </div>
       <div class="box-body">  


        <div class="table-responsive">
          <table id="tbl_rol" class="table table-striped table-condensed table-hover">
            <thead>

              <th width="5%"><center>ID</center></th>
              <th width="20%">Organización</th>
              <th width="20%">Usuario</th>
              <th width="10%">Documento</th>
              <th width="10%">Celular</th>
              <th width="20%">Correo</th>
              <th width="25%" colspan="2"><center>Opciones</center></th>

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
              @foreach($org_users as $org_user)
              <tr>

                <td class="text-center">{{$org_user->id}}</td>
                <td><strong>{{$org_user->nit}} </strong> - {{$org_user->razonsocial}}</td>
                <td>{{$org_user->idu}}. {{$org_user->name}} {{$org_user->apellidos}}</td>
                <td>{{$org_user->documento}}</td>
                <td>{{$org_user->celular}}</td>
                <td>{{$org_user->email}}</td>


                <td align="center">                  
                  @can('orgsusers.edit')
                  <a href="{{route ('users.orgsusers.edit', $org_user->id )}}" class="btn btn-sm btn-info"> Editar </a>
                  @endcan
                </td>
                <td align="center">  
                  @if($org_user->estado===3)
                  <p style="color: red">Eliminado</p>
                  @else
                  @can('orgsusers.destroy')
                  <a href="" data-target=" #modal-delete-{{$org_user->id}}" data-toggle="modal"><button class="btn btn-sm btn-danger">Eliminar</button></a> 
                  @endcan
                  @endif

                </td>          
                


              </tr>
              <!-- modal -->
              @include('users.orgsusers.modal') 
              <!-- fin del modal -->
              @endforeach
            </tbody>



          </table>
          {{$org_users->render()}}

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