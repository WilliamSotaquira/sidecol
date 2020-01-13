@extends ('layouts.admin')
@section ('contenido')
@include('servicios.talleres.osts.encabezado')

@can('talleres.index')
<section class="content"> 


	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Ordenes de Servicio (OST) | <strong>{{$talleruser->razonsocial}} - {{$talleruser->nit}}</strong></h3>

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

				<div class="row mt-1 justify-content-between" style="align-items: flex-end;" >
					<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
						@include('servicios.talleres.osts.search')
					</div> 
				</div>
				<div class="box-body">	


					<div class="table-responsive">
						<table id="tbl_rol" class="table table-striped table-condensed table-hover">
							<thead>
								<th width="5%">Id</th>
								<th width="13%">Tipo Servicio <i class="fa  fa-info-circle" title="Tipo de Servicio y técnico asignado a la OST"></i></th>
								<th width="13%">Cliente <i class="fa  fa-info-circle" title="Persona de contacto"></i></th>
								<th width="10%">Teléfono <i class="fa  fa-info-circle" title="Telefono/Celular de contacto"></i></th>
								<th width="10%">Sugerida <i class="fa  fa-info-circle" title="Fecha indicada por el cliente para prestar el servicio"></i></th>
								<th width="14%">Estado </th>
								<th width="15%">Actualizado <i class="fa  fa-info-circle" title="Fecha de la ultima actualización"></i></th>
								<th style="text-align: center;" width="20%" colspan="4">Opciones</th>
							</thead>

							<tfoot>
								<tr>
									<th></th>
									<th></th>
									<th></th>
									<th></th>
									<th></th>
									<th></th>
									<th></th>
									<th colspan="4"></th>
								</tr>									
							</tfoot>

							<tbody>	
								@foreach($datos as $dato)
								<tr>
									<td><strong><a href="{{route('servicios.osts.show',['idost' => Crypt::encrypt($dato->idost),$dato->iddetalleost])}}" title="Ir a la Orden de Servicio "> OST{{$dato->idost}} </a></strong></td>

									<td><strong>
										@if ($dato->tipo_os=='1')                               
										{{ $dato->tipo_os='Instalación'}}

										@elseif ($dato->tipo_os=='2')                               
										{{ $dato->tipo_os='Mantenimiento'}}

										@elseif ($dato->tipo_os=='3')       
										{{ $dato->tipo_os='Garantía'}}

										@elseif ($dato->tipo_os=='4')       
										{{ $dato->tipo_os='Otro'}}

										@endif  
									</strong><br>
									{{$dato->name}} {{$dato->apellidos}}</td>

									<td>{{$dato->contacto_ost}}</td>

									<td>{{$dato->celular_ost}}</td>

									<td>{{$dato->fecha_asg}}</td>

									<td>
										@switch($dato->estado_os)

										@case(0)
										<strong><p style="color: red;">PreOrden <br> de servicio</p></strong>
										@break

										@case(1)
										<strong><p style="color: red;">Sin Asignar</p></strong>
										@break

										@case(2)
										<p style="color: red;">Esperando aprobación <br> del técnico</p>
										@break

										@case(3)
										<p style="color:#3d9970;">Aceptado <br>por el técnico</p>
										@break

										@case(4)
										<p style="color:#3d9970;">Cliente <br> Contactado</p>
										@break

										@case(5)
										<p>Orden Confirmada</p>
										@break

										@case(6)
										<strong><p>Por visitar</p></strong>          
										@break

										@case(7)
										<strong><p>Cliente visitado</p></strong>
										@break

										@case(8)
										<p>Servicio Completado</p>
										@break

										@case(9)
										<strong><p>Rechazado por el técnico</p></strong>
										@break

										@case(10)

										@can('osts.show')										
										<a href="{{route('servicios.talleres.eventos.create',['idost'=>Crypt::encrypt($dato->idost)])}}" class="btn btn-sm bg-navy">Agregar Novedad</a>		
										@endcan

										@break

										@case(11)
										<strong><p>Critico Demora</p></strong>
										@break

										@case(12)
										<strong><p>Cliente Rechaza</p></strong>
										@break

										@case(13)
										<strong><p>Administracion Cierra</p></strong>
										@break

										@default
										<p style="color: red">Sin información</p>
										@break

										@endswitch
									</td>

									<td>{{$dato->updated_at}}</td>

									<td>
										<a href="{{route('servicios.osts.show',['idost' => Crypt::encrypt($dato->idost)])}}" class="btn btn-sm btn-default">Ver OST</a>
									</td>
									<td>
										<a href="{{route ('servicios.talleres.osts.edit', ['idost' => Crypt::encrypt($dato->idost)])}}" class="btn btn-sm btn-info"> Modificar </a>
									</td>
									<td>
										<a href="{{route ('servicios.talleres.osts.edit_uo', ['idost' => Crypt::encrypt($dato->idost)])}}" class="btn btn-sm bg-navy"> Reasignar </a>					
									</td>
									<td>
										<a href="{{route('servicios.eventososts.rechazar',['idost'=>Crypt::encrypt($dato->idost)])}}" class="btn btn-sm btn-danger">Rechazar</a>
									</td>

								</tr>
								@endforeach
							</tbody>
						</table>

					</div>	

				</div>

			</div>

		</div>

	</section>
	@endcan

	@endsection