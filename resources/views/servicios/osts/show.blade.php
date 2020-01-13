@extends ('layouts.admin')
@section ('contenido')
@include('servicios.osts.encabezado')


@can('osts.show')
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

        <div class="row-specialdown " id="detalle" >
          <div class="row" style="margin-top: 0px; padding-left: 15px;" >
            <div class="col-sm-4" >
              <h3>Datos de la Orden de Servicio</h3>         
            </div>
            <div class="col-sm-4  text-center">
              <a href="{{route('impresion.osts.imprimir',$osts->ost_id)}}" style="margin-top: 17px;" class="btn btn-danger btn_end" id="back" >Imprimir &nbsp; <i class="fa fa-print"></i></a>        
            </div>            
          </div>
          <div class="col-sm-12" >

            <div class="panel panel-default row-specialdown">
              <div class="row row-first"> 



                <!-- fila 1 -->

                <div class="col-xs-12 col-sm-6"> 
                  <div class="container-fluid">

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
                        <label for="name" class="col-xs-5 col-sm-5 control-label">Numero de Orden:</label>
                        <div class="col-sm-7">
                          <span>OST{{$osts->ost_id}}</span>
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
                          <strong><p>Servicio Completado</p></strong>
                          @break

                          @case(9)
                          <strong><p>Rechazado por el técnico</p></strong>
                          @break

                          @case(10)
                          <strong><p>En espera</p></strong>
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
                          <span><p><strong>{{$osts->contacto_ost}}</strong></p></span>
                        </div> 
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group">
                        <label for="name" class="col-xs-5 col-sm-5 control-label">Tipo de Documento:</label>
                        <div class="col-sm-7">
                          @switch($osts->tipo_doc)

                          @case(0)
                          <span><p>Por seleccionar</p></span>
                          @break

                          @case(1)
                          <span><p>Cédula de Ciudadanía</p></span>
                          @break

                          @case(2)
                          <span><p>Cédula de Extranjería</p></span>
                          @break

                          @case(3)
                          <span><p>Pasaporte</p></span>
                          @break

                          @case(4)
                          <span><p>Otro</p></span>
                          @break

                          @default
                          <span><p>Sin información</p></span>                          
                          @break
                          @endswitch

                        </div> 
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group">
                        <label for="name" class="col-xs-5 col-sm-5 control-label">Numero Documento:</label>
                        <div class="col-sm-7">
                          <span><p>{{$osts->numero_doc}}</p></span>
                        </div> 
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group">
                        <label for="name" class="col-xs-5 col-sm-5 control-label">E-mail:</label>
                        <div class="col-sm-7">
                          <span><p>{{$osts->email_ost}}</p></span>
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
                        <label for="name" class="col-xs-5 col-sm-5 control-label">Celular:</label>
                        <div class="col-sm-7">
                          <span><p>{{$osts->celular_ost}}</p></span>
                        </div> 
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group">
                        <label for="name" class="col-xs-5 col-sm-5 control-label">Teléfono:</label>
                        <div class="col-sm-7">
                          <span><p>{{$osts->telefono_ost}}</p></span>
                        </div> 
                      </div>
                    </div> 

                    <div class="row">
                      <div class="form-group">
                        <label for="name" class="col-xs-5 col-sm-5 control-label">Dirección:</label>
                        <div class="col-sm-7">
                          <span><p>{{$osts->direccion_ost}}</p></span>
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
