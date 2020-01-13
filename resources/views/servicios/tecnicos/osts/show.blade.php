@extends ('layouts.admin')
@section ('contenido')
@include('servicios.tecnicos.encabezado')


@can('tecnicos.index')
<section class="content">

	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Detalle del Servicio</h3>

			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
				</button>
				<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
			</div>
		</div>   

    <div class="box-body">
      <div class="container-fluid">

       @if(session()->has('success'))
       <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> ¡Completado!</h4>
        {{session('success')}}    
      </div>
      @elseif(session()->has('danger'))
      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-ban"></i> ¡Advertencia!</h4>
        {{session('danger')}}          
      </div>
      @elseif(session()->has('warning'))
      <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-ban"></i> ¡Alerta!</h4>
        {{session('warning')}}          
      </div>
      @endif

      <div class="box-body">

        <div class="row-specialfirst">
          <div class="col-sm-12">
           <div class="panel panel-info row-specialfirst">
            <div class="row row-first">

              <div class="col-xs-12 col-sm-6">
               <div class="form-group">
                <label for="tipo" class="col-xs-12 col-sm-4" >Tipo Servicio</label>
                <div class="col-sm-7">
                  <select id="tipo" name="tipo" class="selectpicker form-control" autofocus="autofocus" data-live-search="true" id="tipo" disabled="disabled">
               
                    @switch($datos->tipo)
                    @case(1)
                    <option selected="selected" value="1">1. Instalación</option>
                    @break

                    @case(2)
                    <option selected="selected" value="2">2. Mantenimiento</option>
                    @break

                    @case(3)
                    <option selected="selected" value="3">3. Garantía</option>
                    @break

                    @case(4)
                    <option selected="selected" value="4">4. Otro</option>
                    @break

                    @default
                    <option selected disabled="true">Seleccione &hellip;</option>
                    @endswitch

                  </select>                                              
                </div>          
              </div>
            </div>

            <div class="col-xs-12 col-sm-6">
              <div class="form-group">
                <label for="producto_id" class="col-xs-12 col-sm-4 control-label">Producto</label>
                <div class="col-sm-7">
                 <select name="producto_id" class="form-control selectpicker"  data-size="6" data-live-search="true" id="producto_id" value="{{old('producto_id')}}"  disabled="disabled">
                   <option selected="selected" value="{{$datos->idproducto}}">{{$datos->referencia}}</option>


                 </select>
               </div>
             </div>
           </div>

         </div></div>
       </div>
     </div>

     <div class="row-specialdown " id="detalle">
      <div class="col-sm-12">
       <div class="panel panel-default row-specialdown">
        <div class="row row-first"> 

          <!-- fila 1 -->

          <div class="col-xs-12 col-sm-6"> 
            <div class="container-fluid">

              <div class="row">
                <div class="form-group">
                  <label for="contacto" class="col-xs-12 col-sm-4 control-label">Persona de Contacto *</label>
                  <div class="col-sm-7">
                   <input type="text" class="form-control" autocomplete="autocomplete" name="contacto" id="contacto" placeholder="Nombre Completo" value="{{$datos->contacto}}" disabled="disabled" ">
                 </div> 
               </div>
             </div>

             <div class="row">
               <div class="form-group">
                <label for="direccion" class="col-xs-12 col-sm-4 control-label">Dirección *</label>
                <div class="col-sm-7">
                 <input type="text" class="form-control" autocomplete="autocomplete" name="direccion" id="direccion" value="{{$datos->direccion}}" disabled="disabled" ">
               </div> 
             </div>
           </div>

           <div class="row">
            <div class="form-group">s
              <label for="municipio_id" class="col-xs-12 col-sm-4 control-label">Ciudad *</label>
              <div class="col-sm-7">
                <select name="municipio_id" class="form-control selectpicker" data-size="6" data-live-search="true" id="municipio_id" value="{{$datos->municipio}}" disabled="disabled">
                  <option selected="selected" value="{{$datos->id_municipio}}">{{$datos->departamento}} - {{$datos->municipio}}</option>

               </select>
             </div>
           </div>
         </div>

         <div class="row">
           <div class="form-group">
            <label for="email" class="col-xs-12 col-sm-4 control-label">E-mail *</label>
            <div class="col-sm-7">
             <input type="email" class="form-control" autocomplete="autocomplete" name="email" id="email" value="{{$datos->email}}" disabled="disabled" ">
           </div> 
         </div>
       </div>

       <div class="row">
         <div class="form-group">
          <label for="celular" class="col-xs-12 col-sm-4 control-label">celular *</label>
          <div class="col-sm-7">
           <input type="number" class="form-control" autocomplete="autocomplete" name="celular" id="celular" value="{{$datos->celular}}" disabled="disabled" ">
         </div> 
       </div>
     </div>

     <div class="row">
       <div class="form-group">
        <label for="telefono" class="col-xs-12 col-sm-4 control-label">Telefono</label>
        <div class="col-sm-7">
         <input type="number" class="form-control" autocomplete="autocomplete" name="telefono" id="telefono" value="{{$datos->telefono}}" disabled="disabled" >
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
         <input type="text" class="form-control" autocomplete="autocomplete" name="falla" id="falla" value="{{$datos->falla}}" disabled="disabled" ">
       </div></div> 
     </div>


     <div class="row">
      <div class="form-group">
        <label for="estado_garantia" class="col-xs-12 col-sm-4 control-label">Estado Garantía</label>
        <div class="col-sm-7">
         <input type="text" class="form-control" autocomplete="autocomplete" name="estado_garantia" id="estado_garantia" value="{{$datos->estado_garantia}}" disabled="disabled" >
       </div></div> 
     </div>


     <div class="row">
      <div class="form-group">
        <label for="nro_factura" class="col-xs-12 col-sm-4 control-label">Numero Factura</label>
        <div class="col-sm-7">
         <input type="text" class="form-control" autocomplete="autocomplete" name="nro_factura" id="nro_factura" value="{{$datos->nro_factura}}" disabled="disabled" >
       </div></div> 
     </div>


     <div class="row">
      <div class="form-group">
        <label for="nro_serie" class="col-xs-12 col-sm-4 control-label">Numero Serie </label>
        <div class="col-sm-7">
         <input type="text" class="form-control" autocomplete="autocomplete" name="nro_serie" id="nro_serie" value="{{$datos->nro_serie}}" disabled="disabled" >
       </div></div> 
     </div>


     <div class="row">
      <div class="form-group">
        <label for="observaciones" class="col-xs-12 col-sm-4 control-label">Observaciones</label>
        <div class="col-sm-7">
         <textarea name="observaciones" id="observaciones" class="form-control" rows="3" disabled="disabled">{{$datos->observaciones}}</textarea>
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
</div>


<div class="box-footer " id="guardar">
  <div class="container-fluid">
    <div class="row-bottons">
      <div class="col-sm-12">
       <div class="col-sm-3 text-center" style="padding-bottom: 5px; padding-top: 5px"></div>
       <div class="col-sm-2 text-center" style="padding-bottom: 5px; padding-top: 5px"></div>
       <div class="col-sm-2 text-center" style="padding-bottom: 5px; padding-top: 5px">

        <a href="{{route('servicios.tecnicos.index')}}" class="btn btn-info btn_end" id="back" >Atras</a><br>

      </div>
      <div class="col-sm-2 text-center"  style="padding-bottom: 5px; padding-top: 5px"></div>
      <div class="col-sm-3 text-center" style="padding-bottom: 5px; padding-top: 5px"></div>

    </div>
  </div>
</div>
</div>
</div>

</section>

@endcan
@endsection
