@extends ('layouts.admin')
@section ('contenido')
@include('servicios.talleres.osts.encabezado')



<section class="content">

  {!!Form::model($data,['method'=>'PUT','route'=>['servicios.talleres.osts.update_uo',$data->idusers_ost],'files'=>'true'])!!}
  {{Form::token()}}


  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Editar Asignación</h3>
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

          <div class="row row-frist">
            <div class="col-xs-12 col-sm-6">
             <div class="form-group">
              <label for="ost_id" class="col-xs-12 col-sm-4" >Orden de Servicio:</label>
              <div class="col-sm-8">
                <strong><p>OST{{$data->ost_id}}</p></strong>
                <input type="hidden" name="ost_id" id="ost_id" value="{{$data->ost_id}}">
              </div>          
            </div>
          </div>
        </div>


        <div class="row"> 

          <div class="col-xs-12 col-sm-6">
            <div class="form-group">
              <label for="fecha_asg" class="col-xs-12 col-sm-4">Fecha de la orden</label>
              <div class="col-sm-8">
               <div class="input-group date">
                <input type="text" class="form-control pull-right" id="fecha_asg" name="fecha_asg" value="{{$data->fecha_asg}}">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xs-12 col-sm-6">
         <div class="form-group">
          <label for="users_id" class="col-xs-12 col-sm-4" >Tecnico</label>
          <div class="col-sm-8">

            <select id="users_id" name="users_id" class="selectpicker form-control"  data-live-search="true" id="users_id" required autofocus="autofocus" onfocus="this.select()">
              @foreach($tecnicos as $user)

              @if($data->users_id==$user->users_id)            
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




    </div>

    <div class="row"> 


      <div class="col-xs-12 col-sm-6">
       <div class="form-group">
        <label for="jornada" class="col-xs-12 col-sm-4" >Jornada del Servicio</label>
        <div class="col-sm-8">
          <select id="jornada" name="jornada" class="selectpicker form-control" data-live-search="true" id="jornada" required>

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

    <div class="col-xs-12 col-sm-6">
     <div class="form-group">
      <label for="estado_uo" class="col-xs-12 col-sm-4" >Estado de la orden</label>
      <div class="col-sm-8">
        <select id="estado_uo" name="estado_uo" class="selectpicker form-control" data-live-search="true" required>


          @switch($data->estado_uo)

          @case(1)
          <option value="1" selected="selected">Asignado sin contacto</option>
          <option value="2">Cita Aceptada en progreso</option>
          <option value="3">Rechazado por el cliente</option>
          <option value="4">Rechazado por el técnico</option>
          <option value="5">Sin respuesta del cliente</option>
          <option value="6">Reasignado</option>
          <option value="7">Critico por atraso</option>
          <option value="8">Aceptada por el cliente</option>
          @break    

          @case(2)
          <option value="1">Asignado sin contacto</option>
          <option value="2" selected="selected">Cita Aceptada en progreso</option>
          <option value="3">Rechazado por el cliente</option>
          <option value="4">Rechazado por el técnico</option>
          <option value="5">Sin respuesta del cliente</option>
          <option value="6">Reasignado</option>
          <option value="7">Critico por atraso</option>
          <option value="8">Aceptada por el cliente</option>
          @break    

          @case(3)
          <option value="1">Asignado sin contacto</option>
          <option value="2">Cita Aceptada en progreso</option>
          <option value="3" selected="selected">Rechazado por el cliente</option>
          <option value="4">Rechazado por el técnico</option>
          <option value="5">Sin respuesta del cliente</option>
          <option value="6">Reasignado</option>
          <option value="7">Critico por atraso</option>
          <option value="8">Aceptada por el cliente</option>
          @break    

          @case(4)
          <option value="1">Asignado sin contacto</option>
          <option value="2">Cita Aceptada en progreso</option>
          <option value="3">Rechazado por el cliente</option>
          <option value="4" selected="selected">Rechazado por el técnico</option>
          <option value="5">Sin respuesta del cliente</option>
          <option value="6">Reasignado</option>
          <option value="7">Critico por atraso</option>
          <option value="8">Aceptada por el cliente</option>
          @break    

          @case(5)
          <option value="1">Asignado sin contacto</option>
          <option value="2">Cita Aceptada en progreso</option>
          <option value="3">Rechazado por el cliente</option>
          <option value="4">Rechazado por el técnico</option>
          <option value="5" selected="selected">Sin respuesta del cliente</option>
          <option value="6">Reasignado</option>
          <option value="7">Critico por atraso</option>
          <option value="8">Aceptada por el cliente</option>
          @break    

          @case(6)
          <option value="1">Asignado sin contacto</option>
          <option value="2">Cita Aceptada en progreso</option>
          <option value="3">Rechazado por el cliente</option>
          <option value="4">Rechazado por el técnico</option>
          <option value="5">Sin respuesta del cliente</option>
          <option value="6" selected="selected">Reasignado</option>
          <option value="7">Critico por atraso</option>
          <option value="8">Aceptada por el cliente</option>
          @break    

          @case(7)
          <option value="1">Asignado sin contacto</option>
          <option value="2">Cita Aceptada en progreso</option>
          <option value="3">Rechazado por el cliente</option>
          <option value="4">Rechazado por el técnico</option>
          <option value="5">Sin respuesta del cliente</option>
          <option value="6">Reasignado</option>
          <option value="7" selected="selected">Critico por atraso</option>
          <option value="8">Aceptada por el cliente</option>
          @break    

          @case(8)
          <option value="1">Asignado sin contacto</option>
          <option value="2">Cita Aceptada en progreso</option>
          <option value="3">Rechazado por el cliente</option>
          <option value="4">Rechazado por el técnico</option>
          <option value="5">Sin respuesta del cliente</option>
          <option value="6">Reasignado</option>
          <option value="7">Critico por atraso</option>
          <option value="8">Aceptada por el cliente</option>
          @break    

          @case(8)
          <option disabled="true"  selected="selected">Seleccione &hellip;</option>
          <option value="1">Asignado sin contacto</option>
          <option value="2">Cita Aceptada en progreso</option>
          <option value="3">Rechazado por el cliente</option>
          <option value="4">Rechazado por el técnico</option>
          <option value="5">Sin respuesta del cliente</option>
          <option value="6">Reasignado</option>
          <option value="7">Critico por atraso</option>
          <option value="8" selected="selected">Aceptada por el cliente</option>       
          @break

          @default
          <option disabled="true"  selected="selected">Seleccione &hellip;</option>
          <option value="1">Asignado sin contacto</option>
          <option value="2">Cita Aceptada en progreso</option>
          <option value="3">Rechazado por el cliente</option>
          <option value="4">Rechazado por el técnico</option>
          <option value="5">Sin respuesta del cliente</option>
          <option value="6">Reasignado</option>
          <option value="7">Critico por atraso</option>
          <option value="8">Aceptada por el cliente</option>       
          <option value="9" selected="selected">Sin información</option>       
          @break

          @endswitch
        </select>                                              
      </div>          
    </div>
  </div>
</div>

<div class="row"> 
  <div class="col-sm-12 col-md-12 col-xs-12">
    <div class="form-group  " align="center">
      <button class="btn btn-primary" type="button" id="bt_add" >Confirmar</button>   
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

      @if($data->estado_uo=4)
      <button class="btn btn-danger btn_end" type="submit" > Reasignar </button>

      @else
      <button class="btn btn-danger btn_end" type="submit" > Guardar </button>
      @endif


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
  $("#guardar").hide();
  var selects = 0;

  $(document).ready(function(){
   $('#bt_add').click(function(){
    comprobar();
  });
 });

  function mostrar(){

    var user_id=$("#users_id").val();
    var idost=$("#ost_id").val();
    var fecha_asg=$("#fecha_asg").val();
    var jornada=$("#jornada").val();
    var estado_uo=$("#estado_uo").val();
    console.log(estado_uo);

    if (fecha_asg!="" && user_id != null && idost != null && jornada!= null && jornada!= null) {
      $("#guardar").show();

    }
    else{

     $("#guardar").hide();

     alert("Complete la selección antes de continuar");
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
      alert("En esta fecha y jornada no se pueden asignar mas servicios a este técnico, por favor cambie los datos.");
    }else if (data == 1 ){
      alert("Señor usuario, usted esta reasignando  servicio para este técnico en esta fecha y jornada.");
      mostrar();      
    }else if (data == 0) {
      mostrar();
      
    }
  })
  .fail(function() {
    console.log("error");
  })
  .always(function() {
    console.log("complete");
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






