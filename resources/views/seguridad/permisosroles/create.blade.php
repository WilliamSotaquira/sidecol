@extends ('layouts.admin')
@section ('contenido')
@include('seguridad.permisosroles.encabezado')


<section class="content">

  {!!Form::open(array('url'=>'seguridad/permisosroles/store','method'=>'POST','autocomplete'=>'off','files'=> true))!!}
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

              <div class="col-xs-12 col-sm-5  ">
               <div class="form-group">
                <label for="prrole_id" class="col-xs-12 col-sm-3" >Rol</label>
                <div class="col-sm-9">
                  <select id="prrole_id" name="prrole_id" class="selectpicker form-control" data-live-search="true" id="prrole_id" required>
                    <option selected disabled="disabled">Seleccione &hellip;</option>  
                    @foreach($roles as $rol)  
                    <option value="{{$rol->id}}_{{$rol->name}}_{{$rol->slug}}_{{$rol->description}}">{{$rol->name}} - {{$rol->slug}}</option>
                    @endforeach

                  </select>                                              
                </div>          
              </div>
            </div>

            <div class="col-xs-12 col-sm-5">
                 <div class="form-group">
                  <label for="prpermiso_id" class="col-xs-12 col-sm-3" >Permiso</label>
                  <div class="col-sm-9">
                    <select id="prpermiso_id" name="prpermiso_id" class="selectpicker form-control" data-live-search="true" id="prpermiso_id" required>
                      <option selected disabled="true">Seleccione &hellip;</option>  
                      @foreach($permisos as $permiso)  
                      <option value="{{$permiso->id}}_{{$permiso->name}}_{{$permiso->slug}}_{{$permiso->description}}">{{$permiso->name}} - {{$permiso->slug}}</option>
                      @endforeach

                    </select>                                              
                  </div>          
                </div>
              </div>

            <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
              <div class="form-group  " align="center">
                <button class="btn btn-primary" type="button" id="bt_add" >Agregar </button>   
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
                  <th>Rol</th>
                  <th>Descripción Rol</th>
                  <th>Permiso</th>              
                  <th>Descripción prpermiso</th>              
                  
                </thead>

                <tbody>              
                </tbody>

                <tfoot>

                  <th width="10%"></th>
                  <th width="20%"></th>         
                  <th width="25%"></th>
                  <th width="20%"></th>
                  <th width="25%"></th> 

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

                  <a href="{{route('seguridad.permisosroles.index')}}" class="btn btn-info btn_end" id="back" >Atrás</a><br>

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
        $('#prrole_id').change(function() {
          
          selects = 1;
        });        
      });
      
      $(document).ready(function(){
        $('#prpermiso_id').change(function() {
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

         alert("Seleccione nuevamente la opción de Permiso");
       }
       else{

        if (selects >= 2) {

          Roles=document.getElementById('prrole_id').value.split('_');        
          role_id=Roles[0];
          rname=Roles[1];
          rslug=Roles[2];
          rdescription=Roles[3];
          console.log(role_id+" "+rname+" "+rslug+" "+rdescription);



          Permisos=document.getElementById('prpermiso_id').value.split('_');
          permission_id=Permisos[0];
          pname=Permisos[1];
          pslug=Permisos[2];
          pdescription=Permisos[3];
          console.log(permission_id+" "+pname+" "+pslug+" "+pdescription);


          if (role_id!="" && rname!="" && rslug!="" && rdescription!="" && permission_id!="" && pname!="" && pslug!="" && pdescription!="") 
            {
              var fila='<tr class="selected" id="fila'+cont+'"> <td> <button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">Eliminar</button> </td> <td> <input type="hidden" name="role_id[]" value="'+role_id+'">'+role_id+". "+rname+" : "+rslug+'</td> <td> <input type="hidden" name="rdescription[]" value="'+rdescription+'">'+rdescription+'</td> <td> <input type="hidden" name="permission_id[]" value="'+permission_id+'">'+permission_id+". "+pname+" : "+pslug+'</td> <td> <input type="hidden" name="pdescription[]" value="'+pdescription+'">'+pdescription+'</td> </tr>';


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
                  $("#prrole_id").removeAttr("disabled");
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

                $("#prrole_id").prop('disabled', 'disabled');

              }


        





            </script>
            @endsection




