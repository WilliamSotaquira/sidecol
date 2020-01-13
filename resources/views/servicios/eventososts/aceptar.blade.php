@extends ('layouts.admin')
@section ('contenido')
@include('servicios.eventososts.encabezado')



<section class="content">
<!-- 
  
-->

<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Confirmar Asignación </h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse">
        <i class="fa fa-minus"></i>
      </button>
    </div>
  </div>

  @if (count($errors)>0)
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>
        {{$error}}
      </li>
      @endforeach
    </ul>
  </div>
  @endif


  <div class="container-fluid">
    <div class="box-body " >
      <div class="col-xs-12 col-sm-12 text-center" style="text-align: center;  align-items: center; " >
        <div>


          <table class="table" style="border: 0px;" >
            <thead>

              <tr style="background-color: yellow;" >
                <th class="text-center"><h2><strong>¡Importante!</strong></h2></th>
              </tr>

            </thead>
            <tbody>
              <tr>
                <td style="border: 0px;"    >
                  <h4>Señor técnico, recuerde que debe completar la información de la orden de servicio técnico mediante contacto telefónico con el cliente. Al aceptar la orden de servicio esta confirmando que los datos son correctos.</h4>
                </td>
              </tr>
              <tr>
                <td style="border: 0px;"    >
                  <h4><strong>¿Desea aceptar lo anterior y aceptar la orden de servicio?</strong></h4>
                </td>
              </tr>
              <tr>

                <td style="border: 0px;">                                                      
                  <a href="{{route('servicios.eventososts.aceptarcliente',['idost' => Crypt::encrypt($idost)])}}" class="btn btn-success" title="confirmar la orden de servicio">Continuar</a>
                  <a href="{{route('servicios.eventososts.rechazar',['idost'=>Crypt::encrypt($idost)])}}" class="btn btn-danger" title="Rechazar la orden de servicio">Rechazar</a>

                </td>

              </tr>
            </tbody>
          </table>

        </div>

      </div>
    </div>


  </div>

  <div class="box-footer " id="guardar">
    <div class="row">
      <div class="col-sm-12">

      </div>

    </div>


  </div>

</div>
{!!Form::close()!!}
</section>
@endsection


