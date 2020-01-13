@extends ('layouts.admin')
@section ('contenido')
@include('servicios.usersosts.encabezado')



<section class="content">



  <div class="box box-primary">
    <div class="box-header with-border">
      @if($id!='0')
      <h3 class="box-title">Asignar el servicio numero: <strong>OST{{$id}}</strong></h3>
      <input type="hidden" name="valor" value="{{$id}}">
      @else
      <h3 class="box-title">Crear Nueva Asignación</h3>
      @endif


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

        <div class="row">
          <div class="col-xs-12 col-sm-12 ">
            <h3>Observaciones de la orden de servicio</h3>
            <div class="panel panel-default row-first">
             <div class="row row-first">  


              <div class="col-xs-firts-12 col-xs-12 col-sm-first-12 col-md-first-12 col-lg-10">



                <div class="form-group">
                  <label for="observaciones" class="col-xs-12 col-sm-4 control-label">Observaciones *</label>
                  <div class="col-sm-7">
                   <textarea name="observaciones" id="observaciones" class="form-control" rows="2" required="required" placeholder="Seleccione una orden de servicio tecnico..."></textarea>
                 </div></div> 
               </div>



             </div>
           </div>
         </div>
       </div>
       {!!Form::open(array('url'=>'servicios/usersosts/store','method'=>'POST','autocomplete'=>'off','files'=> true))!!}
       {{ csrf_field() }}
       <form>
        <div class="row">
          <div class="col-xs-12 col-sm-12 ">
           <div class="panel panel-default row-first">

             <div class="row row-first">  


              @if($id=='0')
              <div class="col-xs-firts-12 col-xs-12 col-sm-first-12 col-md-first-12 col-lg-4">

               <div class="form-group">
                <label for="ost_id" class="col-xs-12 col-sm-4" >Orden de Servicio</label>
                <div class="col-sm-8">
                  <select id="ost_id" name="ost_id" class="selectpicker form-control" data-live-search="true" required>

                    <option selected disabled="true">Seleccione &hellip;</option>  

                    @foreach($osts as $ost)  
                    <option value="{{$ost->idost}}">
                      OST{{$ost->idost}} |

                      @if($ost->tipo=1)
                      Instalación
                      @elseif($ost->tipo=2)
                      Mantenimiento
                      @elseif($ost->tipo=3)
                      Garantía
                      @elseif($ost->tipo=4)
                      Otro
                      @endif

                    </option>
                    @endforeach
                  </select>                                              
                </div>          
              </div>
            </div>
            @else

            <div class="col-xs-firts-12 col-xs-12 col-sm-first-12  col-md-first-12  col-lg-4">

             <div class="form-group">
              <label for="ost_id" class="col-xs-12 col-sm-4" >Orden de Servicio</label>
              <div class="col-sm-8">
                <select id="ost_id" name="ost_id" class="selectpicker form-control" data-live-search="true" id="ost_id" required>
                  @foreach($osts as $ost)  
                  <option value="{{$ost->idost}}"  selected ="true">
                    OST{{$ost->idost}} |

                    @if($ost->tipo=1)
                    Instalación
                    @elseif($ost->tipo=2)
                    Mantenimiento
                    @elseif($ost->tipo=3)
                    Garantía
                    @elseif($ost->tipo=4)
                    Otro
                    @endif
                  </option>  
                  @endforeach

                </select>                                              
              </div>          
            </div>
          </div>
          @endif             

          <div class="col-xs-12  col-sm-12  col-md-12  col-lg-4">

           <div class="form-group">
            <label for="users_id" class="col-xs-12 col-sm-4" >Tecnico</label>
            <div class="col-sm-8">

              <select id="users_id" name="users_id" class="selectpicker form-control"  data-live-search="true" id="users_id" required autofocus="autofocus" onfocus="this.select()">
                <option selected disabled="true">Seleccione &hellip;</option>  

                @foreach($users as $user)  
                <option value="{{$user->id}}">
                  {{$user->name}} {{$user->apellidos}} | {{$user->razonsocial}}
                </option>
                @endforeach

              </select>                                              
            </div>          
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-firts-12 col-xs-12 col-sm-first-12  col-md-first-12  col-lg-4">
          <div class="form-group">
            <label for="fecha_asg" class="col-xs-12 col-sm-4">Fecha de orden</label>
            <div class="col-sm-8">
             <div class="input-group date">
              <input type="text" class="form-control pull-right" id="fecha_asg" name="fecha_asg">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xs-12  col-sm-12  col-md-12  col-lg-4">
       <div class="form-group">
        <label for="jornada" class="col-xs-12 col-sm-4" >Jornada del Servicio</label>
        <div class="col-sm-8">
          <select id="jornada" name="jornada" class="selectpicker form-control" data-live-search="true" id="jornada" required>
            <option selected disabled="true">Seleccione &hellip;</option>
            <option value="1">Mañana</option>
            <option value="2">Tarde</option>

          </select>                                              
        </div>          
      </div>
    </div>
    <div class="col-xs-12  col-sm-12  col-md-12  col-lg-1">
      &nbsp;       
    </div>

    <div class="col-xs-12  col-sm-12  col-md-12  col-lg-1">

      <div class="form-group  " align="center">
       <a  class="btn btn-primary" name="bt_add" id="bt_add" title="">Confirmar</a>
     </div>          
   </div>
 </div>
 <input type="hidden" name="estado_uo" value="1">
 <input type="hidden" name="user_asg" value="{{Auth::id()}}">


</div>


<div class="box-footer " id="guardar">
  <div class="container-fluid">
    <div class="row-bottons">

      <div class="col-xs-0 col-sm-12 col-md-12 col-lg-3 text-center" style="padding-bottom: 5px; padding-top: 5px"></div>
      <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 text-center" style="padding-bottom: 5px; padding-top: 5px">

        <button class="btn btn-success btn_end" type="submit" > Guardar </button>

      </div>

      <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 text-center"  style="padding-bottom: 5px; padding-top: 5px">

        <a href="{{route('servicios.usersosts.index')}}" class="btn btn-info btn_end" id="back" >Atrás</a><br>

      </div>
      <div class="col-xs-0 col-sm-12 col-md-3 col-lg-3 text-center" style="padding-bottom: 5px; padding-top: 5px"></div>

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
    var valor=$("#valor").val();
    if(valor != 0){
      cargardatos();
    }
  });

$(document).ready(function(){
    $('#ost_id').change(function() {
      cargardatos();
    });
  });

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
    // console.log(fecha_asg);

    if (fecha_asg!="" && user_id != null && idost != null && jornada!= null) {
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
      alert("Señor usuario, usted esta asignando el ultimo servicio para este técnico en esta fecha y jornada.");
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

function cargardatos(){

  var idost =$("#ost_id").val();
  console.log(idost);
  $("#observaciones").val('');

  $.ajax({
    url: '/api/sidecol/cargardatos/',
    type: 'GET',
    data: {
      id: idost,
    },
  })
  .done(function(data) {
    console.log(data);

    $("#observaciones").val(data);
    console.log("success");

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




