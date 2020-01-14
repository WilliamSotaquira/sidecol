<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Asignación de Servicio Técnico - Idea Colombia</title>
	
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<!-- Icono de Sidecol  -->
	<link rel="icon" type="image/png" href="/images/logos/logo16x16.png" />



</head>
<body>
	<section>
		{!!Form::open(array('url'=>'/preorden/guardar','method'=>'POST','autocomplete'=>'off', 'files'=> true))!!}
		{{ csrf_field() }} 


		<table border="0" cellpadding="0" cellspacing="0" height="100%" lang="es-419" style="min-width:348px" width="100%">
			<tbody>

				<tr height="32" style="height:32px">
					<td>
					</td>
				</tr>
				<tr align="center">
					<td>
						<div>
							<div>
							</div>
						</div>

						<table border="0" cellpadding="0" cellspacing="0" style="padding-bottom:20px;max-width:516px;min-width:220px">
							<tbody>
								<tr>
									<td style="width:8px" width="8">
									</td>
									<td>
										<div align="center" class="m_6309808043716325268mdv2rw" style="border-style:solid;border-width:thin;border-color:#dadce0;border-radius:8px;padding:30px 20px;">
											<img style="padding-bottom: 15px" src="http://grupo-idea.com/colombia/wp-content/uploads/sites/6/2015/08/ideacolombia.png">
											<div style="font-family:'Google Sans',Roboto,RobotoDraft,Helvetica,Arial,sans-serifcolor:color:black;font-size:26px" >											
												PreOrden de servicio técnico 
											</div>

											<div style="font-family:'Google Sans',Roboto,RobotoDraft,Helvetica,Arial,sans-serif;border-bottom:thin solid #dadce0;color:rgba(0,0,0,0.87);line-height:32px;padding-bottom:24px;padding-bottom:6px;padding-top:10px;text-align:center;word-break:break-word">
												
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
																<p style="margin-bottom:0;margin-top:0"><strong>Señor usuario,</strong> esta creando una nueva orden de servicio con los tecnicos autorizados por Idea Colombia S.A.S.
																</p>
															</td>
														</tr>


													</tbody>
												</table>
											</div>

											<div style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:14px;color:rgba(0,0,0,0.87);line-height:20px;padding-top:10px;text-align:center">
												<table style="font-size:14px;letter-spacing:0.2;line-height:20px;text-align:center;padding-bottom:12px;border-bottom:thin solid #f0f0f0">
													<tbody>

														<tr>
															<td colspan="2" style="padding-bottom:12px;text-align:center;color:rgba(0,0,0,0.87)">
																<p style="margin-bottom:0;margin-top:0">A continuación complete la información clave para la ejecución de este.
																</p>
															</td>
														</tr>

														<tr>
															<td width="50%">
																<p style="margin-bottom:0;margin-top:0">Persona de contacto:
																</p>												
															</td>
															<!-- <td style="padding-bottom:5px;text-align:start;"> -->
																<td style="padding-bottom:5px;text-align:center;color:rgba(0,0,0,0.87)">
																	<input type="text" class="form-control " autocomplete="autocomplete" name="contacto" id="contacto" value="{{old('contacto')}}" required="required" >												
																</td>
															</tr>

															<tr>
																<td width="50%">
																	<p style="margin-bottom:0;margin-top:0">E-mail:
																	</p>												
																</td>
																<td style="padding-bottom:5px;text-align:start;">
																	<input type="email" class="form-control " autocomplete="autocomplete" name="email" id="email" value="{{old('email')}}" required="required">

																</td>
															</tr>

															<tr>
																<td width="50%">
																	<p style="margin-bottom:0;margin-top:0">Dirección:
																	</p>												
																</td>
																<td style="padding-bottom:5px;text-align:start;">
																	<input type="text" class="form-control" autocomplete="autocomplete" name="direccion" id="direccion" value="{{old('direccion')}}" required="required">

																</td>
															</tr>

															<tr>
																<td width="50%">
																	<p style="margin-bottom:0;margin-top:0">Ciudad:
																	</p>												
																</td>
																<td style="padding-bottom:5px;text-align:start;">
																	<select name="municipio_id" class="form-control selectpicker" data-size="6" data-live-search="true" id="municipio_id" value="{{old('municipio_id')}}" required="required">
																		<option selected ="true">Seleccione &hellip;</option> 
																		@foreach($municipios as $municipio) 
																		<option value="{{$municipio->id_municipio}}">{{$municipio->municipio}} - {{$municipio->departamento}}</option>
																		@endforeach
																	</select>

																</td>
															</tr>

															<tr>
																<td width="50%">
																	<p style="margin-bottom:0;margin-top:0">Celular de contacto:
																	</p>												
																</td>
																<td style="padding-bottom:5px;text-align:start;">
																	<input type="number" class="form-control" autocomplete="autocomplete" name="celular" id="celular" value="{{old('celular')}}" required="required">

																</td>
															</tr>


															<tr>
																<td width="50%">
																	<p style="margin-bottom:0;margin-top:0">Observaciones:
																	</p>												
																</td>
																<td style="padding-bottom:5px;text-align:start;">
																	<textarea name="observaciones" id="observaciones" class="form-control" rows="3" value="{{old('observaciones')}}" required="required" title="Ejemplo: dia, hora, estado del producto, etc."></textarea>												
																</td>
															</tr>
															<tr>
																<td colspan="2" ><br></td>
															</tr>	

															<tr>
																<td width="50%">
																	<p style="margin-bottom:0;margin-top:0">Crear Orden de Servicio y aceptar términos y condiciones:
																	</p>												
																</td>
																<td style="padding-bottom:5px;text-align:center;">
																	<button class="btn btn-primary btn_end" type="submit" > Guardar </button>												
																</td>
															</tr>
															<tr>
																<td colspan="2" ><br></td>
															</tr>															
															<tr>
																<td colspan="2" style="font-size:12px;margin-bottom:24px;color:rgba(0,0,0,0.54);text-align:center">¿Tiene alguna pregunta?
																	<br>Vaya directamente a 
																	<a href="" class="" style="color:rgba(0,0,0,0.87);">http://grupo-idea.com/colombia/
																	</a>
																</td>
															</tr>
														</tbody>
													</table>


												</div>													


												<table style="font-size:14px;letter-spacing:0.2;line-height:20px;text-align:center">
													<tbody>
														<tr>
															<td colspan="2" style="color:rgba(0,0,0,0.87);font-size:11px;letter-spacing:0.8px;line-height:16px;text-align:start;padding:24px 0 0 0">PREGUNTAS QUE RECIBIMOS
															</td>
														</tr>
														<tr>
															<td style="color:rgba(0,0,0,0.87);vertical-align:top;padding:15px 15px 0 0 0;text-align:start" width="10px"><br>
																<img height="24" src="https://ci4.googleusercontent.com/proxy/lmgpmtPRiIYfBKyihnjSiOCAX3dJGmPQgFy37eJ_ZcHjdV_rawGWgNzJ04dpBCwmSFeDtOkGQPgevrKrawk5Nugt8vIeFBhdqZ-EghJNq6blt76_6hkeDwgtCJlcCgI3Ynaz=s0-d-e1-ft#https://www.gstatic.com/accountalerts/email/security-shield-question-mark_2x.png" style="width:24px;height:24px;margin-right:12px" width="24" class="CToWUd">
															</td>
															<td style="color:rgba(0,0,0,0.87);vertical-align:top;padding:16px 0 0 0;text-align:start">
																<div style="font-size:16px;line-height:24px">
																	<b>¿Que hacer si estos datos no son correctos?
																	</b>
																</div>
																<div style="margin-top:4px">Puede contactar la línea de atención gratuita nacional 018000-112064, &nbsp;, al los teléfonos (571) 620 81 57, (571) 637 41 44, (571) 637 41 13, o puede realizar su consulta mediante el siguiente enlace.
																	<div>
																		<a href="" >Realizar&nbsp;consulta&nbsp;PQRS&nbsp;
																		</a>
																	</div>
																</div>
															</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
										<div style="text-align:center">
											<div style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;color:rgba(0,0,0,0.54);font-size:11px;line-height:18px;padding-top:12px;text-align:center">
												<div>Este correo contiene información confidencial y es prohibida su difusión sin debida autorización.
												</div>
												<div style="direction:ltr">© 2020 Idea Colombia S.A.S.,
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

		{!!Form::close()!!}		
	</section>	
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</html>




