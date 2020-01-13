@extends ('layouts.admin')
@section ('contenido')
@include('seguridad.roles.encabezado')

@can('organizacion.index')
<section class="content">


	<div class="box box-primary">
		<div class="box-header with-border"> 
			<h3 class="box-title">Roles de Usuario Agregados</h3>

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
          @can('organizacion.create')
					<center><a href="{{route ('seguridad.roles.create')}}" ><button class="btn btn-success">Crear Nuevo Registro</button></a></center>
          @endcan
				</div>
		</div>
		<div class="box-body">	
      
			
			<div class="table-responsive">
				<table id="tbl_rol" class="table table-striped table-condensed table-hover">
					<thead>
						
             			<th>ID</th>
             			<th>Nombre</th>
             			<th>Identificador</th>
             			<th>Descripción</th>
             			<th style="width: 130px; overflow: auto;">Estado</th>
             			<th colspan="3">Opciones</th>

             		</thead>

             		<tfoot>
             			
             			<tr>

             				<th></th>
             				<th></th>
             				<th></th>
             				<th></th>
             				<th></th>
             				<th colspan="3"></th>
             			</tr>
             		</tfoot>
             		
             		<tbody>
             			@foreach($roles as $rol)
             			<tr>
             				<td class="text-center">{{$rol->id}}</td>
             				<td>{{$rol->name}}</td>
             				<td>{{$rol->slug}}</td>
             				<td>{{$rol->description}}</td>
             				<td>
                      @if ($rol->special==='all-access')                               
                      {{ $rol->special='Acceso Total'}}
                      @elseif ($rol->special==='no-access')                               
                      {{ $rol->special='Limitado'}}
                      @elseif ($rol->special===null)                               
                      {{ $rol->special='Ninguno'}} 
                      @endif            

                    </td>
                    <td>
                      <a href="{{route('seguridad.roles.show',$rol->id)}}" class="btn btn-sm btn-default"> Ver </a>                     
                    </td>
                   <td>
                      @can('rol.edit')
                      <a href="{{route ('seguridad.roles.edit', $rol->id )}}" class="btn btn-sm btn-info"> Editar </a>
                      @endcan
                    </td>
                    <td>
                       <a href="" data-target=" #modal-delete-{{$rol->id}}" data-toggle="modal"><button class="btn btn-sm btn-danger">Eliminar</button></a> 
                  
                    </td>
                  </tr>

               
                  @include('seguridad.roles.modal')         
                  @endforeach
                </tbody>



              </table>
              {{$roles->render()}}

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