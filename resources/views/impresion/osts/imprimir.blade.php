<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Confirmacion de Servicio Técnico - Idea Colombia</title>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
	<!-- Bootstrap -->
<!-- 	<link rel="stylesheet" href="{{asset('css/bootstrap-grid.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/bootstrap-reboot.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
	<link rel="stylesheet" type="text/css" href="/css/bootstrap-grid.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous"> -->

	<style type="text/css" media="screen">
		table, th, td, tr{			

			position: absolute;	
			padding: .5%;

			justify-content: space-around;
			align-items: flex-start;
			text-align: center;

			font-size: 65%;
			border: 1px solid black;
			border-collapse: collapse;
			border-spacing: 0px;

		}

	</style>


</head>

<body>
	<section>
		<table style=" width: 700px;">
			<thead>
				<tr>
					<td rowspan="3" width="25%" >
						<img style=" height: 55px;" src="http://grupo-idea.com/colombia/wp-content/uploads/sites/6/2015/08/ideacolombia.png">
					</td>

					<td rowspan="3" colspan="2" width="50%">
						<ul>
							<center><h2>Orden de Servicio</h2></center>
						</ul>
					</td>
					<td width="25%"><h5>Código: FT-ST-003</h5></td>
				</tr>
				<tr>
					<td><h5>Version: 001</h5></td>
				</tr>
				<tr>
					<td><h5>Fecha: 06/05/2019</h5></td>
				</tr>

			</thead>
			<tbody>
				<tr>
					<th colspan="4" style="border-bottom: 0px;">
						<h5><strong>Descripción del Cliente</strong></h5>
					</th>
				</tr>
				<tr>
					<td colspan="2" style="width: 50%; text-align: left; border-right: 0px; border-top: 0px; align-items: flex-start;">
						<ul style="list-style-type:none;">
							<li><strong>Contacto:</strong> {{$osts->contacto_ost}}</li>
							<li><strong>Documento: </strong>
								@switch($osts->tipo_doc)

								@case(0)
								Por seleccionar
								@break

								@case(1)
								Cédula de Ciudadanía
								@break

								@case(2)
								Cédula de Extranjería
								@break

								@case(3)
								Pasaporte
								@break

								@case(4)
								Otro
								@break

								@default
								Sin información              
								@break
								@endswitch
							</li>
							<li><strong>Numero Documento:</strong> {{$osts->numero_doc}}</li>
							<li><strong>E-mail:</strong> {{$osts->email_ost}}</li>
						</ul>								
					</td>
					<td colspan="2" style="width: 50%; text-align: left; border-left: 0px; border-top: 0px; align-items: flex-start;">
						<ul style="list-style-type:none;">
							<li><strong>Celular de Contacto:</strong> {{$osts->celular_ost}}</li>
							<li><strong>Teléfono:</strong> {{$osts->telefono_ost}}</li>
							<li><strong>Dirección:</strong> {{$osts->direccion_ost}}</li>
							<li><strong>Ciudad:</strong> {{$osts->municipio}}</li>
						</ul>								
					</td>
				</tr>					
				<tr>
					<th colspan="4" style="border-bottom: 0px;">
						<h5><strong>Descripción del Cliente</strong></h5>
					</th>
				</tr>
				<tr>
					<td colspan="2" style="width: 50%; text-align: left; border-right: 0px; border-top: 0px; align-items: flex-start;">
						<ul style="list-style-type:none;">
							<li><strong>Contacto:</strong> {{$osts->contacto_ost}}</li>
							<li><strong>Documento: </strong>
								@switch($osts->tipo_doc)

								@case(0)
								Por seleccionar
								@break

								@case(1)
								Cédula de Ciudadanía
								@break

								@case(2)
								Cédula de Extranjería
								@break

								@case(3)
								Pasaporte
								@break

								@case(4)
								Otro
								@break

								@default
								Sin información              
								@break
								@endswitch
							</li>
							<li><strong>Numero Documento:</strong> {{$osts->numero_doc}}</li>
							<li><strong>E-mail:</strong> {{$osts->email_ost}}</li>
						</ul>								
					</td>
					<td colspan="2" style="width: 50%; text-align: left; border-left: 0px; border-top: 0px; align-items: flex-start;">
						<ul style="list-style-type:none;">
							<li><strong>Celular de Contacto:</strong> {{$osts->celular_ost}}</li>
							<li><strong>Teléfono:</strong> {{$osts->telefono_ost}}</li>
							<li><strong>Dirección:</strong> {{$osts->direccion_ost}}</li>
							<li><strong>Ciudad:</strong> {{$osts->municipio}}</li>
						</ul>								
					</td>
				</tr>
				<tr>
					<th colspan="4" style="border-bottom: 0px;">
						<h5><strong>Descripción del Servicio</strong></h5>
					</th>
				</tr>
				<tr>
					<td colspan="2" style="width: 50%; text-align: left; border-right: 0px; border-top: 0px; align-items: flex-start;">
						<ul style="list-style-type:none;">
							<li><strong>Numero de Servicio:</strong> OST{{$osts->idost}}</li>
							<li><strong>Tipo Servicio: </strong>
								@switch($osts->tipo_os)
								@case(1)
								1. Instalación
								@break

								@case(2)
								2. Mantenimiento
								@break

								@case(3)
								3. Garantía
								@break

								@case(4)
								4. Otro
								@break

								@default
								Campo vacío
								@endswitch
							</li>
							@if($tecnico!=null)
							<li><strong>Fecha Sugerida:</strong> 

								{{$tecnico->fecha_asg}}

							</li>
							@endif
							<li><strong>Fecha Creación:</strong> {{$osts->created_at}}</li>								
							<li><strong>Ultima Modificación:</strong> {{$osts->updated_at}}</li>
							<li><strong>Estado OST:</strong>
								@switch($osts->estado_os)

								@case(0)
								PreOrden de servicio
								@break

								@case(1)
								Sin Asignar
								@break

								@case(2)
								Esperando aprobación del técnico
								@break

								@case(3)
								Aceptado por el técnico
								@break

								@case(4)
								Cliente Contactado
								@break

								@case(5)
								Orden Confirmada
								@break

								@case(6)
								Por visitar          
								@break

								@case(7)
								Cliente visitado
								@break

								@case(8)
								Servicio Completado
								@break

								@case(9)
								<strong>Rechazado por el técnico</strong>
								@break

								@case(10)								
								<strong>En espera</strong>								
								@break

								@case(11)
								<strong>Critico Demora</strong>
								@break

								@case(12)
								<strong>Cliente Rechaza</strong>
								@break

								@case(13)
								<strong>Administración Cierra</strong>
								@break

								@default
								Sin información
								@break

								@endswitch 

							</li>
						</ul>								
					</td>
					<td colspan="2" style="width: 50%; text-align: left; border-left: 0px; border-top: 0px; align-items: flex-start;">
						<ul style="list-style-type:none;">
							<li><strong>Falla:</strong> {{$osts->falla}}</li>
							<li><strong>Estado Garantía:</strong> {{$osts->estado_garantia}}</li>
							<li><strong>Nro. Factura:</strong> {{$osts->nro_factura}}</li>
							<li><strong>Nros. Serie:</strong> {{$osts->nro_serie}}</li>
							<li><strong>Observaciones:</strong> {{$osts->observaciones}}</li>
						</ul>								
					</td>
				</tr>

				@if($productos!= null)					
				<tr>
					<th colspan="4" style="border-bottom: 0px;">
						<h5><strong>Descripción de los productos</strong></h5>
					</th>
				</tr>
				@foreach($productos as $producto)
				<tr> 
					<td style="border-top: 0px; border-bottom:0px; border-right: 0px;"><strong>Referencia:</strong> {{$producto->referencia}}</td>
					<td style="border-top: 0px; border-bottom:0px; border-right: 0px; border-left: 0px;"><strong>Articulo:</strong> {{$producto->articulo}}</td>         
					<td style="border-top: 0px; border-bottom:0px; border-right: 0px; border-left: 0px;"><strong>Categoría:</strong> {{$producto->categoria}}</td>
					<td style="border-top: 0px; border-bottom:0px;  border-left: 0px; padding-bottom: 0px;"><strong>Marca:</strong>{{$producto->marca}}</td>

				</tr>

				@endforeach
				<tr>
					<td colspan="4" style="padding-bottom: 10px; border-top-color: #FFFFFF;"></td>
				</tr>

				@endif
				@if($tecnico!=null)
				<tr>
					<th colspan="4" style="border-bottom: 0px;">
						<h5><strong>Descripción del Técnico</strong></h5>							
					</th>
				</tr>
				<tr>
					<td colspan="2" style="text-align: left; border: 0px; border-top: 0px; align-items: flex-start;">
						<ul style="list-style-type:none;">
							<li><strong>Técnico:</strong> {{$tecnico->name}} {{$tecnico->apellidos}}</li>
							<li><strong>Email:</strong> {{$tecnico->email}}</li>
							<li><strong>Organización:</strong> {{$tecnico->razonsocial}}</li>
							<li><strong>NIT:</strong> {{$tecnico->nit}}</li>
						</ul>								
					</td>
					<td colspan="2" style="text-align: left; border: 0px; border-top: 0px; align-items: flex-start;">
						<ul style="list-style-type:none;">
							<li><strong>Linea Contacto:</strong> {{$tecnico->celular}}</li>
							<li><strong>Fecha Creación:</strong> {{$tecnico->created_at}}</li>
							<li><strong>Ultima Modificación: </strong>{{$tecnico->updated_at}}</li>
						</ul>								
					</td>
				</tr>
				@endif
				<?php 
				setlocale(LC_ALL, 'es_CO');
				 ?>
				<tr>
					<td colspan="4" style="text-align: left; border-left-color: #FFFFFF; border-bottom-color: #FFFFFF; border-right-color: #FFFFFF;"><p>Impreso : {{strftime("%A, %d de %B de %Y, %H:%M")}} </p></td>
				</tr>

			</tbody>
		</table>
	</section> 

</body>
</html>
