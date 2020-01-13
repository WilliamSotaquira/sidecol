@extends ('layouts.admin')
@section ('contenido')
@include('productos.productosbodegas.encabezado')


<section class="content">

  {!!Form::open(array('url'=>'productos/productosbodegas/store','method'=>'POST','autocomplete'=>'nope','files'=> true))!!}
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

                <div class="col-xs-12 col-sm-3  ">
                 <div class="form-group">
                  <label for="pbbodega_id" class="col-xs-12 col-sm-3" >Bodega</label>
                  <div class="col-sm-9">
                    <select id="pbbodega_id" name="pbbodega_id" class="selectpicker form-control" autofocus="autofocus" data-live-search="true" id="pbbodega_id" required>
                      <option selected disabled="true">Seleccione &hellip;</option>  
                      @foreach($bodegas as $bodega)  
                      <option value="{{$bodega->idBodega}}_{{$bodega->TipoBodega}}">{{$bodega->idBodega}}. {{$bodega->TipoBodega}}</option>
                      @endforeach

                    </select>                                              
                  </div>          
                </div>
              </div>

              <div class="col-xs-12 col-sm-3">
               <div class="form-group">
                <label for="pbproducto_id" class="col-xs-12 col-sm-3" >Producto</label>
                <div class="col-sm-9">
                  <select id="pbproducto_id" name="pbproducto_id" class="selectpicker form-control" data-live-search="true" id="pbproducto_id" required>
                    <option selected disabled="true">Seleccione &hellip;</option>  
                    @foreach($productos as $productos)  
                    <option value="{{$productos->idproducto}}_{{$productos->referencia}}">{{$productos->idproducto}}. {{$productos->referencia}} - {{$productos->marca}}</option>
                    @endforeach

                  </select>                                              
                </div>          
              </div>
            </div>

            <div class="col-xs-12 col-sm-3">
              <div class="form-group ">
                <label for="pcantidad" class="col-xs-12 col-sm-3">Cantidad</label>
                <div class="col-sm-9">
                  <input type="number" id="pcantidad" name="pcantidad" class="form-control" placeholder="Escriba..." value="{{old('pcantidad')}}" required>
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
                  <th>Bodega</th>
                  <th>Producto</th>              
                  <th>Cantidad</th>              
                  
                </thead>

                <tbody>              
                </tbody>

                <tfoot>

                  <th width="10%"></th>     
                  <th width="35%"></th>
                  <th width="30%"></th>
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

                  <!-- <a class="btn btn-danger btn_end" type="reset" id="limpiar">Limpiar</a> -->
                   <a href="{{route('productos.productosbodegas.create')}}" class="btn btn-default btn_end" id="back" >Limpiar</a><br>

                </div>
                <div class="col-xs-12 col-sm-4 col-lg-2 text-center"  style="padding-bottom: 5px; padding-top: 5px">

                  <a href="{{route('productos.productosbodegas.index')}}" class="btn btn-info btn_end" id="back" >Atrás</a><br>

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
        $('#pbbodega_id').change(function() {
          selects = 1;
        });        
      });
      
      $(document).ready(function(){
        $('#pbproducto_id').change(function() {
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
      var bodegas = 0;
      var productos = 0;
      var cantidad = 0;
      



      function agregar(){

        // console.log(selects);
        if (selects === 1) {

         alert("Seleccione nuevamente la opción de producto o actualice la pagina nuevamente");
       }
       else{

        if (selects >= 2) {

          bodegas=document.getElementById('pbbodega_id').value.split('_');        
          bodega_id=bodegas[0];
          TipoBodega=bodegas[1];
          console.log(bodega_id+" "+TipoBodega);



          productos=document.getElementById('pbproducto_id').value.split('_');
          producto_id=productos[0];
          referencia=productos[1];
          console.log(producto_id+" "+referencia);

          

          cantidad = $('#pcantidad').val();
          console.log(cantidad);






          if (bodega_id!="" && TipoBodega!="" && producto_id!="" && referencia!="" && cantidad!="" ) 
            {
              var fila='<tr class="selected" id="fila'+cont+'"> <td> <button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">Eliminar</button> </td> <td> <input type="hidden" name="bodega_id[]" value="'+bodega_id+'">'+bodega_id+". "+TipoBodega+'</td> <td> <input type="hidden" name="producto_id[]" value="'+producto_id+'">'+producto_id+". "+referencia+'</td> <td> <input type="hidden" name="cantidad[]" value="'+cantidad+'">'+cantidad+'</td> </tr>';


              cont=cont+1;



              $('#detalles').append(fila);



            }
            else
              {
                alert("Error al ingresar el los registros, revise los datos");
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
                  $("#pbbodega_id").removeAttr("disabled");
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

                $("#pbbodega_id").prop('disabled', 'disabled');

              }

            </script>
            @endsection




