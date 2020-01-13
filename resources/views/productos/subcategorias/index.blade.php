@extends ('layouts.admin')
@section ('contenido')
@include('productos.subcategorias.encabezado')


@can('subcategorias.index')
<section class="content"> 


	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">SubCategorías Agragadas</h3>

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
        <h4><i class="icon fa fa-ban"></i> ¡Eliminado!</h4>
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
          @can('subcategorias.create')
          <center><a href="{{route ('productos.subcategorias.create')}}" ><button class="btn btn-success">Crear Nuevo Registro</button></a></center>
          @endcan
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
         <br>
       </div>
       <div class="col-lg-7 col-md-7 col-sm-7 col-xs-11">
         @include('productos.subcategorias.search')
       </div>
       <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
         <br>
       </div>
     </div>


     <div class="table-responsive">
      <table id="table_sede" class="table table-striped table-condensed table-hover">
       <thead>

        <th class="text-center">ID</th>
        <th>Categoría</th>
        <th>Nombre SubCategoría</th>
        <th>Estado</th>
        <th colspan="2">Opciones</th>

      </thead>

      <tfoot>

        <tr>

          <th></th>
          <th></th>
          <th></th>
          <th></th>
          <th colspan="2"></th>
        </tr>
      </tfoot>

      <tbody>
        @foreach($subcategorias as $sc)
        <tr>
         <td class="text-center">{{$sc->idsubcategoria}}</td>
         <td>{{$sc->categoria}}</td>
         <td>{{$sc->subcategoria}}</td>
         <td>
          @if ($sc->estado=='0')                               
          {{ $sc->estado='Activo'}}
          @elseif ($sc->estado=='1')                               
          {{ $sc->estado='Deshabilitado'}}
          @elseif ($sc->estado=='2')                               
          {{ $sc->estado='Eliminado'}}
          @endif            

        </td>
        <td>
          @can('sede.edit')
          <a href="{{route ('productos.subcategorias.edit', $sc->idsubcategoria )}}" class="btn btn-sm btn-info"> Editar </a>&nbsp;
          @endcan
        </td>
        <td>
          @can('sede.destroy')
          <a href="" data-target=" #modal-delete-{{$sc->idsubcategoria}}" data-toggle="modal"><button class="btn btn-sm btn-danger">Eliminar</button></a> 
          @endcan
        </td>
      </tr>


      @include('productos.subcategorias.modal') 
      @endforeach
    </tbody>



  </table>
  {{$subcategorias->render()}} 

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