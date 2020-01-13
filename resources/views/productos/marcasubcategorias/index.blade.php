@extends ('layouts.admin')
@section ('contenido')
@include('productos.marcasubcategorias.encabezado')



<section class="content">


  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Asignaciónes agregadas de Subcategorias a Marcas </h3>

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
            @can('marcasubcategorias.create')
            <center><a href="{{route ('productos.marcasubcategorias.create')}}" ><button class="btn btn-success">Crear Nueva Asignación</button></a></center>
            @endcan
          </div>
          <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">

           @include('productos.marcasubcategorias.search') 

         </div> 
       </div>
       <div class="box-body">  


        <div class="table-responsive">
          <table id="tbl_rol" class="table table-striped table-condensed table-hover">
            <thead>

              <th width="10%"><center>ID</center></th>
              <th width="20%">Marca</th>
              <th width="30%">Subcategoria Asignada</th>
              <th width="20%" colspan="2"><center>Opciones</center></th>

            </thead>

            <tfoot>

              <tr>

                <th></th>
                <th></th>
                <th></th>
                <th colspan="2"></th>

              </tr>
            </tfoot>

            <tbody>
              @foreach($marcasubcategorias as $marcasubcategoria)
              <tr>
                <td class="text-center">{{$marcasubcategoria->idmarcasubcategoria}}</td>
                <td>{{$marcasubcategoria->idmarca}} - {{$marcasubcategoria->marca}} </td>
                <td>{{$marcasubcategoria->idsubcategoria}}- {{$marcasubcategoria->subcategoria}}</td>
                <td align="center">
                  @can('marcasubcategorias.edit')
                  <a href="{{route ('productos.marcasubcategorias.edit', $marcasubcategoria->idmarcasubcategoria )}}" class="btn btn-sm btn-info"> Editar </a>
                  @endcan
                </td>
                <td align="center">
                  @can('marcasubcategorias.destroy')
                  <a href="" data-target=" #modal-delete-{{$marcasubcategoria->idmarcasubcategoria}}" data-toggle="modal"><button class="btn btn-sm btn-danger">Eliminar</button></a> 
                  @endcan
                </td>
              </tr>
              <!-- modal -->
              @include('productos.marcasubcategorias.modal')  
              <!-- fin del modal -->
              @endforeach
            </tbody>



          </table>
          {{$marcasubcategorias->render()}}

        </div>  

      </div>

      <!-- /.box-bod
        y -->
    <!-- <div class="box-footer text-center"
      <a href="javascript:void(0)" class="uppercase"></a>
    </div> -->
    <!-- /.box-footer -->

  </div>
</div>

</section>


@endsection