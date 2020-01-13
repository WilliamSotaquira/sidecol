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
      <div class="col-xs-12 col-sm-8 text-center" style="text-align: center;  align-items: center;" >
        <div style="text-align:center;">



          <div class="row">
            <div class="col-xs-12 col-sm-12 ">
              <h3>Observaciones de la orden de servicio</h3>
              <div class="panel panel-default row-first">
               <div class="row row-first">  


                <div class="col-xs-firts-12 col-xs-12 col-sm-first-12 col-md-first-12 col-lg-10">

                  <table>
            <!-- <caption>Al confirmar la orden reconoce que previamente se estableció contacto con el cliente solicitante del servicio, ademas que acepta la hora y la fecha expresada en el cuerpo del correo anterior.</caption>
              <thead>-->
                <caption>Señor técnico, recuerde que debe completar la confirmación de la orden de servicio técnico con el cliente mediante contacto telefónico.</caption>
                <tr>
                  <th><br>¿Desea aceptar lo anterior y confirmar la orden de servicio?</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><br><a href="{{route('servicios.eventososts.ratificar',['idost' => Crypt::encrypt($idost)])}}" class="btn btn-success" title="confirmar la orden de servicio">Confirmar</a></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
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


