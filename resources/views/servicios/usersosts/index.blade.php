@extends ('layouts.admin')
@section ('contenido')
@include('servicios.usersosts.encabezado')



<section class="content">


  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Asignación de Servicios a Técnicos</h3>

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

        <?php 
        $id= Crypt::encrypt('0');
        ?>



        <div class="row mt-1 justify-content-between align-items-center" >
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            @can('usersosts.create')
            <center><a href="{{route ('servicios.usersosts.create',$id)}}" ><button class="btn btn-success">Crear Asignación</button></a></center>
            @endcan
          </div>
          <div class=" col-sm-1  col-xs-12">
            <br>            
          </div>
          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">

           @include('servicios.usersosts.search') 

         </div> 
       </div>
       <div class="box-body">  


        <div class="table-responsive">
          <table id="tbl_rol" class="table table-striped table-condensed table-hover">
            <thead>

              <th width="6%">Fecha Asignada</th>
              <th width="8%"><center>OST</center></th>
              <th width="13%">Tipo de Servicio</th>
              <th width="13%">Estado de OST</th>
              <th width="22%">Técnico</th>
              <th width="10%">Taller</th>
              <th width="8%">Jornada </th>
              <th width="20%" colspan="3"><center>Opciones</center></th>

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
              @foreach($usersosts as $uost)
              <tr>
                <td><strong>{{$uost->fecha_asg}}</strong></td>
                <td class="text-center"><a href="{{route('servicios.osts.show',['idost' => Crypt::encrypt($uost->idost)])}}" title="">  OST{{$uost->idost}}. </a></td>
                <td>


                  @if($uost->tipo_os==1)
                  <strong>Instalación</strong><br>
                  @elseif($uost->tipo_os==2)
                  <strong>Mantenimiento</strong><br>
                  @elseif($uost->tipo_os==3)
                  <strong>Garantía</strong><br>
                  @elseif($uost->tipo_os==4)
                  <strong>Otro</strong><br>
                  @endif


                </td>
                <td>
                  @switch($uost->eos)

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
                  <strong><a href="{{route('servicios.eventososts.index')}}" class="btn btn-sm bg-navy">En espera</a></strong>
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


                <td>{{$uost->name}} {{$uost->apellidos}} - {{$uost->celular}}</td>
                <td>{{$uost->razonsocial}}</td>
                <td>
                  @if($uost->jornada===1)
                  Mañana
                  @else
                  Tarde
                  @endif
                </td>


                <td align="center">
                  @can('usersosts.show')
                  <a href="{{route ('servicios.usersosts.show', ['idost' => Crypt::encrypt($uost->idost)]  )}}" class="btn btn-sm btn-default"> Detalles </a>
                  @endcan
                </td>
                <td align="center">
                  @can('usersosts.edit')
                  <a href="{{route ('servicios.usersosts.edit',['idost' => Crypt::encrypt($uost->idusers_ost)] )}}" class="btn btn-sm btn-info"> Editar </a>
                  @endcan
                </td>
                <td align="center">
                  @can('usersosts.destroy')
                  <a href="" data-target=" #modal-delete-{{$uost->idusers_ost}}" data-toggle="modal"><button class="btn btn-sm btn-danger">Eliminar</button></a> 
                  @endcan
                </td>
              </tr>
              <!-- modal -->

              <!-- fin del modal -->
              @endforeach
            </tbody>



          </table>
          {{$usersosts->render()}}

        </div>  

      </div>
    </div>
  </div>

</section>


@endsection