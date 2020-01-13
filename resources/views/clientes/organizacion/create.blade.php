@extends ('layouts.admin')
@section ('contenido')


<section class="content-header">

  <h1>                  
    Menú de Organizaciones
    <small>Version 2.0</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="/"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li><a href="/">Comercial</a></li>
    <li><a href="/">Clientes</a></li>
    <li><a href="{{route('clientes.organizacion.index')}}">Organizaciones</a></li>
    <li class="active">Crear Nuevo Registro</li>
  </ol>
</section>

<section class="content">

  {!!Form::open(array('url'=>'clientes/organizacion/store','method'=>'POST','autocomplete'=>'off', 'files'=> true))!!}
  {{ csrf_field() }}

  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Agregar Nuevo Registro</h3>
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
        <div class="col-xs-12 col-sm-8 ">

          <div class="row row-first" >
            <div class="col-xs-12 col-sm-12">
              <div class="form-group ">
                <label for="nit" class="col-xs-12 col-sm-2">NIT</label>
                <div class="col-sm-10">
                  <input type="number" id="nit" name="nit" class="form-control" placeholder="NIT &hellip;" value="{{old('nit')}}" required>
                </div>            
              </div>            
            </div>            
          </div>            

          <div class="row">
            <div class="col-xs-12 col-sm-12">
              <div class="form-group">
                <label for="razonsocial" class="col-xs-12 col-sm-2">Razon Social</label>
                <div class="col-sm-10">
                  <input type="text" id="razonsocial" name="razonsocial" class="form-control" placeholder="Razon Social..." value="{{old('razonsocial')}}" required>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-12 col-sm-12">
              <div class="form-group">
                <label for="margen" class="col-xs-12 col-sm-2">Margen</label>
                <div class="col-sm-10">
                  <div class="input-group">
                   <input type="text" id="margen" name="margen" class="form-control" placeholder="Unicamente de 0% a 100%" data-smk-type="number" data-smk-min="1" data-smk-max="100" id="margen" value="{{old('margen')}}" required><span class="input-group-addon">%</span>
                 </div>
               </div>
             </div>
           </div>
         </div>

         <div class="row">
          <div class="col-xs-12 col-sm-12">
           <div class="form-group">
            <label for="estado" class="col-xs-12 col-sm-2" >Estado</label>
            <div class="col-sm-10">
              <select id="estado" name="estado" class="form-control selectpiker" data-live-search="true" id="estado" required>
                <option selected disabled="true">Seleccione &hellip;</option>                  
                <option value="1">Activo</option>
                <option value="0">Inactivo</option>     
              </select>                                              
            </div>          
          </div>
        </div>
      </div>

    </div>


    <div class="col-xs-12 col-sm-12 col-md-4">
      <div class="box-body">
        <div class="form-group">
          <label for="file">Logo</label>

          <div id="preview" class="thumbnail">
            <a href="#" id="file-select" class="btn btn-default">Elegir archivo</a>

            <img id="logo" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22200%22%20height%3D%22200%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20200%20200%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_16706540b1a%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A10pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_16706540b1a%22%3E%3Crect%20width%3D%22200%22%20height%3D%22200%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2274.4296875%22%20y%3D%22104.5%22%3E200x200%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E"/>
          </div>
          <span class="alert alert-default " id="file-info" style="margin:0px; ">No hay archivo aún</span>
          <form id="file-submit" enctype="multipart/form-data">
            <input id="image" name="image" type="file" class="form-control" accept="image/*" style="max-width: 35px; " />
          </form>
        </div>
      </div>
    </div>          
  </div>



</div>

<div class="box-footer " id="guardar">
  <div class="container-fluid">
    <div class="row-bottons">
      <div class="col-sm-12">
        <div class="col-xs-0 col-sm-0 col-lg-3 text-center" style="padding-bottom: 5px; padding-top: 5px"></div>
        <div class="col-xs-12 col-sm-4 col-lg-2 text-center" style="padding-bottom: 5px; padding-top: 5px">

          <button class="btn btn-primary btn_end" type="submit" > Guardar </button>

        </div>
        <div class="col-xs-12 col-sm-4 col-lg-2 text-center" style="padding-bottom: 5px; padding-top: 5px">

          <a class="btn btn-danger btn_end" id="limpiar">Limpiar</a>

        </div>
        <div class="col-xs-12 col-sm-4 col-lg-2 text-center"  style="padding-bottom: 5px; padding-top: 5px">

          <a href="{{route('clientes.organizacion.index')}}" class="btn btn-info btn_end" id="back" >Atras</a><br>

        </div>
        <div class="col-xs-0 col-sm-0 col-lg-3 text-center" style="padding-bottom: 5px; padding-top: 5px"></div>


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

   $('#image').click();
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

  function Limpiar(){

    $("#nit").val("");
    $("#razonsocial").val("");
    $("#margen").val("");
    $("#estado").prop('selectedIndex', '0');
    $('#logo').attr('src', 'data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22200%22%20height%3D%22200%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20200%20200%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_16706540b1a%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A10pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_16706540b1a%22%3E%3Crect%20width%3D%22200%22%20height%3D%22200%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2274.4296875%22%20y%3D%22104.5%22%3E200x200%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E');
    $("#image").val("");
    $('#file-info').text('No hay archivo aún');  


  }

</script>


@endsection

