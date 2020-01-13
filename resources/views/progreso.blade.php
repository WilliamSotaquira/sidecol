        @extends('layouts.app')


        @section('content')
        <div class="container-preorder">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header"><h5>Progreso de la orden de servicio</h5></div>

                <div class="card-body">

                  <div class="row text-center align-items-center" style="width: 100%;"> 
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 ">
                      <div class="row-first">
                        <center><h5>Señor usuario</h5><p>Su orden de servicio esta siendo atendida por técnicos autorizados por Idea Colombia S.A.S. Recuerde nuestras politicas de garantia .</p><strong><a href="{{asset('politicas/CERTIFICADO%20DE%20GARANT%C3%8DA%20ARISTON.PDF') }}" title="">Ariston</a></strong>, <strong><a href="{{asset('politicas/CERTIFICADO%20DE%20GARANT%C3%8DA%20AirOn.pdf') }}" title="">AirOn</a></strong> </center>
                      </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                      <!-- <h5>Progreso de la orden de servicio</h5> -->
                      <div class="row align-items-center justify-content-center" style="height: 100%">
                        <div class="form-group" style=" align-items: center;">
                          <input type="text" id="progreso" class="knob" value="{{$estado}}"  data-min="0" data-max="8" data-width="110" data-height="110" data-fgColor="#f56954" data-readOnly="true">
                          <div class="knob-label">Progreso de la orden de servicio</div>
                        </div>                                                
                      </div>
                    </div>


                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 ">
                     
                      <div class="container-fluid" style="margin: auto;">
                        <div class="row-first"> 
                          <div class="input-control">
                            <input class="form-group" type="checkbox" id="paso1"><a title="Su orden se servicio ya ha sido creada"> 1. Orden Creada</a>
                          </div> 
                        </div>
                        <div class="row-first"> 
                          <div class="input-control">
                            <input class="form-group" type="checkbox" id="paso2"><a title="Estamos asignando el mejor tecnico para su orden de servicio"> 2. Esperando asignación</a>
                          </div> 
                        </div>
                        <div class="row-first"> 
                          <div class="input-control">
                            <input class="form-group" type="checkbox" id="paso3"><a title="El técnico a sido asignado"> 3. Técnico asignado</a>
                          </div> 
                        </div>
                        <div class="row-first"> 
                          <div class="input-control">
                            <input class="form-group" type="checkbox" id="paso4"><a title="Proximamente lo contactaremos"> 4. Contactando cliente</a>
                          </div> 
                        </div>
                        <div class="row-first"> 
                          <div class="input-control">
                            <input class="form-group" type="checkbox" id="paso5"><a title="Sus datos estan siendo verificados "> 5. Servicio Confirmado</a>
                          </div> 
                        </div>
                        <div class="row-first"> 
                          <div class="input-control">
                            <input class="form-group" type="checkbox" id="paso6"><a title="Su servicio esta agendado y proximo a la visita"> 6. Por visitar</a>
                          </div> 
                        </div>
                        <div class="row-first"> 
                          <div class="input-control">
                            <input class="form-group" type="checkbox" id="paso7"><a title="Servicio ya visitado"> 7. Visitado</a>
                          </div> 
                        </div>
                        <div class="row-first"> 
                          <div class="input-control">
                            <input class="form-group" type="checkbox" id="paso8"><a title="Cerrado"> 8. Cerrado</a>
                          </div> 
                        </div>

                      </div>                      
                    </div> 


                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection
  @section('scripts')
  <!-- jQuery 3 -->
  <!-- <script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script> -->
  <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="{{asset('almasaeed2010/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
  <!-- jQuery Knob -->

  <script src="{{asset('almasaeed2010/adminlte/bower_components/jquery-knob/js/jquery.knob.js')}}"></script>
  <script>
    $(document).ready(function(){


      var estado = $('#progreso').val();

      switch (estado) {
        case '1':
          console.log('Estado: '+estado);
          $("#paso1").prop("checked", true);             
          break;
          case '2':
            console.log('Estado: '+estado);
            $("#paso1").prop("checked", true); 
            $("#paso2").prop("checked", true); 

            break;
            case '3':
              console.log('Estado: '+estado);
              $("#paso1").prop("checked", true); 
              $("#paso2").prop("checked", true); 
              $("#paso3").prop("checked", true); 

              break;
              case '4':
                console.log('Estado: '+estado);
                $("#paso1").prop("checked", true); 
                $("#paso2").prop("checked", true); 
                $("#paso3").prop("checked", true); 
                $("#paso4").prop("checked", true); 
                break;

                case '5':
                  console.log('Estado: '+estado);
                  $("#paso1").prop("checked", true); 
                  $("#paso2").prop("checked", true); 
                  $("#paso3").prop("checked", true); 
                  $("#paso4").prop("checked", true); 
                  $("#paso5").prop("checked", true); 
                  break;

                  case '6':
                    console.log('Estado: '+estado);
                    $("#paso1").prop("checked", true); 
                    $("#paso2").prop("checked", true); 
                    $("#paso3").prop("checked", true); 
                    $("#paso4").prop("checked", true); 
                    $("#paso5").prop("checked", true); 
                    $("#paso6").prop("checked", true); 
                    break;

                    case '7':
                      console.log('Estado: '+estado);
                      $("#paso1").prop("checked", true); 
                      $("#paso2").prop("checked", true); 
                      $("#paso3").prop("checked", true); 
                      $("#paso4").prop("checked", true); 
                      $("#paso5").prop("checked", true); 
                      $("#paso6").prop("checked", true); 
                      $("#paso7").prop("checked", true);                     
                      break;

                      case '8':
                        console.log('Estado: '+estado);
                        $("#paso1").prop("checked", true); 
                        $("#paso2").prop("checked", true); 
                        $("#paso3").prop("checked", true); 
                        $("#paso4").prop("checked", true); 
                        $("#paso5").prop("checked", true); 
                        $("#paso6").prop("checked", true); 
                        $("#paso7").prop("checked", true); 
                        $("#paso8").prop("checked", true); 
                        break;

                        default:
                          console.log('Estado: '+estado);
                          $("#paso1").prop("checked", false); 
                          $("#paso2").prop("checked", false); 
                          $("#paso3").prop("checked", false); 
                          $("#paso4").prop("checked", false); 
                          $("#paso5").prop("checked", false); 
                          $("#paso6").prop("checked", false); 
                          $("#paso7").prop("checked", false); 
                          $("#paso8").prop("checked", false); 
                          break;
                        }

                        $(".knob").knob({
                        });
                      });







                    </script>

                    @endsection
