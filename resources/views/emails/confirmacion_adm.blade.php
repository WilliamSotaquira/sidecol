<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Asignación de Servicio Técnico - Idea Colombia</title>
	<link rel="stylesheet" href="">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">


</head>
<body>
	<?php 
	$idservicio = Crypt::decrypt($idservicio);   
	?>
	<section>
		<table border="0" cellpadding="0" cellspacing="0" height="100%" lang="es-419" style="min-width:348px" width="100%">
			<tbody>

				<tr height="32" style="height:32px">
					<td>
					</td>
				</tr>
				<tr align="center">
					<td>
						<table border="0" cellpadding="0" cellspacing="0" style="padding-bottom:20px;max-width:516px;min-width:220px">
							<tbody>
								<tr>
									<td style="width:8px" width="8"></td>
									<td>
										<div align="center" class="m_6309808043716325268mdv2rw" style="border-style:solid;border-width:thin;border-color:#dadce0;border-radius:8px;padding:30px 20px;">
											<img style="padding-bottom: 15px" src="http://grupo-idea.com/colombia/wp-content/uploads/sites/6/2015/08/ideacolombia.png">
											<div style="font-family:'Google Sans',Roboto,RobotoDraft,Helvetica,Arial,sans-serif;color:rgba(0,0,0,0.87);font-size:28px" >
												OST{!!$idservicio!!} confirmada
											</div>

											<div style="font-family:'Google Sans',Roboto,RobotoDraft,Helvetica,Arial,sans-serif;border-bottom:thin solid #dadce0;color:rgba(0,0,0,0.87);line-height:32px;padding-bottom:24px;padding-bottom:6px;padding-top:10px;text-align:center;word-break:break-word">
												<div style="font-size:24px">
													<div>

													</div>
												</div>
												<table align="center" style="margin-top:8px">
													<tbody>
														<tr style="line-height:normal">
															<td align="right" style="padding-right:8px">
															</td>
															<td>
																<a style="font-family:'Google Sans',Roboto,RobotoDraft,Helvetica,Arial,sans-serif;color:rgba(0,0,0,0.87);font-size:14px;line-height:20px">

																</a>
															</td>
														</tr>
													</tbody>
												</table>
											</div>

											<div style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:14px;color:rgba(0,0,0,0.87);line-height:20px;padding-top:20px;text-align:center">
												<table style="font-size:14px;letter-spacing:0.2;line-height:20px;text-align:center;padding-bottom:24px;border-bottom:thin solid #f0f0f0 ">
													<tbody>
														<tr>
															<td colspan="2" style="padding-bottom:12px;text-align:center;color:rgba(0,0,0,0.87);">
																<p style="margin-bottom:0;margin-top:0">Se ha completado la asignacion y confirmacion de fecha y hora para la orden 
																	de servicio.<strong> Información del servicio:</strong>
																</p>
															</td>
														</tr>


														<tr>
															<td width="50%">
																<p style="margin-bottom:0;margin-top:0">Tipo de servicio:
																</p>												
															</td>
															<td style="padding-bottom:5px;text-align:start;">
																<p style="margin-bottom:0;margin-top:0">
																	<?php 
																	if ($tipo=='1')
																	{
																		$tipo='Instalación';
																	}
																	elseif ($tipo=='2')
																	{
																		$tipo='Mantenimiento';	
																	}
																	elseif ($tipo=='3')
																	{
																		$tipo='Garantía';
																	}
																	elseif ($tipo=='4')       
																	{
																		$tipo='Otro';
																	}

																	?>
																	{!!$tipo!!}
																</p>												
															</td>
														</tr>

														<tr>
															<td width="50%">
																<p style="margin-bottom:0;margin-top:0">Numero de servicio:
																</p>												
															</td>
															<td style="padding-bottom:5px;text-align:start;">
																
																<p style="margin-bottom:0;margin-top:0">OST{!!$idservicio!!}
																</p>

															</td>
														</tr>

														<tr>
															<td width="50%">
																<p style="margin-bottom:0;margin-top:0">Fecha de servicio:
																</p>												
															</td>
															<td style="padding-bottom:5px;text-align:start;">
																<p style="margin-bottom:0;margin-top:0">{!!$fecha_asg!!}
																</p>												
															</td>
														</tr>	

														<tr>
															<td width="50%">
																<p style="margin-bottom:0;margin-top:0">Jornada de servicio:
																</p>												
															</td>
															<td style="padding-bottom:5px;text-align:start;">
																<p style="margin-bottom:0;margin-top:0">{!!$jornada!!}
																</p>												
															</td>
														</tr>														

														<tr>
															<td width="50%">
																<p style="margin-bottom:0;margin-top:0">Taller de servicio:
																</p>												
															</td>
															<td style="padding-bottom:5px;text-align:start;">
																<p style="margin-bottom:0;margin-top:0">{!!$razonsocial!!}
																</p>												
															</td>
														</tr>

														<tr>
															<td width="50%">
																<p style="margin-bottom:0;margin-top:0">Técnico:
																</p>												
															</td>
															<td style="padding-bottom:5px;text-align:start;">
																<p style="margin-bottom:0;margin-top:0">
																	{!!$name!!} {!!$apellidos!!}
																</p>												
															</td>
														</tr>

														<tr>
															<td width="50%">
																<p style="margin-bottom:0;margin-top:0">Linea de asistencia:
																</p>												
															</td>
															<td style="padding-bottom:5px;text-align:start;">
																<p style="margin-bottom:0;margin-top:0">
																	{!!$cel_tech!!}
																</p>												
															</td>
														</tr>

														<tr>
															<td width="50%">
																<p style="margin-bottom:0;margin-top:0">Persona de contacto:
																</p>												
															</td>
															<td style="padding-bottom:5px;text-align:start;">
																<p style="margin-bottom:0;margin-top:0">{!!$contacto!!}
																</p>												
															</td>
														</tr>

														<tr>
															<td width="50%">
																<p style="margin-bottom:0;margin-top:0">E-mail:
																</p>												
															</td>
															<td style="padding-bottom:5px;text-align:start;">
																<p style="margin-bottom:0;margin-top:0">{!!$user_email!!}
																</p>												
															</td>
														</tr>

														<tr>
															<td width="50%">
																<p style="margin-bottom:0;margin-top:0">Direccion:
																</p>												
															</td>
															<td style="padding-bottom:5px;text-align:start;">
																<p style="margin-bottom:0;margin-top:0">{!!$direccion!!}
																</p>												
															</td>
														</tr>

														<tr>
															<td width="50%">
																<p style="margin-bottom:0;margin-top:0">Celular de contacto:
																</p>												
															</td>
															<td style="padding-bottom:5px;text-align:start;">
																<p style="margin-bottom:0;margin-top:0">
																	{!!$celular!!}
																</p>												
															</td>
														</tr>

														<tr>
															<td width="50%">
																<p style="margin-bottom:0;margin-top:0">Teléfono de contacto:
																</p>												
															</td>
															<td style="padding-bottom:5px;text-align:start;">
																<p style="margin-bottom:0;margin-top:0">
																	{!!$telefono!!}
																</p>												
															</td>
														</tr>

														<tr>
															<td colspan="2" >
																&nbsp;
															</td>
														</tr>

													</tbody>
												</table>
											</div>

											<div>
												<table>											
													<tbody>
														<tr>
															<td colspan="2" >
																&nbsp;
															</td>
														</tr>
														<tr>
															<td>	
																<a href="{{route('servicios.usersosts.show',['idost' => Crypt::encrypt($idservicio)])}}" style="color:rgb(0, 0, 128);">Consultar&nbsp;mas&nbsp;acerca de la orden de servico&nbsp;
																</a>
															</td>
														</tr>
													</tbody>
												</table>
											</div>

										</div>
									</div>
									<div style="text-align:center">
										<div style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;color:rgba(0,0,0,0.54);font-size:11px;line-height:18px;padding-top:12px;text-align:center">
											<div>Este correo contiene informacion confidencial y es prohibida su difusión sin debida autorizacion.
											</div>
											<div style="direction:ltr">© 2019 Idea Colombia S.A.S.,
												<a class="m_6309808043716325268afal" style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;color:rgba(0,0,0,0.54);font-size:11px;line-height:18px;padding-top:12px;text-align:center"> Av 19 # 114 - 09 of 304, Bogotá D.C., BOG, COLOMBIA
												</a>
											</div>
										</div>
										<div style="display:none!important;max-height:0px;max-width:0px">1549071794577000
										</div>
									</div>
								</td>
								<td style="width:8px" width="8">
								</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
			<tr height="32" style="height:32px">
				<td>
				</td>
			</tr>
		</tbody>
	</table>		
</section>	
</body>
<script src="https://use.fontawesome.com/fd6220c6dc.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>