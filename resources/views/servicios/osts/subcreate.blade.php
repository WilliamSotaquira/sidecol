@extends ('layouts.admin')
@section ('contenido')
@include('servicios.osts.encabezado')


<section class="content">



  {!!Form::model($data,['method'=>'PUT','route'=>['servicios.osts.subupdate',$data->idost],'files'=>'true'])!!}
  {{Form::token()}}


  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Completar PreOrden <strong>OST{{$data->idost}}</strong></h3>
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

        <div class="row-specialfirst">
          <div class="col-sm-12">
           <div class="panel panel-info row-specialfirst">
            <div class="row row-first">

              <div class="col-xs-12 col-sm-12">
               <div class="form-group">
                <label for="tipo_os" class="col-xs-12 col-sm-2 " >Tipo Servicio</label>
                <div class="col-sm-4  ">
                  <select id="tipo_os" name="tipo_os" class="selectpicker form-control" autofocus="autofocus" data-live-search="true" id="tipo_os" required="required">
                    <option selected disabled="true">Seleccione &hellip;</option>  

                    <option value="1">1. Instalación</option>
                    <option value="2">2. Mantenimiento</option>
                    <option value="3">3. Garantía</option>
                    <option value="4">4. Otro</option>

                  </select>                                              
                </div>          
              </div>
            </div>
          </div></div>
        </div>
      </div>

      <div class="row" id="rproductos">
        <div class="col-sm-12">
         <div class="panel panel-info row ">

          <div class="row row-first">
            <div class="col-xs-12 col-sm-12">
              <div class="form-group">
                <label for="producto_id" class="col-xs-12 col-sm-2 control-label">Productos</label>
                <div class="col-sm-4">
                 <select name="producto_id" class="form-control selectpicker"  data-size="6" data-live-search="true" id="rproducto_id" value="{{old('producto_id')}}" required="required">
                  <option selected ="selected" disabled="disabled" value="">Seleccione &hellip;</option> 
                  @foreach($productos as $producto) 
                  <option value="{{$producto->idproducto}}_{{$producto->referencia}}_{{$producto->categoria}}_{{$producto->marca}}">{{$producto->idproducto}}. {{$producto->referencia}} | {{$producto->categoria}} - {{$producto->marca}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-sm-1">
                &nbsp;                
              </div>
              <div class="col-sm-4">
                <a class="btn bg-olive btn_end" title="" id="btn_agregar">Agregar</a>

              </div>

            </div>
          </div></div>

          <div class="container-fluid" id="cf_table">

            <div class="row"> 

              <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                <div class="table-responsive">
                  <table id="tabla" class="table table-striped table-bordered table-responsed table-hover">
                    <thead>

                      <th>Opciones</th>
                      <th>id</th>
                      <th>Referencia</th>
                      <th>Categoría</th>              
                      <th>Marca</th>              

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
          </div>


        </div>
      </div>
    </div>

    <div class="row " id="detalle">
      <div class="col-sm-12">
       <div class="panel panel-default row">
        <div class="row row-first"> 

          <!-- fila 1 -->

          <div class="col-xs-12 col-sm-6"> 
            <div class="container-fluid">

              <div class="row">
                <div class="form-group">
                  <label for="contacto" class="col-xs-12 col-sm-4 control-label">Persona de Contacto *</label>
                  <div class="col-sm-7">
                   <input type="text" class="form-control" autocomplete="autocomplete" name="contacto" id="contacto" placeholder="Nombre Completo" value="{{$data->contacto}}" required="required">
                 </div> 
               </div>
             </div>

             <div class="row">
               <div class="form-group">
                <label for="tipo_doc" class="col-xs-12 col-sm-4 control-label">Tipo Documento</label>
                <div class="col-sm-7">
                  <select name="tipo_doc" class="form-control selectpicker" data-size="6" data-live-search="true" id="tipo_doc" value="{{$data->tipo_doc}}" required="required">

                    @switch($data->tipo_doc)

                    @case(0)
                    <option value="0" selected="selected" disabled="disabled">Seleccione...</option>
                    <option value="1">Cédula de Ciudadanía</option>
                    <option value="2">Cédula de Extranjería</option>
                    <option value="3">Pasaporte</option>
                    <option value="4">Otro</option>
                    @break

                    @case(1)
                    <option value="0" disabled="disabled">Seleccione...</option>
                    <option value="1" selected="selected">Cédula de Ciudadanía</option>
                    <option value="2">Cédula de Extranjería</option>
                    <option value="3">Pasaporte</option>
                    <option value="4">Otro</option>
                    @break

                    @case(2)
                    <option value="0" disabled="disabled">Seleccione...</option>
                    <option value="1">Cédula de Ciudadanía</option>
                    <option value="2" selected="selected">Cédula de Extranjería</option>
                    <option value="3">Pasaporte</option>
                    <option value="4">Otro</option>
                    @break

                    @case(3)
                    <option value="0" disabled="disabled">Seleccione...</option>
                    <option value="1">Cédula de Ciudadanía</option>
                    <option value="2">Cédula de Extranjería</option>
                    <option value="3" selected="selected">Pasaporte</option>
                    <option value="4">Otro</option>
                    @break

                    @case(4)
                    <option value="0" disabled="disabled">Seleccione...</option>
                    <option value="1">Cédula de Ciudadanía</option>
                    <option value="2">Cédula de Extranjería</option>
                    <option value="3">Pasaporte</option>
                    <option value="4" selected="selected">Otro</option>
                    @break

                    @default
                    <option value="0" selected="selected" disabled="disabled">Seleccione...</option>
                    <option value="1">Cédula de Ciudadanía</option>
                    <option value="2">Cédula de Extranjería</option>
                    <option value="3">Pasaporte</option>
                    <option value="4">Otro</option>
                    @break

                    @endswitch
                  </select>
                </div> 
              </div>
            </div>

            <div class="row">
             <div class="form-group">
              <label for="numero_doc" class="col-xs-12 col-sm-4 control-label"># Documento</label>
              <div class="col-sm-7">
               <input type="text" class="form-control" autocomplete="autocomplete" name="numero_doc" id="numero_doc" value="{{$data->numero_doc}}" required="required" >
             </div> 
           </div>
         </div>

         <div class="row">
           <div class="form-group">
            <label for="email" class="col-xs-12 col-sm-4 control-label">E-mail *</label>
            <div class="col-sm-7">
             <input type="email" class="form-control" autocomplete="autocomplete" name="email" id="email" value="{{$data->email}}" required="required">
           </div> 
         </div>
       </div>

       <div class="row">
         <div class="form-group">
          <label for="direccion" class="col-xs-12 col-sm-4 control-label">Dirección *</label>
          <div class="col-sm-7">
           <input type="text" class="form-control" autocomplete="autocomplete" name="direccion" id="direccion" value="{{$data->direccion}}" required="required">
         </div> 
       </div>
     </div>

     <div class="row">
      <div class="form-group">
        <label for="municipio_id" class="col-xs-12 col-sm-4 control-label">Ciudad *</label>
        <div class="col-sm-7">
          <select name="municipio_id" class="form-control selectpicker" data-size="6" data-live-search="true" id="municipio_id" value="{{old('municipio_id')}}" required="required">

            @foreach($municipios as $municipio) 
            @if($municipio ->id_municipio ==$data->id_municipio)
            <option value="{{$municipio->id_municipio}}" selected="selected">{{$municipio->municipio}} - {{$municipio->departamento}}</option>
            @else
            <option value="{{$municipio->id_municipio}}">{{$municipio->municipio}} - {{$municipio->departamento}}</option>
            @endif
            @endforeach
          </select>
        </div>
      </div>
    </div>

    <div class="row">
     <div class="form-group">
      <label for="celular" class="col-xs-12 col-sm-4 control-label">celular *</label>
      <div class="col-sm-7">
       <input type="number" class="form-control" autocomplete="autocomplete" name="celular" id="celular" value="{{$data->celular}}" required="required">
     </div> 
   </div>
 </div>

 <div class="row">
   <div class="form-group">
    <label for="telefono" class="col-xs-12 col-sm-4 control-label">Teléfono</label>
    <div class="col-sm-7">
     <input type="number" class="form-control" autocomplete="autocomplete" name="telefono" id="telefono" value="{{old('telefono')}}" >
   </div> 
 </div>
</div>


<div class="row">
 <div class="form-group">
  <label for="info" class="col-xs-12 col-sm-8 control-label">(*) Campos Obligatorios</label>
  <div class="col-sm-4">
   <input type="number" class="form-control hide " autocomplete="autocomplete" name="telefono" id="telefono" >
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
        <label for="falla" class="col-xs-12 col-sm-4 control-label">Falla *</label>
        <div class="col-sm-7">
         <input type="text" class="form-control" autocomplete="autocomplete" name="falla" id="falla" value="{{old('falla')}}" required="required">
       </div></div> 
     </div>


     <div class="row">
      <div class="form-group">
        <label for="estado_garantia" class="col-xs-12 col-sm-4 control-label">Estado Garantía</label>
        <div class="col-sm-7">
         <input type="text" class="form-control" autocomplete="autocomplete" name="estado_garantia" id="estado_garantia" value="{{old('estado_garantia')}}" >
       </div></div> 
     </div>


     <div class="row">
      <div class="form-group">
        <label for="nro_factura" class="col-xs-12 col-sm-4 control-label">Numero Factura</label>
        <div class="col-sm-7">
         <input type="text" class="form-control" autocomplete="autocomplete" name="nro_factura" id="nro_factura" value="{{old('nro_factura')}}" >
       </div></div> 
     </div>


     <div class="row">
      <div class="form-group">
        <label for="nro_serie" class="col-xs-12 col-sm-4 control-label">Numero Serie </label>
        <div class="col-sm-7">
         <input type="text" class="form-control" autocomplete="autocomplete" name="nro_serie" id="nro_serie" value="{{old('nro_serie')}}" >
       </div></div> 
     </div>


     <div class="row">
      <div class="form-group">
        <label for="observaciones" class="col-xs-12 col-sm-4 control-label">Observaciones *</label>
        <div class="col-sm-7">
         <textarea name="observaciones" id="observaciones" class="form-control" rows="5" value="" required="required">{{$data->observaciones}}</textarea>
       </div></div> 
     </div>

   </div>
 </div>

 <!-- fin fila 2 -->
</div>
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

          <a href="{{route('servicios.osts.index')}}" class="btn btn-info btn_end" id="back" >Atras</a><br>

        </div>
        <div class="col-xs-0 col-sm-0 col-lg-3 text-center" style="padding-bottom: 5px; padding-top: 5px"></div>

      </div>      
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

  var selects =0;
  var cont = 0;

  // $("#detalle").hide();
  $("#cf_table").hide();
  $("#rproductos").hide();
  $("#guardar").hide();

  $(document).ready(function(){
    $('#tipo_os').change(function() {
      $("#rproductos").show();

    });        
  });

  var items=0;

  $(document).ready(function(){
    $('#btn_agregar').click(function() {

      selects = selects+1;
      
      agregar();

    });        
  });



  function agregar(){

    console.log('Cantidad:'+selects);
    if (selects === 0) {

     alert("Seleccione nuevamente la opción de Permiso");

   }
   else{



    if (selects >= 1) {

      producto=document.getElementById('rproducto_id').value.split('_');        
      producto_id=producto[0];
      referencia=producto[1];
      categoria=producto[2];
      marca=producto[3];
      console.log(producto_id+" "+referencia+" "+categoria+" "+marca);
      console.log('este es:'+producto_id);

      if(producto_id=='Seleccione …'){

       alert("Selección invalida");
       selects--;
     }else {

       $("#detalle").show();
       $("#cf_table").show();


       if (producto_id!="" && referencia!="" && categoria!="" && marca!="") 
        {
          var fila='<tr class="selected" id="fila'+cont+'"> <td> <button type="button" class="btn btn-warning btn-sm" onclick="eliminar('+cont+');">Eliminar</button> </td> <td> <input type="hidden" name="producto_id[]" value="'+producto_id+'">'+producto_id+'</td> <td> <input type="hidden" name="referencia[]" value="'+referencia+'">'+referencia+'</td> <td> <input type="hidden" name="categoria[]" value="'+categoria+'">'+categoria+'</td> <td> <input type="hidden" name="marca[]" value="'+marca+'">'+marca+'</td> </tr>';


          cont=cont+1;



          $('#tabla').append(fila);
          $("#guardar").show();
          $("#rproducto_id").val('');
          $("#rproducto_id").change();
          $("#rproducto_id").removeAttr("required");



        }
        else
          {
            alert("Error al ingresar el detalle de las preguntas, revise los datos");
          }

        }

      }          
      else
        {
          alert("Complete la selección antes de continuar");
        }
        evaluar();


      }
    }
    function eliminar(index)
    {
      selects--;
      console.log('selects:'+selects);


      $("#rproducto_id").val('');
      $("#rproducto_id").change();


      if (selects === 0) {

        // $("#detalle").hide();
        $("#cf_table").hide();
        $("#guardar").hide();
        $("#fila" + index).remove();
        $("#rproducto_id").attr("required", "required");
        cont--;  




      }else{

        $("#fila" + index).remove();
        cont--;  

        evaluar();

      }



    }





  </script>
  @endsection



