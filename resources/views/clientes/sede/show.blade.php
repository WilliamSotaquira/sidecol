@extends ('layouts.admin')
@section ('contenido')

<section class="content-header">
	<h1>                  
		Menú de Sucursal
		<small>Version 2.0</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="/"><i class="fa fa-dashboard"></i> Inicio</a></li>
		<li><a href="/">Comercial</a></li>
		<li><a href="/">Clientes</a></li>
		<li><a href="/">Sucursal</a></li>
		<li class="active">Ver Registro</li>
	</ol>
</section>
@can('organizacion.index')
<section class="content">

	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Informacion del Registro</h3>

			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
				</button>
				<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
			</div>
		</div>

		<!-- /.box-header -->
		<!-- form start -->
    <!--
            * idtbl_organizacion
            * nit
            * razonsocial
            * logo     
            * margen
            * estado 
          -->
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
              <h4><i class="icon fa fa-ban"></i> Error!</h4>
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
              <div class="col-xs-12 col-sm-8">

               <div class="row row-first">
                <div class="col-xs-12 col-sm-12">
                  <div class="form-group">
                    <label for="nombresede" class="col-xs-12 col-sm-2 control-label">Sede</label>
                    <div class="col-sm-10">
                     <input type="text" class="form-control" name="nombresede" id="nombresede" style="font-weight: bold;" value="{{$forms->nombresede}}" disabled >
                   </div> 
                 </div> 
               </div> 
             </div> 

             <div class="row ">
              <div class="col-xs-12 col-sm-12">
                <div class="form-group">
                  <label for="email" class="col-xs-12 col-sm-2 control-label">E-mail</label>
                  <div class="col-sm-10">
                   <input type="email" class="form-control" name="email" id="email" value="{{$forms->email}}" disabled >
                 </div> 
               </div> 
             </div> 
           </div> 

           <div class="row ">
            <div class="col-xs-12 col-sm-12">
              <div class="form-group">
                <label for="direccion" class="col-xs-12 col-sm-2 control-label">Dirección</label>
                <div class="col-sm-10">
                 <input type="text" class="form-control" name="direccion" id="direccion"  value="{{$forms->direccion}}" disabled >
               </div> 
             </div> 
           </div> 
         </div> 

         <div class="row ">
          <div class="col-xs-12 col-sm-12">
            <div class="form-group">
              <label for="telefono" class="col-xs-12 col-sm-2 control-label">Telefono</label>
              <div class="col-sm-10">
               <input type="text" class="form-control" name="telefono" id="telefono" value="{{$forms->telefono}}" disabled >
             </div> 
           </div> 
         </div> 
       </div>

       <div class="row">
        <div class="col-xs-12 col-sm-12">
          <div class="form-group">
            <label for="estado" class="col-xs-12 col-sm-2 control-label">Estado</label>
            <div class="col-sm-10">
             <select name="estado" class="form-control selectpiker" data-live-search="true" id="estado" disabled="">
              <option selected disabled="true">Seleccione &hellip;</option>                  
              @if ($forms->estado==='0')                        
              <option value="0" selected >Inactivo</option>
              @elseif ($forms->estado==='1')
              <option value="1" selected >Activo</option>
              @else
              <option value="2" selected>Eliminado</option>        
              @endif    
            </select>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-xs-12 col-sm-12">
        <div class="form-group">
          <label for="nit" class="col-xs-12 col-sm-2 control-label">NIT</label>
          <div class="col-sm-10">
           <input type="text" class="form-control" name="nit" id="nit" value="{{$forms->nit}}" disabled >
         </div> 
       </div> 
     </div> 
   </div> 

   <div class="row">
    <div class="col-xs-12 col-sm-12">
      <div class="form-group">
       <label for="razonsocial" class="col-xs-12 col-sm-2 control-label">Razon Social</label>
       <div class="col-sm-10">
         <input type="text" class="form-control" style="font-weight: bold;" name="razonsocial" id="razonsocial" value="{{$forms->razonsocial}}" disabled="">
       </div>
     </div>
   </div>
 </div>

 <div class="row ">
  <div class="col-xs-12 col-sm-12">
    <div class="form-group">
      <label for="municipio" class="col-xs-12 col-sm-2 control-label">Ciudad</label>
      <div class="col-sm-10">
       <input type="text" class="form-control" name="municipio" id="municipio" value="{{$forms->municipio}}" disabled >
     </div> 
   </div> 
 </div> 
</div>

<div class="row ">
  <div class="col-xs-12 col-sm-12">
    <div class="form-group">
      <label for="departamento" class="col-xs-12 col-sm-2 control-label">Departamento</label>
      <div class="col-sm-10">
       <input type="text" class="form-control" name="departamento" id="departamento" value="{{$forms->departamento}}" disabled >
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

        <a href="{{route('clientes.sede.index')}}" class="btn btn-info btn_end" id="back" >Atras</a><br>

      </div>
      <div class="col-sm-2 text-center"  style="padding-bottom: 5px; padding-top: 5px"></div>
      <div class="col-sm-3 text-center" style="padding-bottom: 5px; padding-top: 5px"></div>

    </div>
  </div>
</div>
</div>


</div>


</div>    
</section>

@endcan
@endsection
@section('scripts')
<link rel="stylesheet" type="text/css" href="{{asset ('css/img.css')}}">


@endsection