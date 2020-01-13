@extends ('layouts.admin')
@section ('contenido')
@include('servicios.eventososts.encabezado')



<section class="content">
<!-- 
  
-->

<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Completado </h3>
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
        <div style="text-align:center;">

        
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> ¡Completado!</h4>
            ¡La asignacion ha sido confirmada!
          </div>

        </div>

      </div>
    </div>


  </div>

  <div class="box-footer " id="guardar">
    <div class="row">
      <div class="col-sm-12 " style="text-align: center;" >

        <a href="{{route('servicios.osts.index')}}" class="btn btn-info btn_end" id="back" >Mis OST</a><br>


      </div>

    </div>


  </div>

</div>
{!!Form::close()!!}
</section>
@endsection


