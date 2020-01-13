@extends ('layouts.admin')
@section ('contenido')
@include('servicios.usersosts.encabezado')


@can('osts.index')
<section class="content">

	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Detalle de la Asignación del Servicio</h3>

			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
				</button>
				<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
			</div>
		</div>   

    <div class="box-body">
      <div class="container-fluid">


        <div class="box-body">



          <div class="row-specialdown " id="detalle">
            <div class="col-sm-12">
             <div class="panel panel-default row-specialdown">
              <div class="row row-first"> 

                <!-- fila 1 -->

                <div class="col-xs-12 col-sm-6"> 
                  <div class="container-fluid">

                    <div class="row">
                      <div class="form-group">
                        <label for="name" class="col-xs-5 col-sm-5 control-label">Numero de Asignación:</label>
                        <div class="col-sm-7">
                          <span><p>{{$data->idusers_ost}}</p></span>
                        </div> 
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group">
                        <label for="name" class="col-xs-5 col-sm-5 control-label">Tipo de Servicio: </label>
                        <div class="col-sm-7">
                         @switch($data->tipo_os)
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
                        <span><a href="{{route('servicios.osts.show',['idost' => Crypt::encrypt($data->ost_id)])}}">OST{{$data->ost_id}}</a></span>
                      </div> 
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group">
                      <label for="name" class="col-xs-5 col-sm-5 control-label">Fecha sugerida  OST:</label>
                      <div class="col-sm-7">
                        <span><p>{{$data->fecha_asg}}</p></span>
                      </div> 
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group">
                      <label for="name" class="col-xs-5 col-sm-5 control-label">Fecha de creación OST :</label>
                      <div class="col-sm-7">
                        <span><p>{{$data->created_at}}</p></span>
                      </div> 
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group">
                      <label for="name" class="col-xs-5 col-sm-5 control-label">Ultima edición a OST :</label>
                      <div class="col-sm-7">
                        <span><p>{{$data->updated_at}}</p></span>
                      </div> 
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group">
                      <label for="name" class="col-xs-5 col-sm-5 control-label">Estado de OST :</label>
                      <div class="col-sm-7">

                        @switch($data->estado_os)

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
                        <strong><a href="{{route('servicios.eventososts.index')}}" class="btn btn-sm bg-navy">En espera</a></strong>
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
                        <span><p>{{$data->name}} {{$data->apellidos}}</p></span>
                      </div> 
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group">
                      <label for="name" class="col-xs-5 col-sm-5 control-label">Correo:</label>
                      <div class="col-sm-7">
                        <span><p>{{$data->email}}</p></span>
                      </div> 
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group">
                      <label for="name" class="col-xs-5 col-sm-5 control-label">Celular:</label>
                      <div class="col-sm-7">
                        <span><p>{{$data->celular}}</p></span>
                      </div> 
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group">
                      <label for="name" class="col-xs-5 col-sm-5 control-label">Organización:</label>
                      <div class="col-sm-7">
                        <span><p>{{$data->nit}} - {{$data->razonsocial}}</p></span>
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
    </div>
  </div>
</div>


<div class="box-footer " id="guardar">
  <div class="container-fluid">
    <div class="row-bottons">
      <div class="col-sm-12">
       <div class="col-sm-3 text-center" style="padding-bottom: 5px; padding-top: 5px"></div>
       <div class="col-sm-2 text-center" style="padding-bottom: 5px; padding-top: 5px"></div>
       <div class="col-sm-2 text-center" style="padding-bottom: 5px; padding-top: 5px">

        <!-- <a href="{{route('servicios.osts.index')}}" class="btn btn-info btn_end" id="back" >Atrás</a><br> -->
        <a href="{{ URL::previous() }}" class="btn btn-info btn_end" id="back" >Atrás</a><br>

      </div>
      <div class="col-sm-2 text-center"  style="padding-bottom: 5px; padding-top: 5px"></div>
      <div class="col-sm-3 text-center" style="padding-bottom: 5px; padding-top: 5px"></div>

    </div>
  </div>
</div>
</div>
</div>

</section>

@endcan
@endsection
