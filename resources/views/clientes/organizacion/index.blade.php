@extends ('layouts.admin')
@section ('contenido')

<section class="content-header">
	<h1>
		Menú de Organizaciones
		<small>Version 2.0</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="/"><i class="fa fa-dashboard"></i> Inicio</a></li>
		<li><a href="/">Comercial</a></li>
		<li><a href="/">Clientes</a></li>
		<li class="active">Organizaciones</li>
	</ol>
</section>
@can('organizacion.index')
<section class="content">


	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Organizaciones Agragadas</h3>

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
          @can('organizacion.create')
          <center><a href="{{route ('clientes.organizacion.create')}}" ><button class="btn btn-success">Crear Nuevo Registro</button></a></center>
          @endcan
        </div>
       <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
         @include('clientes.organizacion.search')
       </div> 
     </div>
   </div>
   <div class="box-body">	
     <div class="table-responsive">
      <table id="table_organizacion" class="table table-striped table-condensed table-hover">
       <thead>
						<!--
							* idtbl_organizacion
             				* nit
             				* razonsocial
             				* logo     
             				* margen
             				* estado 
             			-->
             			<th>ID</th>
             			<th>NIT</th>
             			<th>Razon Social</th>
             			<th>Logo</th>
             			<th>Margen</th>
             			<th>Estado</th>
             			<th colspan="3">Opciones</th>

             		</thead>

             		<tfoot>
             			
             			<tr>

             				<th></th>
             				<th></th>
             				<th></th>
             				<th></th>
             				<th></th>
             				<th></th>
             				<th colspan="3"></th>
             			</tr>
             		</tfoot>
             		
             		<tbody>
             			@foreach($organizacion as $org)
             			<tr>
             				<td class="text-center">{{$org->idtbl_organizacion}}</td>
             				<td>{{$org->nit}}</td>
             				<td>{{$org->razonsocial}}</td>
             				<td><a href="{{$org->image}}" title=""><img src="{{asset ($org->image)}}" alt="Sin imagen" height="100px" width="100px" class="img-thumbnail"></a></td>
             				<td>{{$org->margen}}&nbsp;%</td>
             				<td>
                      @if ($org->estado=='1')                               
                      {{ $org->estado='Activo'}}
                      @elseif ($org->estado=='0')                               
                      {{ $org->estado='Inactivo'}}
                      @else 
                      {{ $org->estado='Eliminado'}}
                      @endif            

                    </td>
                    <td>
                      @can('organizacion.show')
                      <a href="{{route ('clientes.organizacion.show', $org->idtbl_organizacion )}}" class="btn btn-sm btn-default"> Ver </a>&nbsp;
                      @endcan
                    </td>
                    <td>
                      @can('organizacion.edit')
                      <a href="{{route ('clientes.organizacion.edit', $org->idtbl_organizacion )}}" class="btn btn-sm btn-info"> Editar </a>&nbsp;
                      @endcan
                    </td>
                    <td>
                      @can('organizacion.destroy')
                      <a href="" data-target=" #modal-delete-{{$org->idtbl_organizacion}}" data-toggle="modal"><button class="btn btn-sm btn-danger">Eliminar</button></a> 
                      @endcan
                    </td>
                  </tr>

                  @include('clientes.organizacion.modal')

                  @endforeach
                </tbody>



              </table>
              {{$organizacion->render()}}

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