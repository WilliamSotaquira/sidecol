@extends ('layouts.admin')
@section ('contenido')
@include('servicios.eventososts.encabezado')


<section class="content">

  {!!Form::model($data,['method'=>'PUT','route'=>['servicios.eventososts.update',$data->idusers_ost],'files'=>'true'])!!}
  {{Form::token()}}


  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Confirmación de la asignación de la orden de Servicio OST{{$data->ost_id}}</h3>
      <input type="hidden" name="idusers_ost" value="{{$data->idusers_ost}}">
      <input type="hidden" name="tipo_os" value="{{$osts->tost}}">
      <input type="hidden" name="iddetalleost" value="{{$osts->iddetalleost}}">

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse">
          <i class="fa fa-minus"></i>
        </button>
      </div>
    </div>

    @if (count($errors)>0)
    <div class="alert alert-danger"> 
      <ul>
        @foreach ($errors->all() as $error)
        <li>
          {{$error}}
        </li>
        @endforeach
      </ul>
    </div>
    @endif


    <div class="container-fluid">
      <div class="box-body">
        <div class="col-xs-12 col-sm-12">

          <!-- caja 2 -->
          <div class="row-specialdown " id="detalle">
            <div class="col-sm-12">

              @switch($osts->tost)

              @case(1)   
              <h3>Datos Cliente -  Instalación</h3>
              @break

              @case(2)
              <h3>Datos Cliente -  Mantenimiento</h3>
              @break

              @case(3)
              <h3>Datos Cliente -  Garantía</h3>
              @break

              @case(4)
              <h3>Datos Cliente -  Otro</h3>
              @break

              @default                     
              <h3>Datos Cliente -  Sin información</h3>
              @break                     

              @endswitch


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

                      <div class="row">
                        <div class="form-group">
                          <label for="name" class="col-xs-5 col-sm-5 control-label">E-mail:</label>
                          <div class="col-sm-7">
                            <span><p>{{$osts->user_mail}}</p></span>
                          </div> 
                        </div>
                      </div>

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

                      <input type="hidden" name="huesped" id="huesped" value="{{Auth::id()}}">

                    </div>
                  </div>



                  <!-- fin fila 1 -->

                  <!-- fila 2 -->

                  <div class="col-xs-12 col-sm-6">
                    <div class="container-fluid">


                      <div class="row">
                        <div class="form-group">
                          <label for="falla" class="col-xs-12 col-sm-4 control-label">Falla *</label>
                          <div class="col-sm-7">
                            <input type="text" class="form-control" autocomplete="autocomplete" name="falla" id="falla" value="{{$osts->falla}}" required="required">
                          </div></div> 
                        </div>


                        <div class="row">
                          <div class="form-group">
                            <label for="estado_garantia" class="col-xs-12 col-sm-4 control-label">Estado Garantía</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" autocomplete="autocomplete" name="estado_garantia" id="estado_garantia" value="{{$osts->estado_garantia}}" >
                            </div></div> 
                          </div>


                          <div class="row">
                            <div class="form-group">
                              <label for="nro_factura" class="col-xs-12 col-sm-4 control-label">Numero Factura</label>
                              <div class="col-sm-7">
                                <input type="text" class="form-control" autocomplete="autocomplete" name="nro_factura" id="nro_factura" value="{{$osts->nro_factura}}" >
                              </div></div> 
                            </div>


                            <div class="row">
                              <div class="form-group">
                                <label for="nro_serie" class="col-xs-12 col-sm-4 control-label">Numero Serie </label>
                                <div class="col-sm-7">
                                  <input type="text" class="form-control" autocomplete="autocomplete" name="nro_serie" id="nro_serie" value="{{$osts->nro_serie}}" >
                                </div></div> 
                              </div>


                              <div class="row">
                                <div class="form-group">
                                  <label for="observaciones" class="col-xs-12 col-sm-4 control-label">Observaciones *</label>
                                  <div class="col-sm-7">
                                    <textarea name="observaciones" id="observaciones" class="form-control" rows="3" required="required">{{$osts->observaciones}}</textarea>
                                  </div></div> 
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

                        <div class="panel panel-default row-specialfirst">

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

                    <div class="row row-frist">
                      <div><br>&nbsp;</div>

                      <div class="col-xs-12 col-sm-6">
                       <div class="form-group">
                        <label for="ost_id" class="col-xs-12 col-sm-4" >Orden de Servicio:</label>
                        <div class="col-sm-8">
                          <strong><p>OST{{$data->ost_id}}</p></strong>
                          <input type="hidden" name="ost_id" id="ost_id" value="{{$data->ost_id}}">
                        </div>          
                      </div>
                    </div>

                    <span id="user">
                      <div class="col-xs-12 col-sm-6">
                       <div class="form-group">
                        <label for="users_id" class="col-xs-12 col-sm-4" >Tecnico</label>
                        <div class="col-sm-8">

                          <select id="users_id" name="users_id" class="selectpicker form-control"  data-live-search="true">
                            @foreach($tecnicos as $user)

                            @if($data->users_id==$user->id)            
                            <option value="{{$user->id}}" selected="selected">
                              {{$user->name}} {{$user->apellidos}} | {{$user->razonsocial}}
                            </option>
                            @else
                            <option value="{{$user->id}}" >
                              {{$user->name}} {{$user->apellidos}} | {{$user->razonsocial}}
                            </option>
                            @endif


                            @endforeach

                          </select>                                              
                        </div>          
                      </div>
                    </div>
                  </span>
                </div>


                <div class="row"> 

                  <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                      <label for="fecha_asg" class="col-xs-12 col-sm-4">Fecha de la orden</label>
                      <div class="col-sm-8">
                       <div class="input-group date">
                        <input type="text" class="form-control pull-right" id="fecha_asg" name="fecha_asg" value="{{$data->fecha_asg}}" required="required">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>    

                <div class="col-xs-12 col-sm-6">
                 <div class="form-group">
                  <label for="jornada" class="col-xs-12 col-sm-4" >Jornada del Servicio</label>
                  <div class="col-sm-8">
                    <select id="jornada" name="jornada" class="selectpicker form-control" data-live-search="true" id="jornada" >

                      @switch($data->jornada)

                      @case(1)
                      <option value="1" selected="selected">Mañana</option>
                      <option value="2">Tarde</option>
                      @break

                      @case(2)
                      <option value="1">Mañana</option>
                      <option value="2" selected="selected">Tarde</option>          
                      @break

                      @default
                      <option disabled="true"  selected="selected">Seleccione &hellip;</option>
                      <option value="1">Mañana</option>
                      <option value="2">Tarde</option>         
                      @break

                      @endswitch


                    </select>                                              
                  </div>          
                </div>
              </div>           

            </div>

            <div class="row"> 
              <div class="col-sm-12 col-md-12 col-xs-12">
                <div class="form-group" align="center">
                  <div>
                    <br>
                  </div>
                  <button class="btn btn-primary" type="button" id="bt_add" >Confirmar Contacto</button>   
                </div>          
              </div>
            </div>








          </div>
        </div>
      </div>

      <div class="box-footer " id="guardar">
        <div class="row">
          <div class="col-sm-12">

            <div class="col-xs-0 col-sm-0 col-lg-3 text-center" style="padding-bottom: 5px; padding-top: 5px"></div>
            <div class="col-xs-12 col-sm-4 col-lg-2 text-center" style="padding-bottom: 5px; padding-top: 5px">

              <a href="{{ URL::previous() }}" class="btn btn-info btn_end" id="back" >Atras</a><br>

            </div>
            <div class="col-xs-12 col-sm-4 col-lg-2 text-center" style="padding-bottom: 5px; padding-top: 5px">


             <a href="{{route('servicios.usersosts.edit',$data->idusers_ost)}}" class="btn btn-default btn_end" id="back" >Limpiar</a><br>

           </div>
           <div class="col-xs-12 col-sm-4 col-lg-2 text-center"  style="padding-bottom: 5px; padding-top: 5px">


            <button class="btn btn-success btn_end" type="submit" > Guardar </button>


          </div>
          <div class="col-xs-0 col-sm-0 col-lg-3 text-center" style="padding-bottom: 5px; padding-top: 5px"></div>

        </div>

      </div>


    </div>

  </div>
  {!!Form::close()!!}
</section>
@endsection

@section('scripts')
<script>
  $(document).ready(function(){
    tipousuario();
  });

  var ef = 0;

  $("#guardar").hide();
  var selects = 0;


  $(document).ready(function(){
   $('#bt_add').click(function(){
    if (ef>0) {
      comprobar();
    }else {
      alert('Recuerde que estos datos ya deben estar acordados con el cliente');
      mostrar();
    };
  });
 });

  $(document).ready(function(){
   $('#fecha_asg').change(function(){
     ef=ef+1;
   });
 }); 

  $(document).ready(function(){
   $('#jornada').change(function() {
    ef=ef+1;
    console.log(ef);
  });
 });

  function mostrar(){

    var user_id=$("#users_id").val();
    var idost=$("#ost_id").val();
    var fecha_asg=$("#fecha_asg").val();
    var jornada=$("#jornada").val();
    var estado_uo=$("#estado_uo").val();

    if (fecha_asg!="" && user_id != null && idost != null && jornada!= null) {
      $("#guardar").show();
      contacto();


    }
    else{

     $("#guardar").hide();

     if(fecha_asg ==""){
       alert("Seleccione fecha de la orden se servicio antes de continuar");
     } 
     else if (user_id == null) {
      alert("Seleccione el técnico del servicio antes de continuar");
    }
    else if (idost == null) {
      alert("Seleccione el idost del servicio antes de continuar");
    }
    else if (jornada == null) {
      alert("Seleccione el jornada del servicio antes de continuar");
    }
    

  };
} 

function comprobar(){

  var user_id=$("#users_id").val();
  var fecha_asg=$("#fecha_asg").val();
  var jornada=$("#jornada").val();


  $.ajax({
    url:'/api/sidecol/comprobar/',
    type: 'GET',
    data: {
      id: user_id,
      fecha: fecha_asg,
      jornada: jornada
    },
  })
  .done(function(data) {
    console.log(data);

    if (data==2) {
      alert("En esta fecha y jornada no se pueden reasignar mas servicios, por favor cambie los datos.");
    }else if (data == 1 ){
      alert("Señor usuario, usted esta reasignando el ultimo servicio en esta fecha y jornada.");
      mostrar(); 

    }else if (data == 0) {
      mostrar();      
    }
    else {
      alert("En esta fecha y jornada no se pueden reasignar mas servicios, por favor cambie los datos.");   
      $("#guardar").hide();

    }
  })
  .fail(function() {
    console.log("error");
    $("#guardar").hide();

  })
  .always(function() {
    console.log("complete");

  });    

}

function tipousuario() {

  huesped = $("#huesped").val();
  // console.log('huesped: '+huesped);

  $.ajax({
    url:'/api/sidecol/tipousuario/',  
    data: {
      id: huesped,
    }, 
  })
  .done(function(data) {
    console.log("success");
    console.log(data);
    if (data == 13){
      $( "#user" ).attr('style','visibility:hidden');

    }
  })
  .fail(function() {
    console.log("error");
  })
  .always(function() {
    console.log("complete");
  });



}

function contacto(){

  var idost=$("#ost_id").val(); 

  console.log(idost);

  $.ajax({
    url: '/api/sidecol/contacto/',
    data: {
      id: idost,
    },
  })
  .done(function(data) {
    console.log("success contacto"+data);
  })
  .fail(function(data) {
    console.log("error contacto"+data);
  })
  .always(function(data) {
    console.log("complete contacto"+data);
  });
  

}



$( function() {
  $( "#fecha_asg" ).datepicker();
} );

</script>
<script type="text/javascript">
  $('#timepicker1').timepicker();
</script>
@endsection






