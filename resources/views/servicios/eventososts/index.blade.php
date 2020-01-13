@extends ('layouts.admin')
@section ('contenido')
@include('servicios.eventososts.encabezado')



<section class="content"> 


  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Eventos de Ordenes de Servicio</h3>

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
            @can('eventososts.create')
            <center><a href="{{route ('servicios.eventososts.create',$id)}}" ><button class="btn btn-success">Crear Nuevo Evento</button></a></center>
            @endcan
          </div>
          <div class="col-xs-12 col-sm-1">
            <br>
          </div>
          <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">

           @include('servicios.eventososts.search') 

         </div> 
       </div>

       <div class="box-body">  


        <div class="table-responsive">
          <table id="tbl_rol" class="table table-striped table-condensed table-hover text-center">
            <thead>

              <th width="10%">OST</th>
              <th width="15%">Tipo</th>
              <th width="25%">Descripción</th>
              <th width="15%">Soporte</th>
              <th width="20%">Usuario</th>
              <th width="15%">Fecha</th>


            </thead>

            <tfoot>

              <tr>

                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>

              </tr>
            </tfoot>

            <tbody>
              @foreach($eventososts as $eventoost)
              <tr>
                <td><a href="{{route('servicios.osts.show',['idost' => Crypt::encrypt($eventoost->idost)])}}">OST{{$eventoost->idost}}</a></td>
                <td>
                  @switch($eventoost->tipoevento)

                  @case(1)
                  <strong>OST Completada</strong>
                  @break

                  @case(2)
                  <strong>Petición de Repuesto</strong>
                  @break

                  @case(3)
                  <strong>Novedad de OST</strong>
                  @break

                  @case(4)
                  <strong>Soporte de OST</strong>
                  @break

                  @case(5)
                  <strong>Alerta por retraso</strong>
                  @break

                  @case(6)
                  <strong>No se pudo contactar</strong>
                  @break

                  @case(7)
                  <strong>Otro</strong>
                  @break

                  @default
                  Sin información
                  @break


                  @endswitch


                </td>
                <td>{{$eventoost->descripcion}}</td>
                <td >
                  @if($eventoost->soporte == null)
                  No genera soporte
                  @else
                  <!-- <a href="{{$eventoost->soporte}}" title=""  rows="3">{{$eventoost->soporte}}</a> -->
                  <a href="{{$eventoost->soporte}}" title=""><img src="{{asset ($eventoost->soporte)}}" alt="Sin imagen" height="100px" width="100px" class="img-thumbnail"></a>
                  @endif
                </td>                


                @foreach($users as $user) 
                @if($user->id ==$eventoost->sujeto)
                <td>{{$user->name}} {{$user->apellidos}}</td>             
                @endif
                @endforeach
                <td>{{$eventoost->created_at}}</td>
                
              </tr>
              <!-- modal -->
              <!-- fin del modal -->
              @endforeach
            </tbody>



          </table>
          {{$eventososts->render()}}

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