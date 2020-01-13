@extends ('layouts.admin')
@section ('contenido')
@include('seguridad.permisos.encabezado')

@can('permiso.index')
<section class="content">


	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Permisos Agregados</h3>

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
          @can('permiso.create')
					<center><a href="{{route ('seguridad.permisos.create')}}" ><button class="btn btn-success">Crear Nuevo Registro</button></a></center>
          @endcan
				</div>
         <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
         @include('seguridad.permisos.search')
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
             			@foreach($permisos as $permiso)
             			<tr>
             				<td class="text-center">{{$permiso->id}}</td>
             				<td>{{$permiso->name}}</td>
             				<td>{{$permiso->slug}}</td>
             				<td>{{$permiso->description}}</td>
                    <td>
                      <a href="{{route('seguridad.permisos.show',$permiso->id)}}" class="btn btn-sm btn-default"> Ver </a>                     
                    </td>
                   <td>
                      @can('permiso.edit')
                      <a href="{{route ('seguridad.permisos.edit', $permiso->id )}}" class="btn btn-sm btn-info"> Editar </a>
                      @endcan
                    </td>
                    <td>
                       <a href="" data-target=" #modal-delete-{{$permiso->id}}" data-toggle="modal"><button class="btn btn-sm btn-danger">Desactivar</button></a> 
                  
                    </td>
                  </tr>

               
                  
                  @include('seguridad.permisos.modal')         
                  @endforeach
                </tbody>



              </table>
              {{$permisos->render()}}

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