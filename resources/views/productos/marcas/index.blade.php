@extends ('layouts.admin')
@section ('contenido')
@include('productos.marcas.encabezado')

<section class="content">


	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Marcas Agragadas</h3>

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
          @can('marcas.create')
          <center><a href="{{route ('productos.marcas.create')}}" ><button class="btn btn-success">Crear Nuevo Registro</button></a></center>
          @endcan
        </div>
       <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
         @include('productos.marcas.search')
       </div> 
     </div>
   </div>
   <div class="box-body">	
     <div class="table-responsive">
      <table id="table_marcas" class="table table-striped table-condensed table-hover">
       <thead>
						
             			<th class="text-center">ID</th>
             			<th>Marca</th>
             			<th>Tiempo Garantía</th>
             			<th>Lógo</th>
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
             			@foreach($marcas as $marca)
             			<tr>
             				<td class="text-center">{{$marca->idmarca}}</td>
             				<td>{{$marca->marca}}</td>
             				<td>{{$marca->tiempogarantia}} meses</td>
                    <td><img src="{{asset ($marca->image)}}" alt="Sin imagen" height="100px" width="100px" class="img-thumbnail"></td>

                    <td>
                      @can('marcas.edit')
                      <a href="{{route ('productos.marcas.edit', $marca->idmarca )}}" class="btn btn-sm btn-info"> Editar </a>&nbsp;
                      @endcan
                    </td>
                    <td>
                      @can('marcas.destroy')
                      <a href="" data-target=" #modal-delete-{{$marca->idmarca}}" data-toggle="modal"><button class="btn btn-sm btn-danger">Eliminar</button></a> 
                      @endcan
                    </td>
                  </tr> 

                  @include('productos.marcas.modal')

                  @endforeach
                </tbody>



              </table>
              {{$marcas->render()}}

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

@endsection