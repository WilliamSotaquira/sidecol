@extends ('layouts.admin')
@section ('contenido')
@include('seguridad.roluser.encabezado')


<section class="content">

  {!!Form::open(array('url'=>'seguridad/roluser/store','method'=>'POST','autocomplete'=>'off','files'=> true))!!}
  {{ csrf_field() }}

  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Agregar Nuevo Registro</h3>


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


        <div class="row" id="msg" name="msg">

        </div>

        <form>
          <div class="row">
            <div class="col-sm-12">
             <div class="panel panel-default row-first">

               <div class="row row-first">

                <div class="col-xs-12 col-sm-5">
                 <div class="form-group">
                  <label for="puser_id" class="col-xs-12 col-sm-3" >Usuario</label>
                  <div class="col-sm-9">
                    <select id="puser_id" name="puser_id" class="selectpicker form-control" data-live-search="true" id="puser_id" required>
                      <option selected disabled="true">Seleccione &hellip;</option>  
                      @foreach($usuarios as $user)  
                      <option value="{{$user->id}}_{{$user->name}}_{{$user->apellidos}}">{{$user->name}} {{$user->apellidos}}</option>
                      @endforeach

                    </select>                                              
                  </div>          
                </div>
              </div>

              <div class="col-xs-12 col-sm-5  ">
               <div class="form-group">
                <label for="prole_id" class="col-xs-12 col-sm-3" >Rol</label>
                <div class="col-sm-9">
                  <select id="prole_id" name="prole_id" class="selectpicker form-control" data-live-search="true" id="prole_id" required>
                    <option selected disabled="true">Seleccione &hellip;</option>  
                    @foreach($roles as $rol)  
                    <option value="{{$rol->id}}_{{$rol->name}}_{{$rol->slug}}_{{$rol->description}}">{{$rol->name}} - {{$rol->slug}}</option>
                    @endforeach

                  </select>                                              
                </div>          
              </div>
            </div>

            <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
              <div class="form-group">
                <button class="btn btn-primary" type="button" id="bt_add">Agregar </button>   
              </div>          
            </div>
          </div>

        </div>
        <div class="row"> 

          <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="table-responsive">
              <table id="detalles" class="table table-striped table-bordered table-responsed table-hover">
                <thead>
                  <th>Opciones</th>
                  <th width="15%">Usuario</th>
                  <th>Rol</th>              
                  <th>Indicador</th>              
                  <th width="40%">Descripcion</th>                      
                </thead>

                <tbody>              
                </tbody>

                <tfoot>
                  <th></th>
                  <th></th>         
                  <th></th>
                  <th></th>
                  <th></th>                           
                </tfoot>

                <tbody>              
                </tbody>

              </table>
            </div>
          </div>
        </div>




        <div class="box-footer " id="guardar">
          <div class="container-fluid">
            <div class="row-bottons">
              <div class="col-sm-12">
                <div class="col-xs-0 col-sm-0 col-lg-3 text-center" style="padding-bottom: 5px; padding-top: 5px"></div>
                <div class="col-xs-12 col-sm-4 col-lg-2 text-center" style="padding-bottom: 5px; padding-top: 5px">

                  <button class="btn btn-primary btn_end" type="submit" > Guardar </button>

                </div>
                <div class="col-xs-12 col-sm-4 col-lg-2 text-center" style="padding-bottom: 5px; padding-top: 5px">

                  <a class="btn btn-danger btn_end" type="reset" id="limpiar">Limpiar</a>

                </div>
                <div class="col-xs-12 col-sm-4 col-lg-2 text-center"  style="padding-bottom: 5px; padding-top: 5px">

                  <a href="{{ URL::previous() }}" class="btn btn-info btn_end" id="back" >Atrás</a><br>

                </div>
                <div class="col-xs-0 col-sm-0 col-lg-3 text-center" style="padding-bottom: 5px; padding-top: 5px"></div>

              </div>      
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
        $('#puser_id').change(function() {
          
          selects = 1;
        });        
      });
      
      $(document).ready(function(){
        $('#prole_id').change(function() {
          selects = selects+1;
          mantener();
        });        
      });

      $(document).ready(function(){
       $('#bt_add').click(function(){
        agregar();
      });
     });

      var cont = 0;
      var user_id = 0;
      var role_id = 0;
      



      function agregar(){

        console.log(selects);
        if (selects === 1) {

         alert("Seleccione nuevamente la opción de Rol");
       }
       else{

        if (selects >= 2) {

          DatosUsuario=document.getElementById('puser_id').value.split('_');        
          user_id=DatosUsuario[0];
          nombre=DatosUsuario[1];
          apellidos=DatosUsuario[2];
          console.log(user_id+" "+nombre+" "+apellidos);



          DatosRol=document.getElementById('prole_id').value.split('_');
          role_id=DatosRol[0];
          name=DatosRol[1];
          slug=DatosRol[2];
          description=DatosRol[3];
          console.log(role_id+" "+name+" "+slug+" "+description);


          if (user_id!="" && nombre!="" && apellidos!="" && role_id!="" && name!="" && slug!="" && description!="") 
            {
              var fila='<tr class="selected" id="fila'+cont+'"> <td> <button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">Eliminar</button> </td> <td> <input type="hidden" name="user_id[]" value="'+user_id+'">'+user_id+" - "+nombre+" "+apellidos+'</td> <td> <input type="hidden" name="role_id[]" value="'+role_id+'">'+role_id+" - "+name+'</td> <td> <input type="hidden" name="slug[]" value="'+slug+'">'+slug+'</td> <td> <input type="hidden" name="description[]" value="'+description+'">'+description+'</td> </tr>';


              cont=cont+1;



              $('#detalles').append(fila);



            }
            else
              {
                alert("Error al ingresar el detalle de las preguntas, revise los datos");
              }

            }          
            else
              {
                alert("Complete la selección antes de continuar");
              }
              evaluar();


            }
          }


          function evaluar()
          {
            if (cont > 0)
              {
                $("#guardar").show();

              }
              else
                {
                  $("#guardar").hide();
                  $("#puser_id").removeAttr("disabled");
                  selects = 1;

                }  

              }

              function eliminar(index)
              {

                $("#fila" + index).remove();
                cont--;  
                evaluar()                ;

              }
              function mantener(){

                $("#puser_id").prop('disabled', 'disabled');

              }


        





            </script>
            @endsection




