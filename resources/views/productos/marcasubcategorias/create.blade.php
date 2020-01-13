@extends ('layouts.admin')
@section ('contenido')
@include('productos.marcasubcategorias.encabezado')


<section class="content">

  {!!Form::open(array('url'=>'productos/marcasubcategorias/store','method'=>'POST','autocomplete'=>'off','files'=> true))!!}
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

        <form>
          <div class="row row-first">
            <div class="col-sm-12">
             <div class="panel panel-default row-first">

               <div class="row row-first">               

              <div class="col-xs-12 col-sm-5  ">
               <div class="form-group">
                <label for="pmarca_id" class="col-xs-12 col-sm-3" >Marca</label>
                <div class="col-sm-9">
                  <select id="pmarca_id" name="pmarca_id" class="selectpicker form-control" data-live-search="true" id="pmarca_id" required>
                    <option selected disabled="true">Seleccione &hellip;</option>  
                    @foreach($marcas as $marca)  
                    <option value="{{$marca->idmarca}}_{{$marca->marca}}">{{$marca->idmarca}} - {{$marca->marca}}</option>
                    @endforeach

                  </select>                                              
                </div>          
              </div>
            </div>

            <div class="col-xs-12 col-sm-5">
                 <div class="form-group">
                  <label for="psubcategoria_id" class="col-xs-12 col-sm-3" >Permiso</label>
                  <div class="col-sm-9">
                    <select id="psubcategoria_id" name="psubcategoria_id" class="selectpicker form-control" data-live-search="true" id="psubcategoria_id" required>
                      <option selected disabled="true">Seleccione &hellip;</option>  
                      @foreach($subcategorias as $subcategoria)  
                      <option value="{{$subcategoria->idsubcategoria}}_{{$subcategoria->subcategoria}}">{{$subcategoria->idsubcategoria}} - {{$subcategoria->subcategoria}}</option>
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
                  <th>marca</th>
                  <th>subcategoria</th>
                  
                </thead>

                <tbody>              
                </tbody>

                <tfoot>

                  <th width="30%"></th>
                  <th width="35%"></th>         
                  <th width="35%"></th>

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

                  <a href="{{route('productos.marcasubcategorias.index')}}" class="btn btn-info btn_end" id="back" >Atrás</a><br>

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
        $('#pmarca_id').change(function() {
          
          selects = 1;
        });        
      });
      
      $(document).ready(function(){
        $('#psubcategoria_id').change(function() {
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
      var idmarca = 0;
      var idsubcategoria = 0;
      



      function agregar(){

        console.log(selects);
        if (selects === 1) {

         alert("Seleccione nuevamente la opción de Permiso");
       }
       else{

        if (selects >= 2) {

          marcas=document.getElementById('pmarca_id').value.split('_');        
          marca_id=marcas[0];
          marca=marcas[1];
          console.log(marca_id+" "+marca);



          subcategorias=document.getElementById('psubcategoria_id').value.split('_');
          subcategoria_id=subcategorias[0];
          subcategoria=subcategorias[1];
          console.log(subcategoria_id+" "+subcategoria);


          if (marca_id!="" && marca!="" && subcategoria_id!="" && subcategoria!="") 
            {
              console.log('si pasa')
              var fila='<tr class="selected" id="fila'+cont+'"> <td> <button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">Eliminar</button> </td> <td> <input type="hidden" name="marca_id[]" value="'+marca_id+'">'+marca_id+". "+marca+'</td> <td> <input type="hidden" name="subcategoria_id[]" value="'+subcategoria_id+'">'+subcategoria_id+". "+subcategoria+'</td> </tr>';


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
                  $("#pmarca_id").removeAttr("disabled");
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

                $("#pmarca_id").prop('disabled', 'disabled');

              }


        





            </script>
            @endsection




