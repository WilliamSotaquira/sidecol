@extends ('layouts.admin')
@section ('contenido')
@include('servicios.eventososts.encabezado')



<section class="content">

  {!!Form::open(array('url'=>'servicios/eventososts/store','method'=>'POST','autocomplete'=>'off', 'files'=> true))!!}
  {{ csrf_field() }}


  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Rechazar OST </h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse">
          <i class="fa fa-minus"></i>
        </button>
      </div>
    </div>


    <div class="container-fluid">

      <div class="box-body">
        <div class="col-xs-12 col-sm-12 ">

          <div class="row row-first" >
            <div class="col-xs-12 col-sm-12">
              <div class="form-group ">
                <label for="marca" class="col-xs-12 col-sm-7">Rechazar OST</label>
                <div class="col-sm-10">
                  <select id="tipoevento" name="tipoevento" class="selectpicker form-control" data-live-search="true"  required>
                    <option selected="selected" value="1">Rechazar</option>
                  </select> 

                </div>            
              </div>            
            </div>            
          </div>            

          <div class="row">
            <div class="col-xs-12 col-sm-12">
              <div class="form-group">
                <label for="descripcion" class="col-xs-12 col-sm-7">Descripción</label>
                <div class="col-sm-10">
                  <textarea name="descripcion" id="descripcion" class="form-control" rows="3" placeholder="Indeque el motivo de la novedad..." value="{{old('descripcion')}}" required></textarea>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-12 col-sm-12">
              <div class="form-group">
                <label for="soporte" class="col-xs-12 col-sm-7">Soporte</label>
                <div class="col-sm-10">
                  <input type="file" name="soporte" id="soporte" class="form-control"  style="border: 0px; padding: 0px;">

                  <p class="help-block">Adjunte los documentos o fotos.</p>

                  <input type="hidden" name="estado_eo" id="estado_eo" value="1">
                  <input type="hidden" name="idost" id="idost" value="{{$idost}}">
                  <input type="hidden" name="sujeto" id="sujeto" value="{{Auth::id()}}">

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

          <div class="col-xs-0 col-sm-0 col-lg-4 text-center" style="padding-bottom: 5px; padding-top: 5px"></div>
          <div class="col-xs-12 col-sm-4 col-lg-2 text-center" style="padding-bottom: 5px; padding-top: 5px">

            <a href="{{ URL::previous() }}" class="btn btn-info btn_end" id="back" >Atras</a><br>

          </div>

          <div class="col-xs-12 col-sm-4 col-lg-2 text-center"  style="padding-bottom: 5px; padding-top: 5px">


            <button class="btn btn-danger btn_end" type="submit" > Guardar </button>


          </div>
          <div class="col-xs-0 col-sm-0 col-lg-4 text-center" style="padding-bottom: 5px; padding-top: 5px"></div>

        </div>

      </div>


    </div>

  </div>

  {!!Form::close()!!}

</section>


@endsection
