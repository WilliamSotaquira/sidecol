@extends ('layouts.admin')
@section ('contenido')
@include('productos.bodegas.encabezado')

@can('bodegas.index')
<section class="content">


	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Bodegas Agregados</h3>

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
          @can('bodegas.create')
          <center><a href="{{route ('productos.bodegas.create')}}" ><button class="btn btn-success">Crear Nuevo Registro</button></a></center>
          @endcan
        </div>
        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
         @include('productos.bodegas.search')
       </div> 
     </div>
     <div class="box-body">	


       <div class="table-responsive">
        <table id="tbl_rol" class="table table-striped table-condensed table-hover">
         <thead>

          <th>ID</th>
          <th>Tipo Bodega</th>
          <th>Descripción</th>
          <th>Estado</th>
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
        @foreach($bodegas as $bodega)
        <tr>
         <td class="text-center">{{$bodega->idBodega}}</td>
         <td>{{$bodega->TipoBodega}}</td>
         <td>{{$bodega->Descripcion}}</td>
         <td>
           @if ($bodega->Estado===0)  
           {{ $bodega->Estado='Desactivada'}}

           @elseif ($bodega->Estado===1) 
           {{ $bodega->Estado='Activa'}}

           @elseif ($bodega->Estado===2)
           {{ $bodega->Estado='Eliminada'}} 

           @endif  
         </td>

         <td>
          @can('bodegas.edit')
          <a href="{{route ('productos.bodegas.edit', $bodega->idBodega )}}" class="btn btn-sm btn-info"> Editar </a>
          @endcan
        </td>
        <td>
         <a href="" data-target=" #modal-delete-{{$bodega->idBodega}}" data-toggle="modal"><button class="btn btn-sm btn-danger">Eliminar</button></a> 
       </td>
     </tr>



     @include('productos.bodegas.modal')   
     @endforeach
   </tbody>



 </table>
 {{$bodegas->render()}}

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