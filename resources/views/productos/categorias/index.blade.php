@extends ('layouts.admin')
@section ('contenido')
@include('productos.categorias.encabezado')

@can('categorias.index')
<section class="content">


	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Categorías Agregadas</h3>

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
          @can('categorias.create')
          <center><a href="{{route ('productos.categorias.create')}}" ><button class="btn btn-success">Crear Nuevo Registro</button></a></center>
          @endcan
        </div>
        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
         @include('productos.categorias.search')
       </div> 
     </div>
     <div class="box-body">	


       <div class="table-responsive">
        <table id="tbl_rol" class="table table-striped table-condensed table-hover">
         <thead>

          <th>ID</th>
          <th>Categoría</th>
          <th>Estado</th>
          <th>Desde</th>
          <th>Ultima Edición</th>
          <th colspan="2">Opciones</th>

        </thead>

        <tfoot>

          <tr>

           <th></th>
           <th></th>
           <th></th>
           <th></th>
           <th></th>
           <th colspan="2"></th>
         </tr>
       </tfoot>

       <tbody>
        @foreach($categorias as $categoria)
        <tr>
         <td class="text-center">{{$categoria->idcategoria}}</td>
         <td>{{$categoria->categoria}}</td>
         <td>
           @if ($categoria->estado===0)  
           {{ $categoria->estado='Desactivada'}}

           @elseif ($categoria->estado===1) 
           {{ $categoria->estado='Activa'}}

           @elseif ($categoria->estado===2)
           {{ $categoria->estado='Eliminada'}} 

           @endif  
         </td>
         <td>{{$categoria->created_at}}</td>
         <td>{{$categoria->updated_at}}</td>

         <td>
          @can('categorias.edit')
          <a href="{{route ('productos.categorias.edit', $categoria->idcategoria )}}" class="btn btn-sm btn-info"> Editar </a>
          @endcan
        </td>
        <td>
         <a href="" data-target=" #modal-delete-{{$categoria->idcategoria}}" data-toggle="modal"><button class="btn btn-sm btn-danger">Eliminar</button></a> 
       </td>
     </tr>



     @include('productos.categorias.modal') 
     @endforeach
   </tbody>



 </table>
 {{$categorias->render()}}

</div>	

</div>

<!-- /.box-body -->
		<!-- <div class="box-footer text-center"
			<a href="javascript:void(0)" class="uppercase"></a>
		</div> -->
		<!-- /.box-footer -->

  </div>
</div>

</section>
@endcan
@endsection