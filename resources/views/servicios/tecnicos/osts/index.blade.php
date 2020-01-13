@extends ('layouts.admin')
@section ('contenido')
@include('servicios.tecnicos.osts.encabezado')

@can('tecnicos.index')
<section>

	<section class="content"> 


		<div class="box box-primary">
			<div class="box-header with-border">
		
				<h3 class="box-title">Mis Ordenes de Servicio</h3>

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

						<div class=" col-lg-1 col-md-1 col-sm-1 col-xs-12 " style="text-align: right;">

							<label>Buscar:</label>
						</div>

						<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">

							@include('servicios.tecnicos.osts.search')
						</div> 
					</div>
					<div class="box-body">	


						<div class="table-responsive">
							<table id="tbl_rol" class="table table-striped table-condensed table-hover">
								<thead>
									<th width="4%">Id</th>
									<th width="10%">Tipo Servicio</th>
									<th width="14%">Contacto</th>
									<th width="12%">Dirección</th>
									<th width="10%">Teléfono</th>
									<th width="17%">Estado</th>
									<th width="14%">Ultima Actualización</th>
									<th width="19%" colspan="3">Opciones</th>
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
										<th colspan="3"></th>
									</tr>									
								</tfoot>

								<tbody>	
									@foreach($datos as $dato)
									<tr>
										<td>OST{{$dato->idost}}</td>
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
										</strong></td>
										<td>{{$dato->contacto_ost}}</td>
										<td>{{$dato->direccion_ost}}</td>
										<td>{{$dato->celular_ost}}</td>
										<td>

											@switch($dato->estado_os)

											@case(0)
											<strong><p style="color: red;">PreOrden <br> de servicio</p></strong>
											@break

											@case(1)
											<strong><p style="color: red;">Sin Asignar</p></strong>
											@break

											@case(2)
											<a href="{{route('servicios.eventososts.aceptar',['idost'=>Crypt::encrypt($dato->idost)])}}" class="btn btn-sm btn-danger">Esperando aceptación <br> del técnico</a>
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
											@if($role_id==13 || $role_id==14)
											<a href="{{route('servicios.eventososts.create',['idost'=>Crypt::encrypt($dato->idost)])}}" class="btn btn-sm bg-navy">Agregar Novedad</a>
											@else
											@can('osts.show')
											<strong><a href="{{route('servicios.eventososts.index')}}" class="btn btn-sm bg-navy">En espera</a></strong>
											@endcan
											@endif
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
											<a href="{{route ('servicios.tecnicos.osts.edit', ['idost' => Crypt::encrypt($dato->idost)])}}" class="btn btn-sm btn-info"> Modificar </a>
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



	</section>
	@endcan
	@endsection