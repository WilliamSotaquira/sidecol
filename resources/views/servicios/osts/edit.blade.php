@extends ('layouts.admin')
@section ('contenido')
@include('servicios.osts.encabezado')



<section class="content">

  {!!Form::model($data,['method'=>'PUT','route'=>['servicios.osts.update',$data->idost],'files'=>'true'])!!}
  {{Form::token()}}


  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Editar Registro <strong>OST{{$data->idost}}</strong></h3>
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

          <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> ¡Alerta!</h4>
            Los productos relacionados en esta orden de servicio no pueden ser modificados!    
          </div>


          <div class="row">
            <div class="col-sm-12">
             <div class="panel panel-info row" style="margin-bottom: 0px;">
              <div class="row row-first">

                <div class="col-xs-12 col-sm-12">
                 <div class="form-group">
                  <label for="tipo_os" class="col-xs-12 col-sm-2 " >Tipo Servicio</label>
                  <div class="col-sm-4  ">
                    <select id="tipo_os" name="tipo_os" class="selectpicker form-control" autofocus="autofocus" data-live-search="true" id="tipo_os" required="required">


                      @switch($data->tipo_os)

                      @case(1)             
                      <option disabled="true">Seleccione &hellip;</option>
                      <option selected="selected" value="1">1. Instalación</option>
                      <option value="2">2. Mantenimiento</option>
                      <option value="3">3. Garantía</option>
                      <option value="4">4. Otro</option>
                      @break

                      @case(2)
                      <option disabled="true">Seleccione &hellip;</option>
                      <option value="1">1. Instalación</option>
                      <option selected="selected" value="2">2. Mantenimiento</option>
                      <option value="3">3. Garantía</option>
                      <option value="4">4. Otro</option>                     
                      @break

                      @case(3)
                      <option disabled="true">Seleccione &hellip;</option>
                      <option value="1">1. Instalación</option>
                      <option value="2">2. Mantenimiento</option>
                      <option selected="selected" value="3">3. Garantía</option>
                      <option value="4">4. Otro</option>                     
                      @break

                      @case(4)
                      <option disabled="true">Seleccione &hellip;</option>
                      <option value="1">1. Instalación</option>
                      <option value="2">2. Mantenimiento</option>
                      <option selected="selected" value="3">3. Garantía</option>
                      <option value="4">4. Otro</option>                     
                      @break

                      @default<option value="1">1. Instalación</option>
                      <option value="2">2. Mantenimiento</option>
                      <option value="3">3. Garantía</option>
                      <option value="4">4. Otro</option>
                      <option selected="selected" disabled="true">Seleccione &hellip;</option>
                      @break                     

                      @endswitch
                    </select>                                              
                  </div>          
                </div>
              </div>

            </div></div>
          </div>
        </div>


        <div class="row" >
          <div class="col-sm-12">
           <div class="panel panel-info row" style="margin-bottom: 0px; margin-top: 5px;">

            <div class="row row-first">
              <div class="col-xs-12 col-sm-12">

                <div class="form-group">
                  <label for="producto_id" class="col-xs-12 col-sm-8 control-label">Productos relacionados a esta OST</label>



                </div>
              </div></div>

              <div class="container-fluid" id="cf_table">

                <div class="row" style="margin-bottom: 0px;"> 

                  <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <div class="table-responsive">
                      <table id="tabla" class="table table-striped table-bordered table-responsed table-hover">
                        <thead>

                          <th width="8%" style="text-align: center;">id</th>
                          <th>Referencia</th>
                          <th>Categoría</th>              
                          <th>Marca</th> 


                        </thead>


                        <tbody > 
                          @foreach($productos as $clave => $producto)
                          <tr>

                           <td style="text-align: center;">{{$producto->idproducto}}</td>
                           <td>{{$producto->referencia}}</td>
                           <td>{{$producto->categoria}} - {{$producto->subcategoria}}</td>
                           <td>{{$producto->marca}}</td>
                           @endforeach
                         </tr>

                       </tbody>
                     </table>
                   </div>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>



       <div class="row">
        <div class="col-sm-12">
         <div class="panel panel-info row " >


          <div class="row row-first">
            <div class="col-xs-12 col-sm-12">
              <div class="form-group">

               <!-- fila 1 -->

               <div class="col-xs-12 col-sm-6"> 
                <div class="container-fluid">

                  <div class="row">
                    <div class="form-group">
                      <label for="contacto" class="col-xs-12 col-sm-4 control-label">Persona Contacto *</label>
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
                <label for="email" class="col-xs-12 col-sm-4 control-label">E-mail *</label>
                <div class="col-sm-7">
                 <input type="email" class="form-control" autocomplete="autocomplete" name="email" id="email" value="{{$data->email}}" required="required">
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
            <label for="telefono" class="col-xs-12 col-sm-4 control-label">Telefono</label>
            <div class="col-sm-7">
             <input type="number" class="form-control" autocomplete="autocomplete" name="telefono" id="telefono" value="{{$data->telefono}}" >
           </div> 
         </div>
       </div>

       <div class="row">
         <div class="form-group">
          <label for="info" class="col-xs-12 col-sm-8 control-label">(*) Campos Obligatorios</label>
          <div class="col-sm-4">
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
           <input type="text" class="form-control" autocomplete="autocomplete" name="falla" id="falla" value="{{$data->falla}}" required="required">
         </div></div> 
       </div>


       <div class="row">
        <div class="form-group">
          <label for="estado_garantia" class="col-xs-12 col-sm-4 control-label">Estado Garantía</label>
          <div class="col-sm-7">
           <input type="text" class="form-control" autocomplete="autocomplete" name="estado_garantia" id="estado_garantia" value="{{$data->estado_garantia}}" >
         </div></div> 
       </div>


       <div class="row">
        <div class="form-group">
          <label for="nro_factura" class="col-xs-12 col-sm-4 control-label">Numero Factura</label>
          <div class="col-sm-7">
           <input type="text" class="form-control" autocomplete="autocomplete" name="nro_factura" id="nro_factura" value="{{$data->nro_factura}}" >
         </div></div> 
       </div>


       <div class="row">
        <div class="form-group">
          <label for="nro_serie" class="col-xs-12 col-sm-4 control-label">Numero Serie </label>
          <div class="col-sm-7">
           <input type="text" class="form-control" autocomplete="autocomplete" name="nro_serie" id="nro_serie" value="{{$data->nro_serie}}" >
         </div></div> 
       </div>


       <div class="row">
        <div class="form-group">
          <label for="observaciones" class="col-xs-12 col-sm-4 control-label">Observaciones *</label>
          <div class="col-sm-7">
           <textarea name="observaciones" id="observaciones" class="form-control" rows="5" required="required">{{$data->observaciones}}</textarea>
         </div></div> 
       </div>

     </div>
   </div>

   <!-- fin fila 2 -->



 </div>
</div>               
</div>

</div>
</div>
</div>

<div class="row">
  <div class="col-sm-12">
   <div class="panel panel-info row" style="margin-bottom: 0px;">
    <div class="row row-first">

      <div class="col-xs-12 col-sm-12">
       <div class="form-group">
        <label for="estado_os" class="col-xs-12 col-sm-4 " >Estado de la Orden de Servicio</label>
        <div class="col-sm-4  ">
          <select id="estado_os" name="estado_os" class="selectpicker form-control" autofocus="autofocus" data-live-search="true" required="required">

            @switch($data->estado_os)

            @case(0)             
            <option disabled="disabled">Seleccione...</option>
            <option value="0" selected="selected">0. PreOrden</option>
            <option value="1">1. Sin Asignar</option>
            <option value="2">2. Asignado sin Contacto</option>
            <option value="3">3. Aceptado por técnico</option>
            <option value="4">4. Cliente contactado</option>
            <option value="5">5. OST confirmado</option>
            <option value="6">6. Por visitar</option>
            <option value="7">7. Visitado</option>
            <option value="8">8. Servicio Completo </option>
            <option value="9">9. Rechazado por técnico</option>
            <option value="10">10. En Espera</option>
            <option value="11">11. Critico Demora</option>
            <option value="12">12. Cliente Rechaza </option>
            <option value="13">13. Administracion Cierra </option>
            @break


            @case(1)             
           <option disabled="disabled">Seleccione...</option>
            <option value="0">0. PreOrden</option>
            <option value="1" selected="selected">1. Sin Asignar</option>
            <option value="2">2. Asignado sin Contacto</option>
            <option value="3">3. Aceptado por técnico</option>
            <option value="4">4. Cliente contactado</option>
            <option value="5">5. OST confirmado</option>
            <option value="6">6. Por visitar</option>
            <option value="7">7. Visitado</option>
            <option value="8">8. Servicio Completo </option>
            <option value="9">9. Rechazado por técnico</option>
            <option value="10">10. En Espera</option>
            <option value="11">11. Critico Demora</option>
            <option value="12">12. Cliente Rechaza </option>
            <option value="13">13. Administracion Cierra </option>
            @break


            @case(2)             
           <option disabled="disabled">Seleccione...</option>
            <option value="0">0. PreOrden</option>
            <option value="1">1. Sin Asignar</option>
            <option value="2" selected="selected">2. Asignado sin Contacto</option>
            <option value="3">3. Aceptado por técnico</option>
            <option value="4">4. Cliente contactado</option>
            <option value="5">5. OST confirmado</option>
            <option value="6">6. Por visitar</option>
            <option value="7">7. Visitado</option>
            <option value="8">8. Servicio Completo </option>
            <option value="9">9. Rechazado por técnico</option>
            <option value="10">10. En Espera</option>
            <option value="11">11. Critico Demora</option>
            <option value="12">12. Cliente Rechaza </option>
            <option value="13">13. Administracion Cierra </option>
            @break


            @case(3)             
           <option disabled="disabled">Seleccione...</option>
            <option value="0">0. PreOrden</option>
            <option value="1">1. Sin Asignar</option>
            <option value="2">2. Asignado sin Contacto</option>
            <option value="3" selected="selected">3. Aceptado por técnico</option>
            <option value="4">4. Cliente contactado</option>
            <option value="5">5. OST confirmado</option>
            <option value="6">6. Por visitar</option>
            <option value="7">7. Visitado</option>
            <option value="8">8. Servicio Completo </option>
            <option value="9">9. Rechazado por técnico</option>
            <option value="10">10. En Espera</option>
            <option value="11">11. Critico Demora</option>
            <option value="12">12. Cliente Rechaza </option>
            <option value="13">13. Administracion Cierra </option>
            @break


            @case(4)             
           <option disabled="disabled">Seleccione...</option>
            <option value="0">0. PreOrden</option>
            <option value="1">1. Sin Asignar</option>
            <option value="2">2. Asignado sin Contacto</option>
            <option value="3">3. Aceptado por técnico</option>
            <option value="4" selected="selected">4. Cliente contactado</option>
            <option value="5">5. OST confirmado</option>
            <option value="6">6. Por visitar</option>
            <option value="7">7. Visitado</option>
            <option value="8">8. Servicio Completo </option>
            <option value="9">9. Rechazado por técnico</option>
            <option value="10">10. En Espera</option>
            <option value="11">11. Critico Demora</option>
            <option value="12">12. Cliente Rechaza </option>
            <option value="13">13. Administracion Cierra </option>
            @break


            @case(5)             
           <option disabled="disabled">Seleccione...</option>
            <option value="0">0. PreOrden</option>
            <option value="1">1. Sin Asignar</option>
            <option value="2">2. Asignado sin Contacto</option>
            <option value="3">3. Aceptado por técnico</option>
            <option value="4">4. Cliente contactado</option>
            <option value="5" selected="selected">5. OST confirmado</option>
            <option value="6">6. Por visitar</option>
            <option value="7">7. Visitado</option>
            <option value="8">8. Servicio Completo </option>
            <option value="9">9. Rechazado por técnico</option>
            <option value="10">10. En Espera</option>
            <option value="11">11. Critico Demora</option>
            <option value="12">12. Cliente Rechaza </option>
            <option value="13">13. Administracion Cierra </option>
            @break


            @case(6)             
           <option disabled="disabled">Seleccione...</option>
            <option value="0">0. PreOrden</option>
            <option value="1">1. Sin Asignar</option>
            <option value="2">2. Asignado sin Contacto</option>
            <option value="3">3. Aceptado por técnico</option>
            <option value="4">4. Cliente contactado</option>
            <option value="5">5. OST confirmado</option>
            <option value="6" selected="selected">6. Por visitar</option>
            <option value="7">7. Visitado</option>
            <option value="8">8. Servicio Completo </option>
            <option value="9">9. Rechazado por técnico</option>
            <option value="10">10. En Espera</option>
            <option value="11">11. Critico Demora</option>
            <option value="12">12. Cliente Rechaza </option>
            <option value="13">13. Administracion Cierra </option>
            @break


            @case(7)             
           <option disabled="disabled">Seleccione...</option>
            <option value="0">0. PreOrden</option>
            <option value="1">1. Sin Asignar</option>
            <option value="2">2. Asignado sin Contacto</option>
            <option value="3">3. Aceptado por técnico</option>
            <option value="4">4. Cliente contactado</option>
            <option value="5">5. OST confirmado</option>
            <option value="6">6. Por visitar</option>
            <option value="7" selected="selected">7. Visitado</option>
            <option value="8">8. Servicio Completo </option>
            <option value="9">9. Rechazado por técnico</option>
            <option value="10">10. En Espera</option>
            <option value="11">11. Critico Demora</option>
            <option value="12">12. Cliente Rechaza </option>
            <option value="13">13. Administracion Cierra </option>
            @break


            @case(8)             
           <option disabled="disabled">Seleccione...</option>
            <option value="0">0. PreOrden</option>
            <option value="1">1. Sin Asignar</option>
            <option value="2">2. Asignado sin Contacto</option>
            <option value="3">3. Aceptado por técnico</option>
            <option value="4">4. Cliente contactado</option>
            <option value="5">5. OST confirmado</option>
            <option value="6">6. Por visitar</option>
            <option value="7">7. Visitado</option>
            <option value="8" selected="selected">8. Servicio Completo </option>
            <option value="9">9. Rechazado por técnico</option>
            <option value="10">10. En Espera</option>
            <option value="11">11. Critico Demora</option>
            <option value="12">12. Cliente Rechaza </option>
            <option value="13">13. Administracion Cierra </option>
            @break


            @case(9)             
           <option disabled="disabled">Seleccione...</option>
            <option value="0">0. PreOrden</option>
            <option value="1">1. Sin Asignar</option>
            <option value="2">2. Asignado sin Contacto</option>
            <option value="3">3. Aceptado por técnico</option>
            <option value="4">4. Cliente contactado</option>
            <option value="5">5. OST confirmado</option>
            <option value="6">6. Por visitar</option>
            <option value="7">7. Visitado</option>
            <option value="8">8. Servicio Completo </option>
            <option value="9" selected="selected">9. Rechazado por técnico</option>
            <option value="10">10. En Espera</option>
            <option value="11">11. Critico Demora</option>
            <option value="12">12. Cliente Rechaza </option>
            <option value="13">13. Administracion Cierra </option>
            @break


            @case(10)             
           <option disabled="disabled">Seleccione...</option>
            <option value="0">0. PreOrden</option>
            <option value="1">1. Sin Asignar</option>
            <option value="2">2. Asignado sin Contacto</option>
            <option value="3">3. Aceptado por técnico</option>
            <option value="4">4. Cliente contactado</option>
            <option value="5">5. OST confirmado</option>
            <option value="6">6. Por visitar</option>
            <option value="7">7. Visitado</option>
            <option value="8">8. Servicio Completo </option>
            <option value="9">9. Rechazado por técnico</option>
            <option value="10" selected="selected">10. En Espera</option>
            <option value="11">11. Critico Demora</option>
            <option value="12">12. Cliente Rechaza </option>
            <option value="13">13. Administracion Cierra </option>
            @break


            @case(11)             
           <option disabled="disabled">Seleccione...</option>
            <option value="0">0. PreOrden</option>
            <option value="1">1. Sin Asignar</option>
            <option value="2">2. Asignado sin Contacto</option>
            <option value="3">3. Aceptado por técnico</option>
            <option value="4">4. Cliente contactado</option>
            <option value="5">5. OST confirmado</option>
            <option value="6">6. Por visitar</option>
            <option value="7">7. Visitado</option>
            <option value="8">8. Servicio Completo </option>
            <option value="9">9. Rechazado por técnico</option>
            <option value="10">10. En Espera</option>
            <option value="11" selected="selected">11. Critico Demora</option>
            <option value="12">12. Cliente Rechaza </option>
            <option value="13">13. Administracion Cierra </option>
            @break


            @case(12)             
           <option disabled="disabled">Seleccione...</option>
            <option value="0">0. PreOrden</option>
            <option value="1">1. Sin Asignar</option>
            <option value="2">2. Asignado sin Contacto</option>
            <option value="3">3. Aceptado por técnico</option>
            <option value="4">4. Cliente contactado</option>
            <option value="5">5. OST confirmado</option>
            <option value="6">6. Por visitar</option>
            <option value="7">7. Visitado</option>
            <option value="8">8. Servicio Completo </option>
            <option value="9">9. Rechazado por técnico</option>
            <option value="10">10. En Espera</option>
            <option value="11">11. Critico Demora</option>
            <option value="12" selected="selected">12. Cliente Rechaza </option>
            <option value="13">13. Administracion Cierra </option>
            @break


            @case(13)             
           <option disabled="disabled">Seleccione...</option>
            <option value="0">0. PreOrden</option>
            <option value="1">1. Sin Asignar</option>
            <option value="2">2. Asignado sin Contacto</option>
            <option value="3">3. Aceptado por técnico</option>
            <option value="4">4. Cliente contactado</option>
            <option value="5">5. OST confirmado</option>
            <option value="6">6. Por visitar</option>
            <option value="7">7. Visitado</option>
            <option value="8">8. Servicio Completo </option>
            <option value="9">9. Rechazado por técnico</option>
            <option value="10">10. En Espera</option>
            <option value="11">11. Critico Demora</option>
            <option value="12">12. Cliente Rechaza </option>
            <option value="13" selected="selected">13. Administracion Cierra </option>
            @break


            @default
           <option disabled="disabled"  selected="selected">Seleccione...</option>
            <option value="0">0. PreOrden</option>
            <option value="1">1. Sin Asignar</option>
            <option value="2">2. Asignado sin Contacto</option>
            <option value="3">3. Aceptado por técnico</option>
            <option value="4">4. Cliente contactado</option>
            <option value="5">5. OST confirmado</option>
            <option value="6">6. Por visitar</option>
            <option value="7">7. Visitado</option>
            <option value="8">8. Servicio Completo </option>
            <option value="9">9. Rechazado por técnico</option>
            <option value="10">10. En Espera</option>
            <option value="11">11. Critico Demora</option>
            <option value="12">12. Cliente Rechaza </option>
            <option value="13">13. Administracion Cierra </option>
            @break                     

            @endswitch
            
            
            

          </select>
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

<div class="box-footer " id="guardar">
  <div class="row">
    <div class="col-sm-12">

      <div class="col-xs-0 col-sm-0 col-lg-3 text-center" style="padding-bottom: 5px; padding-top: 5px"></div>
      <div class="col-xs-12 col-sm-4 col-lg-2 text-center" style="padding-bottom: 5px; padding-top: 5px">

        <a href="{{route('servicios.osts.index')}}" class="btn btn-info btn_end" id="back" >Atras</a><br>

      </div>
      <div class="col-xs-12 col-sm-4 col-lg-2 text-center" style="padding-bottom: 5px; padding-top: 5px">


       <a href="{{route('servicios.osts.edit',['idost' => Crypt::encrypt($data->idost)])}}" class="btn btn-default btn_end" id="back" >Limpiar</a><br>

     </div>
     <div class="col-xs-12 col-sm-4 col-lg-2 text-center"  style="padding-bottom: 5px; padding-top: 5px">


      <button id="guaradr" class="btn btn-danger btn_end" type="submit" > Guardar </button>


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

    $("a").click(function(event) {

      var element = document.getElementById('#ldeleate');


      console.log(element);

    });

  });





</script>
@endsection

