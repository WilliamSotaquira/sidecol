@extends ('layouts.admin')
@section ('contenido')
@include('servicios.talleres.tecnicos.encabezado')


<section class="content">


  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Información del Registro</h3>


      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse">
          <i class="fa fa-minus"></i>
        </button>
      </div>
    </div>

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


      <div class="box-body">


        <div class="row" id="msg" name="msg">

        </div>

        <form>
          <div class="row">
            <div class="col-xs-12 col-sm-6"> 

              <div class="row row-first" >
                <div class="col-xs-12 col-sm-12">
                  <div class="form-group has-feedback">
                    <label for="id" class="col-xs-12 col-sm-4">ID</label>
                    <div class="col-sm-8">
                      <input type="text" id="id" name="id" class="form-control"  value="{{$users->id}}" disabled="disabled" >
                      <span class="fa fa-address-book form-control-feedback"></span>
                    </div>            
                  </div>            
                </div>            
              </div>   

              <div class="row row-first" >
                <div class="col-xs-12 col-sm-12">
                  <div class="form-group has-feedback">
                    <label for="name" class="col-xs-12 col-sm-4">Nombres</label>
                    <div class="col-sm-8">
                      <input type="text" id="name" name="name" class="form-control"  value="{{$users->name}}" disabled="disabled">
                      <span class="fa fa-address-book form-control-feedback"></span>
                    </div>            
                  </div>            
                </div>            
              </div>            

              <div class="row">
                <div class="col-xs-12 col-sm-12">
                  <div class="form-group has-feedback ">
                    <label for="apellidos" class="col-xs-12 col-sm-4">Apellidos</label>
                    <div class="col-sm-8">
                      <input type="text" id="apellidos" name="apellidos" class="form-control"  value="{{$users->apellidos}}"  disabled="disabled">
                      <span class="fa fa-address-book form-control-feedback"></span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-xs-12 col-sm-12">
                  <div class="form-grou has-feedback">
                    <label for="email" class="col-xs-12 col-sm-4">E-mail</label>            
                    <div class="col-sm-8">
                      <input type="email" id="email" name="email" class="form-control" value="{{$users->email}}" disabled="disabled">
                      <span class="fa fa-envelope form-control-feedback"></span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-xs-12 col-sm-12">
                  <div class="form-group has-feedback">
                    <label for="celular" class="col-xs-12 col-sm-4">Celular</label>
                    <div class="col-sm-8"> 
                      <input type="number" id="celular" name="celular" class="form-control" value="{{$users->celular}}" disabled="disabled" >
                      <span class="fa fa-mobile form-control-feedback"></span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-xs-12 col-sm-12">
                 <div class="form-group">
                  <label for="tipo_documento" class="col-xs-12 col-sm-4" >Tipo Documento</label>
                  <div class="col-sm-8">
                    <select id="tipo_documento" name="tipo_documento" class="form-control selectpicker" data-live-search="true" id="tipo_documento" >
                      @if($users->tipo_documento === '1')          
                      <option value="1">Cedula de Ciudadanía</option>
                      @elseif($users->tipo_documento === '2')
                      <option value="2">Cedula de Extranjería</option>  
                      @elseif($users->tipo_documento === '3')   
                      <option value="3">Pasaporte</option>
                      @else
                      <option value="">Sin Criterio</option>
                      @endif

                    </select>                                              
                  </div>          
                </div>
              </div>
            </div>


            <div class="row">
              <div class="col-xs-12 col-sm-12">
                <div class="form-group has-feedback">
                  <label for="documento" class="col-xs-12 col-sm-4">Numero Documento</label>
                  <div class="col-sm-8">
                    <input type="text" id="documento" name="documento" class="form-control" value="{{$users->documento}}" disabled="disabled">
                    <span class="fa fa-cc form-control-feedback"></span>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-xs-12 col-sm-12">
                <div class="form-group has-feedback">
                  <label for="direccion" class="col-xs-12 col-sm-4">Dirección</label>
                  <div class="col-sm-8">
                    <input type="text" id="direccion" name="direccion" class="form-control"  value="{{$users->direccion}}" disabled="disabled" >
                    <span class="fa fa-home form-control-feedback"></span>
                  </div>
                </div>
              </div>
            </div>    

          </div>
          <div class="col-xs-12 col-sm-6">

            <div class="row row-first">
              <div class="col-xs-12 col-sm-12">
                <div class="form-group has-feedback">
                  <label for="score" class="col-xs-12 col-sm-4">Puntuación</label>
                  <div class="col-sm-8">
                    @if($users->score === null)
                    <input type="text" id="score" name="score" class="form-control"  value="0" disabled="disabled" >
                    @else
                    <input type="text" id="score" name="score" class="form-control"  value="{{$users->score}}" disabled="disabled" >
                    @endif


                    <span class="fa fa-home form-control-feedback"></span>
                  </div>
                </div>
              </div>
            </div> 

            <div class="row">
              <div class="col-xs-12 col-sm-12">
                <div class="form-group has-feedback">
                  <label for="created_at" class="col-xs-12 col-sm-4">Creado Desde</label>
                  <div class="col-sm-8">
                    <input type="text" id="created_at" name="created_at" class="form-control"  value="{{$users->created_at}}" disabled="disabled" >
                    <span class="fa fa-home form-control-feedback"></span>
                  </div>
                </div>
              </div>
            </div> 

            <div class="row">
              <div class="col-xs-12 col-sm-12">
                <div class="form-group has-feedback">
                  <label for="updated_at" class="col-xs-12 col-sm-4">Ultima Actualización</label>
                  <div class="col-sm-8">
                    <input type="text" id="updated_at" name="updated_at" class="form-control"  value="{{$users->updated_at}}" disabled="disabled" >
                    <span class="fa fa-home form-control-feedback"></span>
                  </div>
                </div>
              </div>
            </div> 




          </div>
        </div>
      </form>


    </div>


  </div> 

  <div class="box-footer " id="guardar">
    <div class="container-fluid">
      <div class="row-bottons">
        <div class="col-sm-12">
         <div class="col-sm-3 text-center" style="padding-bottom: 5px; padding-top: 5px"></div>
         <div class="col-sm-2 text-center" style="padding-bottom: 5px; padding-top: 5px"></div>
         <div class="col-sm-2 text-center" style="padding-bottom: 5px; padding-top: 5px">

          <a href="{{ URL::previous() }}" class="btn btn-info btn_end" id="back" >Atras</a><br>

        </div>
        <div class="col-sm-2 text-center"  style="padding-bottom: 5px; padding-top: 5px"></div>
        <div class="col-sm-3 text-center" style="padding-bottom: 5px; padding-top: 5px"></div>

      </div>
    </div>
  </div>
</div>
</div>

</section>


@endsection
