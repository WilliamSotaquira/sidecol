@extends ('layouts.admin')
@section ('contenido')
@include('servicios.osts.encabezado')


@can('osts.index')
<section class="content">

	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Detalle del Servicio <strong>OST{{$osts->idost}}</strong></h3>

			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" osts-widget="collapse"><i class="fa fa-minus"></i>
				</button>
				<button type="button" class="btn btn-box-tool" osts-widget="remove"><i class="fa fa-times"></i></button>
			</div>
		</div>   

    <div class="box-body">
      <div class="container-fluid">

       @if(session()->has('success'))
       <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" osts-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> ¡Completado!</h4>
        {{session('success')}}    
      </div>
      @elseif(session()->has('danger'))
      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" osts-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-ban"></i> ¡Advertencia!</h4>
        {{session('danger')}}          
      </div>
      @elseif(session()->has('warning'))
      <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" osts-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-ban"></i> ¡Alerta!</h4>
        {{session('warning')}}          
      </div>
      @endif


      <div class="box-body">


        <!-- caja 1 -->

        <div class="row-specialdown " id="detalle">
          <div class="col-sm-12">
            <h3>Datos de la Orden de Servicio</h3>

            <div class="panel panel-default row-specialdown">
              <div class="row row-first"> 



                <!-- fila 1 -->

                <div class="col-xs-12 col-sm-6"> 
                  <div class="container-fluid">

                    <div class="row">
                      <div class="form-group">
                        <label for="name" class="col-xs-5 col-sm-5 control-label">Numero de Asignación:</label>
                        <div class="col-sm-7">
                          <span><p>{{$osts->idusers_ost}}</p></span>
                        </div> 
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group">
                        <label for="name" class="col-xs-5 col-sm-5 control-label">Tipo de Servicio: </label>
                        <div class="col-sm-7">
                          @switch($osts->tipo_os)
                          @case(1)
                          <span><p>1. Instalación</p></span>
                          @break

                          @case(2)
                          <span><p>2. Mantenimiento</p></span>
                          @break

                          @case(3)
                          <span><p>3. Garantía</p></span>
                          @break

                          @case(4)
                          <span><p>4. Otro</p></span>
                          @break

                          @default
                          <span><p>Campo vacío</p></span>
                          @endswitch

                        </div> 
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group">
                        <label for="name" class="col-xs-5 col-sm-5 control-label">Orden de Servicio:</label>
                        <div class="col-sm-7">
                          <span><a href="{{route('servicios.osts.show',['idost' => Crypt::encrypt($osts->ost_id)])}}">OST{{$osts->ost_id}}</a></span>
                        </div> 
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group">
                        <label for="name" class="col-xs-5 col-sm-5 control-label">Fecha sugerida  OST:</label>
                        <div class="col-sm-7">
                          <span><p>{{$osts->fecha_asg}}</p></span>
                        </div> 
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group">
                        <label for="name" class="col-xs-5 col-sm-5 control-label">Fecha de creación OST :</label>
                        <div class="col-sm-7">
                          <span><p>{{$osts->created_at}}</p></span>
                        </div> 
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group">
                        <label for="name" class="col-xs-5 col-sm-5 control-label">Ultima edición a OST :</label>
                        <div class="col-sm-7">
                          <span><p>{{$osts->updated_at}}</p></span>
                        </div> 
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group">
                        <label for="name" class="col-xs-5 col-sm-5 control-label">Estado de OST :</label>
                        <div class="col-sm-7">
                          @switch($osts->estado_os)

                          @case(0)
                          <strong><p style="color: red;">PreOrden <br> de servicio</p></strong>
                          @break

                          @case(1)
                          <strong><p style="color: red;"> Sin Asignar</p></strong>
                          @break

                          @case(2)
                          <p>Esperando aprobación <br> del técnico</p>
                          @break

                          @case(3)
                          <p>Asignado <br>con cita</p>
                          @break

                          @case(4)
                          <strong><p>Acepdado <br> por el Cliente</p></strong>
                          @break

                          @case(5)
                          <p>Sin contacto</p>
                          @break

                          @case(6)
                          <strong><p style="color: red">Rechazado <br>por el técnico</p></strong>

                          @break

                          @case(7)
                          <strong><p style="color: olive">Rechazado <br>por el cliente</p></strong>
                          @break

                          @case(8)
                          <strong><p style="color: red">Critico <br> por atraso</p></strong>
                          @break

                          @case(9)
                          <strong><p style="color: red;">Completado</p></strong>
                          @break

                          @case(10)
                          <strong><p>Cancelado por la admin</p></strong>
                          @break

                          @default
                          <p style="color: red">Sin información</p>
                          @break

                          @endswitch
                        </div> 
                      </div>
                    </div>



                  </div>
                </div>


                <!-- fin fila 1 -->

                <!-- fila 2 -->

                <div class="col-xs-12 col-sm-6">
                  <div class="container-fluid">

                    <div class="row">
                      <div class="form-group">
                        <label for="name" class="col-xs-5 col-sm-5 control-label">Técnico:</label>
                        <div class="col-sm-7">
                          <span><p>{{$tecnico->name}} {{$tecnico->apellidos}}</p></span>
                        </div> 
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group">
                        <label for="name" class="col-xs-5 col-sm-5 control-label">Correo:</label>
                        <div class="col-sm-7">
                          <span><p>{{$tecnico->email}}</p></span>
                        </div> 
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group">
                        <label for="name" class="col-xs-5 col-sm-5 control-label">Celular:</label>
                        <div class="col-sm-7">
                          <span><p>{{$tecnico->celular}}</p></span>
                        </div> 
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group">
                        <label for="name" class="col-xs-5 col-sm-5 control-label">Organización:</label>
                        <div class="col-sm-7">
                          <span><p>{{$tecnico->nit}} - {{$tecnico->razonsocial}}</p></span>
                        </div> 
                      </div>
                    </div>

                  </div>
                </div>
                <!-- fin fila 2 -->

              </div>
            </div>
          </div>
        </div> 

        <!-- fin caja 1 -->


        <!-- caja 2 -->
        <div class="row-specialdown " id="detalle">
          <div class="col-sm-12">
            <h3>Datos Cliente</h3>

            <div class="panel panel-default row-specialdown">
              <div class="row row-first"> 

                <!-- fila 1 -->

                <div class="col-xs-12 col-sm-6"> 
                  <div class="container-fluid">


                    <div class="row">
                      <div class="form-group">
                        <label for="name" class="col-xs-5 col-sm-5 control-label">Persona de Contacto:</label>
                        <div class="col-sm-7">
                          <span><p><strong>{{$osts->contacto}}</strong></p></span>
                        </div> 
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group">
                        <label for="name" class="col-xs-5 col-sm-5 control-label">Dirección:</label>
                        <div class="col-sm-7">
                          <span><p>{{$osts->direccion}}</p></span>
                        </div> 
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group">
                        <label for="name" class="col-xs-5 col-sm-5 control-label">Cuidad:</label>
                        <div class="col-sm-7">
                          <span><p>{{$osts->departamento}} - {{$osts->municipio}}</p></span>
                        </div> 
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group">
                        <label for="name" class="col-xs-5 col-sm-5 control-label">E-mail:</label>
                        <div class="col-sm-7">
                          <span><p>{{$osts->email}}</p></span>
                        </div> 
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group">
                        <label for="name" class="col-xs-5 col-sm-5 control-label">Celular:</label>
                        <div class="col-sm-7">
                          <span><p>{{$osts->celular}}</p></span>
                        </div> 
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group">
                        <label for="name" class="col-xs-5 col-sm-5 control-label">Teléfono:</label>
                        <div class="col-sm-7">
                          <span><p>{{$osts->telefono}}</p></span>
                        </div> 
                      </div>
                    </div> 

                  </div>
                </div>



                <!-- fin fila 1 -->

                <!-- fila 2 -->

                <div class="col-xs-12 col-sm-6">
                  <div class="container-fluid">


                    <div class="row">
                      <div class="form-group">
                        <label for="name" class="col-xs-5 col-sm-5 control-label">Falla:</label>
                        <div class="col-sm-7">
                          <span><p>{{$osts->falla}}</p></span>
                        </div> 
                      </div>
                    </div> 

                    <div class="row">
                      <div class="form-group">
                        <label for="name" class="col-xs-5 col-sm-5 control-label">Estado Garantía:</label>
                        <div class="col-sm-7">
                          <span><p>{{$osts->estado_garantia}}</p></span>
                        </div> 
                      </div>
                    </div> 

                    <div class="row">
                      <div class="form-group">
                        <label for="name" class="col-xs-5 col-sm-5 control-label">Numero Factura:</label>
                        <div class="col-sm-7">
                          <span><p>{{$osts->nro_factura}}</p></span>
                        </div> 
                      </div>
                    </div> 

                    <div class="row">
                      <div class="form-group">
                        <label for="name" class="col-xs-5 col-sm-5 control-label">Numero Serie:</label>
                        <div class="col-sm-7">
                          <span><p>{{$osts->nro_serie}}</p></span>
                        </div> 
                      </div>
                    </div> 

                    <div class="row">
                      <div class="form-group">
                        <label for="name" class="col-xs-5 col-sm-5 control-label">Observaciones:</label>
                        <div class="col-sm-7">
                          <span><p rows="3">{{$osts->observaciones}}</p></span>
                        </div> 
                      </div>
                    </div> 

                  </div>
                </div>
                <!-- fin fila 2 -->


              </div>
            </div>
          </div>
        </div>
        <!-- fin caja 2 -->

        <div class="row-specialfirst">
          <div class="col-sm-12">
            <h3>Productos de la Orden de Servicio</h3>

            <div class="panel panel-info row-specialfirst">

              <div class="container-fluid" id="cf_table">

                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                  <div class="table-responsive">
                    <br>
                    <table id="tabla" class="table table-striped table-bordered table-responsed table-hover">
                      <caption></caption>

                      <thead>

                        <th>id</th>
                        <th>Referencia</th>
                        <th>Categoría</th>              
                        <th>Marca</th>              

                      </thead>

                      <tfoot>
                        <tr>
                         <th></th>
                         <th></th>         
                         <th></th>
                         <th></th>

                       </tr>               
                     </tfoot>

                     <tbody> 
                      @foreach($productos as $producto)
                      <tr>

                        <td>{{$producto->idproducto}}</td>
                        <td>{{$producto->referencia}}</td>         
                        <td>{{$producto->categoria}}</td>
                        <td>{{$producto->marca}}</td>

                      </tr>

                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

        </div></div>




      </div>
    </div>
  </div>

<!--          <div class="col-sm-12">
         <div class="col-sm-3 text-center" style="padding-bottom: 5px; padding-top: 5px"></div>
         <div class="col-sm-2 text-center" style="padding-bottom: 5px; padding-top: 5px"></div>
         <div class="col-sm-2 text-center" style="padding-bottom: 5px; padding-top: 5px">


           <a href="{{route('servicios.osts.index')}}" class="btn btn-info btn_end" id="back" >Atras</a><br>
           <a href="{{ URL::previous() }}" class="btn btn-info btn_end" id="back" >Atrás</a><br>

         </div>
         <div class="col-sm-2 text-center"  style="padding-bottom: 5px; padding-top: 5px"></div>
         <div class="col-sm-3 text-center" style="padding-bottom: 5px; padding-top: 5px"></div>

       </div>
     -->

     <div class="box-footer " id="guardar">
      <div class="container-fluid">
        <div class="row-bottons">

         @switch($osts->estado_os)
         @case(0)
         @case(1)
         @case(2)
         @case(3)
         @case(4)
         @case(5)
         @case(6)
         @case(7)
         @case(8)
         @case(9)
         @case(10)
         <div class="col-sm-12 text-center">
           <a href="{{ URL::previous() }}" class="btn btn-info btn_end" id="back" >Atrás</a><br>
         </div>
         @break

         @default
         <span><p>Sin información</p></span>
         @endswitch


       </div>
     </div>
   </div>
 </div>

</section>

@endcan
@endsection
