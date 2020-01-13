@extends ('layouts.admin')
@section ('contenido')
@include('servicios.talleres.tecnicos.encabezado')

@can('talleres.index')
<section class="content">


	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Usuarios Vinculados a <strong>{{$talleruser->razonsocial}}</strong></h3>

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
          <h4><i class="icon fa fa-ban"></i> Error!</h4>
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
            @can('talleres.create')
            <center><a href="{{route ('servicios.talleres.tecnicos.create')}}" ><button class="btn btn-success">Crear Nuevo Usuario</button></a></center>
            @endcan
          </div>
          <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
           @include('servicios.talleres.tecnicos.search')
         </div> 
       </div>
       <div class="box-body">	


         <div class="table-responsive">
          <table id="tbl_rol" class="table table-striped table-condensed table-hover">
           <thead>

            <th>Rol</th>
            <th>Nombre</th>
            <th>E-mail</th>
            <th>Nro Identificación</th>
            <th>Desde</th>
            <th colspan="2">Opciones</th>

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
          @foreach($users as $user)
          <tr>
           <td>{{$user->rol}}</td>
           <td>{{$user->nombre}} {{$user->apellidos}}</td>
           <td>{{$user->email}}</td>
           <td>
            @if ($user->documento==null)                               
            {{ $user->documento='Sin registro aún'}}
            @else 
            {{ $user->documento}}
            @endif            

          </td>

          <td>{{$user->created_at}}</td>
          <td>
            <a href="{{route('servicios.talleres.tecnicos.show',$user->id)}}" class="btn btn-sm btn-default"> Ver </a>                     
          </td>
          <td>
            <a href="" data-target=" #modal-delete-{{$user->id}}" data-toggle="modal"><button class="btn btn-sm btn-danger">Eliminar</button></a>           
          </td>
        </tr>

        @include('servicios.talleres.tecnicos.modal') 
        @endforeach
      </tbody>



    </table>
    {{$users->render()}}

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
@endcan
@endsection