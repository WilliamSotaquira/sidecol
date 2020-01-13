@extends ('layouts.admin')
@section ('contenido')
@include('servicios.osts.encabezado')

@can('osts.index')
<section class="content">


	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Servicios Técnicos</h3>

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
          @can('osts.create')
          <center><a href="{{route ('servicios.osts.create')}}" ><button class="btn btn-success">Crear Nueva Orden</button></a></center>
          @endcan
        </div>
        <div class="col-xs-12 col-sm-1">
          <br>
        </div>
        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
         @include('servicios.osts.search')
       </div> 
     </div>
     
     <div class="box-body">	


       <div class="table-responsive">
        <table id="tbl_rol" class="table table-striped table-condensed table-hover text-center">
         <thead>

          <th width="5%">ID</th>
          <th width="10%">Contacto</th>
          <th width="10%">Tipo Servicio</th>
          <th width="10%">Estado</th>
          <th width="18%">Observaciones</th>
          <th width="15%">Ultima Actualización</th>
          <th width="20%" colspan="4">Opciones</th>

        </thead>

        <tfoot>
          <tr>
           <th></th>
           <th></th>
           <th></th>
           <th></th>
           <th></th>
           <th></th>
           <th colspan="4"></th>
         </tr>
       </tfoot>

       <tbody >
        @foreach($osts as $ost)
        <tr>
         <td><strong><a href="{{route('servicios.osts.show',['idost' => Crypt::encrypt($ost->idost),$ost->iddetalleost])}}" title="Ir a la Orden de Servicio "> OST{{$ost->idost}} </a></strong></td>
         
         <td>{{$ost->contacto_ost}}</td><!-- Contacto de OST -->
         <td>

          @if ($ost->tipo_os=='1')                               
          {{ $ost->tipo_os='Instalación'}}

          @elseif ($ost->tipo_os=='2')                               
          {{ $ost->tipo_os='Mantenimiento'}}

          @elseif ($ost->tipo_os=='3')       
          {{ $ost->tipo_os='Garantía'}}

          @elseif ($ost->tipo_os=='4')       
          {{ $ost->tipo_os='Otro'}}


          @endif    

        </td>

        <td>

          @switch($ost->estado_os)

          @case(0)
          <strong><p style="color: red;">PreOrden <br> de servicio</p></strong>
          @break

          @case(1)
          <strong><p style="color: red;">Sin Asignar</p></strong>
          @break

          @case(2)
          <p style="color: red;">Esperando aprobación <br> del técnico</p>
          @break

          @case(3)
          <p style="color:#3d9970;">Aceptado <br>por el técnico</p>
          @break

          @case(4)
          <p style="color:#3d9970;">Cliente <br> Contactado</p>
          @break

          @case(5)
          <p>Orden Confirmada</p>
          @break

          @case(6)
          <strong><p>Por visitar</p></strong>          
          @break

          @case(7)
          <strong><p>Cliente visitado</p></strong>
          @break

          @case(8)
          <p>Servicio Completado</p>
          @break

          @case(9)
          <strong><p>Rechazado por el técnico</p></strong>
          @break

          @case(10)

          @can('osts.show')
          @if($role_id==13 || $role_id==14)
          <a href="{{route('servicios.eventososts.create',['idost'=>Crypt::encrypt($ost->idost)])}}" class="btn btn-sm bg-navy">Agregar Novedad</a>
          @else
          @can('osts.show')
          <strong><a href="{{route('servicios.eventososts.index')}}" class="btn btn-sm bg-navy">En espera</a></strong>
          @endcan
          @endif
          @endcan

          @break

          @case(11)
          <strong><p>Critico Demora</p></strong>
          @break

          @case(12)
          <strong><p>Cliente Rechaza</p></strong>
          @break

          @case(13)
          <strong><p>Administracion Cierra</p></strong>
          @break

          @default
          <p style="color: red">Sin información</p>
          @break

          @endswitch
        </td>

        @if($ost->observaciones == NULL)
        <td>Sin descripción</td>
        @else
        <td>{{$ost->observaciones}}</td>
        @endif

        <td>{{$ost->updated_at}}</td>
        <td style="text-align: center;">

          @switch($ost->estado_os)

          @case(0)
          @can('usersosts.index')
          <a href="{{route('servicios.osts.subcreate',['idost' => Crypt::encrypt($ost->idost)])}}" class="btn btn-sm bg-purple">Completar OST </a>
          @endcan
          @break

          @case(1)
          @can('usersosts.create')
          <a href="{{route('servicios.usersosts.create',['idost' => Crypt::encrypt($ost->idost)])}}" class="btn btn-sm bg-navy">Asignar</a>
          @endcan
          @break

          @case(2)
          @can('osts.show')
          @if($role_id==13)
          <a href="{{route('servicios.eventososts.aceptar',['idost' => Crypt::encrypt($ost->idost)])}}" class="btn btn-sm btn-success ">Aceptar OST</a>
          @else
          @can('osts.show')
          <a href="{{route('servicios.osts.show',['idost' => Crypt::encrypt($ost->idost)])}}" class="btn btn-sm btn-default">Detalles</a>
          @endcan
          @endif
          @endcan
          @break

          @case(3)
          @can('osts.show')
          <a href="{{route('servicios.eventososts.aceptarcliente',['idost' => Crypt::encrypt($ost->idost)])}}" class="btn btn-sm bg-olive">Confirmar</a>
          @endcan
          @break

          @case(4)
          @can('osts.show')
          <a href="{{route('servicios.osts.show',['idost' => Crypt::encrypt($ost->idost)])}}" class="btn btn-sm btn-default">Detalles</a>
          @endcan
          @break

          @case(5)
          @can('osts.show')
          <a href="{{route ('servicios.eventososts.create',['id' => Crypt::encrypt($ost->idost)])}}" class="btn btn-sm btn-default">Crear Novedad</a>
          @endcan
          @break

          @case(6)
          @can('osts.show')
          <a href="{{route('servicios.eventososts.create',['idost'=>Crypt::encrypt($ost->idost)])}}" class="btn btn-sm bg-navy">Agregar Novedad</a>
          @endcan
          @break

          @case(7)
          @can('usersosts.show')
          <a href="{{route('servicios.usersosts.show',['idost' => Crypt::encrypt($ost->idost)])}}" class="btn btn-sm bg-red">Detalles</a>
          @endcan
          @break

          @case(8)
          @can('osts.show')
          <a href="{{route('servicios.osts.show',['idost' => Crypt::encrypt($ost->idost),$ost->idost])}}"><p class="btn btn-sm btn-success" style="text-align: center;">Completado</p></a>
          @endcan
          @break

          @case(9)
          @can('usersosts.edit')
          <a href="{{route ('servicios.usersosts.edit', ['idost' => Crypt::encrypt($ost->idost)])}}"><p style="text-align: center; color: red;">Reasignar Tecnico</p></a>
          @endcan
          @break

          @case(10)
          @can('usersosts.show')
          <a href="{{route('servicios.usersosts.show',['idost' => Crypt::encrypt($ost->idost)])}}" class="btn btn-sm bg-olive">Detalles</a>
          @endcan
          @break

          @case(11)
          @can('usersosts.show')
          <a href="{{route('servicios.usersosts.show',['idost' => Crypt::encrypt($ost->idost)])}}" class="btn btn-sm bg-olive">Detalles</a>
          @endcan
          @break

          @case(12)
          @can('osts.show')
          <a href="{{route('servicios.usersosts.show',['idost' => Crypt::encrypt($ost->idost)])}}" class="btn btn-sm bg-red">Cancelado</a>
          @endcan
          @break

          @case(13)
          @can('osts.show')
          <a href="{{route('servicios.usersosts.show',['idost' => Crypt::encrypt($ost->idost)])}}" class="btn btn-sm bg-red">Cerrado</a>
          @endcan
          @break

          @default
          <p>Sin información</p>
          @break

          @endswitch

        </td>
        <td>
          @can('osts.edit')
          <a href="{{route('servicios.osts.edit',['idost'=>Crypt::encrypt($ost->idost)])}}" class="btn btn-sm btn-info">Editar</a>
          @endcan
        </td>
        <td>

          @if($role_id==12 || $role_id==13)
          @if($ost->estado_os!=8 && $ost->estado_os!=12 && $ost->estado_os!=13)
          @can('eventososts.destroy')          
          <a href="{{route('servicios.eventososts.rechazar',['idost'=>Crypt::encrypt($ost->idost)])}}" class="btn btn-sm btn-danger">Rechazar</a>
          @endcan          
          @endif
          @endif
          @if($ost->estado_os!=8)
          @can('osts.destroy')
          <a href="{{route('servicios.eventososts.rechazar',['idost'=>Crypt::encrypt($ost->idost)])}}" class="btn btn-sm btn-danger">Cancelar</a> 
          @endif

          @endcan         

        </td>
      </tr>

      @if($role_id==13)
      @include('servicios.osts.rechazado')     
      @endif

      @if($role_id!=13)
      @include('servicios.osts.modal')    
      @endif
      
      @endforeach
    </tbody> 
  </table>
  {{$osts->render()}}

</div>	

</div>



</div>
</div>

</section>
@endcan
@endsection