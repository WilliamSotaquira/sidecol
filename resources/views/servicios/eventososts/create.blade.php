@extends ('layouts.admin')
@section ('contenido')
@include('servicios.eventososts.encabezado')



<section class="content">

  {!!Form::open(array('url'=>'servicios/eventososts/store','method'=>'POST','autocomplete'=>'off', 'files'=> true))!!}
  {{ csrf_field() }}

  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Crear Novedad de OST </h3>

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

      <div class="box-body">

        <div class="row">
          <div class="col-xs-12 col-sm-8">

            @if($id=='0')
            <div class="row row-first" >
              <div class="col-xs-12 col-sm-12">
                <div class="form-group ">
                  <label for="marca" class="col-xs-12 col-sm-12">OST</label>
                  <div class="col-sm-12">
                    <select id="idost" name="idost" class="selectpicker form-control" data-live-search="true" required="required" >

                      <option selected="selected" disabled="disabled" value="">Seleccione &hellip;</option> 
                      
                      @foreach($osts as $ost)  
                      <option value="{{$ost->idost}}">OST{{$ost->idost}} | {{$ost->contacto_ost}}</option>
                      @endforeach
                    </select>                                              
                  </div>          
                </div>
              </div>
            </div>
            @else
            <div class="row row-first" >
              <div class="col-xs-12 col-sm-12">
                <div class="form-group ">
                  <label for="marca" class="col-xs-12 col-sm-12">OST</label>
                  <div class="col-sm-12">
                    <select id="idost" name="idost" class="selectpicker form-control" data-live-search="true" required="required" >
                      @foreach($osts as $ost)  
                      <option value="{{$ost->idost}}" selected ="selected">OST{{$ost->idost}} | {{$ost->contacto_ost}}</option>  
                      @endforeach
                    </select>                                              
                  </div>          
                </div>
              </div>
            </div>
            @endif 

            <div class="row " >
              <div class="col-xs-12 col-sm-12">
                <div class="form-group ">
                  <label for="marca" class="col-xs-12 col-sm-12">Tipo de Evento</label>
                  <div class="col-sm-12">

                    <select id="tipoevento" name="tipoevento" class="selectpicker form-control" data-live-search="true"  required>
                      <option selected="selected" value="">Seleccione...</option>
                      <option value="1">1. Cerrar OST</option>
                      <option value="2">2. Pedir Repuesto</option>
                      <option value="3">3. Novedad de OST</option>
                      <option value="4">4. Soporte  OST</option>
                      <option value="5">5. Alerta por retraso</option>
                      <option value="6">6. No se pudo contactar</option>
                      <option value="7  ">7 . Otro</option>
                    </select> 

                  </div>            
                </div>            
              </div>            
            </div> 

            <div class="row">
              <div class="col-xs-12 col-sm-12">
                <div class="form-group">
                  <label for="descripcion" class="col-xs-12 col-sm-12">Descripción</label>
                  <div class="col-sm-12">
                    <textarea name="descripcion" id="descripcion" class="form-control" rows="3" placeholder="Indeque el motivo de la novedad..." value="{{old('descripcion')}}" required></textarea>
                    <input type="hidden" name="estado_eo" id="estado_eo" value="1">
                    <input type="hidden" name="sujeto" id="sujeto" value="{{Auth::id()}}">
                  </div>
                </div>
              </div>
            </div> 

          </div>
          <div class="col-xs-12 col-sm-12 col-md-4">

            <div class="row-first text-center" ">
             <div class="col-xs-12 col-sm-12">
              <div class="form-group">
                <label for="file">Imagen o Soporte</label>
                <br>
                <br>

                <div id="preview" class="thumbnail" >
                  <a href="#" id="file-select" class="btn btn-default" >Elegir archivo</a>

                  <img id="logo" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22200%22%20height%3D%22200%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20200%20200%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_16706540b1a%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A10pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_16706540b1a%22%3E%3Crect%20width%3D%22200%22%20height%3D%22200%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2274.4296875%22%20y%3D%22104.5%22%3E200x200%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E">
                </div>
                <span class="alert alert-default " id="file-info" style="margin:0px; ">No hay archivo aún</span>
                <form id="file-submit" enctype="multipart/form-data">
                  <input id="soporte" name="soporte" type="file" class="form-control" accept="image/*" style="max-width: 15px;">
                </form>
              </div>
            </div>
          </div>

        </div>

      </div>

    </div>
  </div>


  <div class="box-footer " id="guardar">
    <div class="container-fluid">
      <div class="row-bottons">

        <div class="col-sm-12">

          <div class="col-xs-0 col-sm-0 col-lg-4 text-center" style="padding-bottom: 5px; padding-top: 5px"></div>
          <div class="col-xs-12 col-sm-4 col-lg-2 text-center" style="padding-bottom: 5px; padding-top: 5px">
            <a href="{{ URL::previous() }}" class="btn btn-info btn_end" id="back" >Atras</a><br>
          </div>
          <div class="col-xs-12 col-sm-4 col-lg-2 text-center"  style="padding-bottom: 5px; padding-top: 5px">
            <button class="btn btn-success btn_end" type="submit" > Guardar </button>
          </div>
          <div class="col-xs-0 col-sm-0 col-lg-4 text-center" style="padding-bottom: 5px; padding-top: 5px"></div>
        </div>

      </div>
    </div>    
  </div>

</div>

{!!Form::close()!!}

</section>

@endsection

@section('scripts')
<section>
  <!-- Diseño de los botones de navegación -->
  <link rel="stylesheet" type="text/css" href="{{asset ('css/img.css')}}">
</section>
<script>

  $(function() {

    // We can attach the `fileselect` event to all file inputs on the page
    $(document).on('change', ':file', function() {
      var input = $(this),
      numFiles = input.get(0).files ? input.get(0).files.length : 1,
      label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
      input.trigger('fileselect', [numFiles, label]);
    });

    // We can watch for our custom `fileselect` event like this
    $(document).ready( function() {
      $(':file').on('fileselect', function(event, numFiles, label) {

        var input = $(this).parents('.input-group').find(':text'),
        log = numFiles > 1 ? numFiles + ' files selected' : label;

        if( input.length ) {
          input.val(log);
        } else {
          if( log ) alert(log);
          }

        });
    });


  });      
</script>
<script>


  $(window).load(function(){

   $(function() {
    $('#file-input').change(function(e) {
      addImage(e); 
    });

    function addImage(e){
      var file = e.target.files[0],
      imageType = /image.*/;

      if (!file.type.match(imageType))
       return;

       var reader = new FileReader();
       reader.onload = fileOnload;
       reader.readAsDataURL(file);
     }

     function fileOnload(e) {
      var result=e.target.result;
      $('#imgSalida').attr("src",result);
    }


  });
 });

</script>
<script>

  $('#preview').hover(
    function() {
      $(this).find('a').fadeIn();
    }, function() {
      $(this).find('a').fadeOut();
    }
    )
  $('#file-select').on('click', function(e) {
   e.preventDefault();

   $('#soporte').click();
 })

  $('input[type=file]').change(function() {
    var file = (this.files[0].name).toString();
    var reader = new FileReader();

    $('#file-info').text('');
    $('#file-info').text(file);

    reader.onload = function (e) {
     $('#preview img').attr('src', e.target.result);
   }

   reader.readAsDataURL(this.files[0]);
 });

</script>
<script>

  $(document).ready(function(){
    $('#limpiar').click(function(event) {
      Limpiar();
    });
  });

  // function Limpiar(){

    //   $("#nit").val("");
    //   $("#razonsocial").val("");
    //   $("#margen").val("");
    //   $("#estado").prop('selectedIndex', '0');
    //   $('#logo').attr('src', 'data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22200%22%20height%3D%22200%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20200%20200%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_16706540b1a%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A10pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_16706540b1a%22%3E%3Crect%20width%3D%22200%22%20height%3D%22200%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2274.4296875%22%20y%3D%22104.5%22%3E200x200%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E');
    //   $("#image").val("");
    //   $('#file-info').text('No hay archivo aún');  


    // }

  </script>


  @endsection


