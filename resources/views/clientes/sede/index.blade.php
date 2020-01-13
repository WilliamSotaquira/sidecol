@extends ('layouts.admin')
@section ('contenido')

<section class="content-header">
	<h1>
		Menú de Sucursales
		<small>Version 2.0</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="/"><i class="fa fa-dashboard"></i> Inicio</a></li>
		<li><a href="/">Comercial</a></li>
		<li><a href="/">Clientes</a></li>
		<li class="active">Sucursales</li>
	</ol>
</section>
@can('sedes.index')
<section class="content"> 


	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Sucursales Agragadas</h3>

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


			<div class="row mt-1 justify-content-between align-items-center" >
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
          @can('sedes.create')
          <center><a href="{{route ('clientes.sede.create')}}" ><button class="btn btn-success">Crear Nuevo Registro</button></a></center>
          @endcan
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
         <br>
       </div>
       <div class="col-lg-7 col-md-7 col-sm-7 col-xs-11">
         @include('clientes.sede.search')
       </div>
       <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
         <br>
       </div>
     </div>
   

     <div class="table-responsive">
      <table id="table_sede" class="table table-striped table-condensed table-hover">
       <thead>
        			<!-- 			/**
            protected $table='tbl_sede';
            protected $primaryKey='idtbl_sede';
            public $timestamps=false;

                // idtbl_sede
                // nombresede
                // email
                // direccion
                // telefono
                // estado
                // fk_organizacion
                // fk_ciudad

              -->
              <th>Organizacion</th>
              <th>Nombre Sede</th>
              <th>Email</th>
              <th>Direccion</th>
              <th>Telefono</th>
              <th>Estado</th>
              <th>Ciudad</th>
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
                <th></th>
                <th colspan="3"></th>
              </tr>
            </tfoot>

            <tbody>
              @foreach($sede as $sd)
              <tr>
               <td>{{$sd->razonsocial}}</td>
               <td>{{$sd->nombresede}}</td>
               <td>{{$sd->email}}</td>
               <td>{{$sd->direccion}}</td>
               <td>{{$sd->telefono}}</td>             				
               <td>
                @if ($sd->estado=='1')                               
                {{ $sd->estado='Activo'}}
                @elseif ($sd->estado=='2')                               
                {{ $sd->estado='Inactivo'}}
                @else 
                {{ $sd->estado='Eliminado'}}
                @endif            

              </td>
              <td>{{$sd->municipio}}&nbsp;</td>
              <td>
                @can('sede.show')
                <a href="{{route ('clientes.sede.show', $sd->idtbl_sede )}}" class="btn btn-sm btn-default"> Ver </a>&nbsp;
                @endcan
              </td>
              <td>
                @can('sede.edit')
                <a href="{{route ('clientes.sede.edit', $sd->idtbl_sede )}}" class="btn btn-sm btn-info"> Editar </a>&nbsp;
                @endcan
              </td>
              <td>
                @can('sede.destroy')
                <a href="" data-target=" #modal-delete-{{$sd->idtbl_sede}}" data-toggle="modal"><button class="btn btn-sm btn-danger">Eliminar</button></a> 
                @endcan
              </td>
            </tr>


            @include('clientes.sede.modal')     
            @endforeach
          </tbody>



        </table>
        {{$sede->render()}} 

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