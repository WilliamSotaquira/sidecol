@extends ('layouts.admin')
@section ('contenido')
@include('productos.productos.encabezado')

@can('productos.index')
<section class="content">


	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Productos</h3>

			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
				</button>
				<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
			</div>
		</div>
		<!-- /.box-header -->
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

      <div class="row mt-1 justify-content-between align-items-center" >
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
          @can('productos.create')
          <center><a href="{{route ('productos.productos.create')}}" ><button class="btn btn-success">Crear Nuevo Registro</button></a></center>
          @endcan
        </div>
        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
         @include('productos.productos.search')
       </div> 
     </div>
     <div class="box-body">	


       <div class="table-responsive">
        <table id="tbl_rol" class="table table-striped table-condensed table-hover">
         <thead>

          <th>ID</th>
          <th>Referencia</th>
          <th>Descripción</th>
          <th>Marca</th>
          <th>Categoría</th>
          <th>Estado</th>
          <th colspan="3">Opciones</th>

        </thead>

        <tfoot>

          <tr>

           <th></th>
           <th></th>
           <th></th>
           <th></th>
           <th></th>
           <th></th>
           <th colspan="3"></th>
         </tr>
       </tfoot>

       <tbody>
        @foreach($productos as $producto)
        <tr>
         <td>{{$producto->idproducto}}</td>
         <td>{{$producto->referencia}}</td>
         @if($producto->articulo == NULL)
         <td>Sin descripción</td>
         @else
         <td>{{$producto->articulo}}</td>
         @endif
         <td>{{$producto->marca}}</td>
         <td>{{$producto->categoria}} - {{$producto->subcategoria}}</td>
         <td>
          @if ($producto->estado=='1')                               
          {{ $producto->estado='Activo'}}
          @elseif ($producto->estado=='0')                               
          {{ $producto->estado='Inactivo'}}
          @elseif ($producto->estado=='2')       
          {{ $producto->estado='Eliminado'}}
          @endif            

        </td>
        <td>
          <a href="{{route('productos.productos.show',$producto->idproducto)}}" class="btn btn-sm btn-default"> Ver </a>                     
        </td>
        <td>
          @can('productos.edit')
          <a href="{{route ('productos.productos.edit', $producto->idproducto )}}" class="btn btn-sm btn-info"> Editar </a>
          @endcan
        </td>
        <td>
         <a href="" data-target=" #modal-delete-{{$producto->idproducto}}" data-toggle="modal">
          <button class="btn btn-sm btn-danger">Eliminar</button>
        </a> 
      </td>
    </tr>
    @include('productos.productos.modal')  
    @endforeach
  </tbody>
</table>
{{$productos->render()}}

</div>	

</div>



</div>
</div>

</section>
@endcan
@endsection