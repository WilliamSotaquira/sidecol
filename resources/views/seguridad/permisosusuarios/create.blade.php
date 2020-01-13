@extends ('layouts.admin')
@section ('contenido')
@include('seguridad.permisosusuarios.encabezado')


<section class="content">

  {!!Form::open(array('url'=>'seguridad/permisosusuarios/store','method'=>'POST','autocomplete'=>'off','files'=> true))!!}
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
                  <label for="puuser_id" class="col-xs-12 col-sm-3" >Usuario</label>
                  <div class="col-sm-9">
                    <select id="puuser_id" name="puuser_id" class="selectpicker form-control" data-live-search="true" id="puuser_id" required>
                      <option selected disabled="true">Seleccione &hellip;</option>  
                      @foreach($usuarios as $usuario)  
                      <option value="{{$usuario->id}}_{{$usuario->name}}_{{$usuario->apellidos}}">{{$usuario->id}}. {{$usuario->name}} {{$usuario->apellidos}}</option>
                      @endforeach

                    </select>                                              
                  </div>          
                </div>
              </div>

              <div class="col-xs-12 col-sm-5">
               <div class="form-group">
                <label for="proles" class="col-xs-12 col-sm-3" >Roles</label>
                <div class="col-sm-9">
                  <select id="proles" name="proles" class="selectpicker form-control" data-live-search="true" id="proles" required>
                    <option selected disabled="true">Seleccione &hellip;</option>  
                    @foreach($roles as $rol)  
                    <option value="{{$rol->id}}">{{$rol->id}}. {{$rol->name}}</option>
                    @endforeach

                  </select>                                              
                </div>          
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
                  <th>Usuario</th>
                  <th>Rol</th>
                  <th>Descripción Rol</th>
                  <th>Permiso</th>              
                  <th>Descripción Permiso</th>              
                  
                </thead>

                <tbody>              
                </tbody>

                <tfoot>

                  <th width="10%"></th>     
                  <th width="15%"></th>
                  <th width="10%"></th>
                  <th width="15%"></th> 
                  <th width="15%"></th> 
                  <th width="15%"></th> 

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

                  <a href="{{route('seguridad.permisosusuarios.create')}}" class="btn btn-danger btn_end" >Limpiar</a>

                </div>
                <div class="col-xs-12 col-sm-4 col-lg-2 text-center"  style="padding-bottom: 5px; padding-top: 5px">

                  <a href="{{route('seguridad.permisosusuarios.index')}}" class="btn btn-info btn_end" id="back" >Atrás</a><br>

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
      $("#detalles").hide();
      // desactivar();

      var selects = 0;

      
    
      $(document).ready(function(){
        $('#prpermiso_id').change(function() {
          selects = selects+1;
          
        });        
      });


      var cont = 0;
      var user_id = 0;
      var role_id = 0;

      $('#proles').on('change',tabla);
      $('#puuser_id').on('change',activar);

      function tabla(){

        var id =$(this).val(); 


        users=document.getElementById('puuser_id').value.split('_');        
        user_id=users[0];
        uname=users[1];
        uapellidos=users[2];;
        console.log(user_id+" "+uname+" "+uapellidos);

        console.log(id);

        //AJAX   

        $.get('/api/sidecol/'+id+'/role', function(data){

          for (var i = 0; i<data.length; i++) {

            console.log(data[i].rname); 


            $('#detalles').show();
            $('#guardar').show();

            var fila='<tr class="selected" id="fila'+i+'"> <td> <button type="button" class="btn btn-warning" onclick="eliminar('+i+');">Eliminar</button> </td> <td> <input type="hidden" name="user_id[]" value="'+user_id+'">'+user_id+". "+uname+" "+uapellidos+'</td> <td> <input type="hidden" name="role_id[]" value="'+data[i].rid+'">'+data[i].rname+'</td> <td> <input type="hidden" name="rdescription[]" value="'+data[i].rdescription+'">'+data[i].rdescription+'</td> <td> <input type="hidden" name="permission_id[]" value="'+data[i].pid+'">'+data[i].pname+'</td> <td> <input type="hidden" name="pdescription[]" value="'+data[i].pdescription+'">'+data[i].pdescription+'</td> </tr>';

            $('#detalles').append(fila);

          }


        });


      }

      function eliminar(index)
      {

        $("#fila" + index).remove();
        cont--;  
      }

      function desactivar(){
        $("#proles").prop('disabled', 'disabled');
      }
      function activar(){
        $("#proles").removeAttr('disabled');
      }

    </script>
    @endsection




