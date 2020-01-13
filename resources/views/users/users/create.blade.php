@extends ('layouts.admin')
@section ('contenido')
@include('users.users.encabezado')


<section class="content">

  {!!Form::open(array('url'=>'users/users/store','method'=>'POST','autocomplete'=>'off', 'files'=> true))!!}
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

        <form>
          <div class="row">
            <div class="col-xs-12 col-sm-6">

              <div class="row row-first" >
                <div class="col-xs-12 col-sm-12">
                  <div class="form-group has-feedback">
                    <label for="name" class="col-xs-12 col-sm-2">Nombres</label>
                    <div class="col-sm-10">
                      <input type="text" id="name" name="name" class="form-control"  value="{{old('name')}}" autofocus="autofocus" required>
                      <span class="fa fa-address-book form-control-feedback"></span>
                    </div>            
                  </div>            
                </div>            
              </div>            

              <div class="row">
                <div class="col-xs-12 col-sm-12">
                  <div class="form-group has-feedback ">
                    <label for="apellidos" class="col-xs-12 col-sm-2">Apellidos</label>
                    <div class="col-sm-10">
                      <input type="text" id="apellidos" name="apellidos" class="form-control"  value="{{old('apellidos')}}" required>
                      <span class="fa fa-address-book form-control-feedback"></span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-xs-12 col-sm-12">
                  <div class="form-grou has-feedback">
                    <label for="email" class="col-xs-12 col-sm-2">E-mail</label>            
                    <div class="col-sm-10">
                      <input type="email" id="email" name="email" class="form-control" value="{{old('email')}}" uniquerequired>
                      <span class="fa fa-envelope form-control-feedback"></span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-xs-12 col-sm-12">
                  <div class="form-group has-feedback">
                    <label for="celular" class="col-xs-12 col-sm-2">Celular</label>
                    <div class="col-sm-10">
                      <input type="number" id="celular" name="celular" class="form-control" value="{{old('celular')}}" required>
                      <span class="fa fa-mobile form-control-feedback"></span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-xs-12 col-sm-12">
                 <div class="form-group">
                  <label for="tipo_documento" class="col-xs-12 col-sm-2" >Tipo Documento</label>
                  <div class="col-sm-10">
                    <select id="tipo_documento" name="tipo_documento" class="form-control selectpicker" data-live-search="true" id="tipo_documento" required>
                      <option selected disabled="true">Seleccione &hellip;</option>                  
                      <option value="1">Cedula de Ciudadanía</option>
                      <option value="2">Cedula de Extranjería</option>     
                      <option value="3">Pasaporte</option>     
                    </select>                                              
                  </div>          
                </div>
              </div>
            </div>


            <div class="row">
              <div class="col-xs-12 col-sm-12">
                <div class="form-group has-feedback">
                  <label for="documento" class="col-xs-12 col-sm-2">Numero Documento</label>
                  <div class="col-sm-10">
                    <input type="text" id="documento" name="documento" class="form-control" value="{{old('documento')}}" required>
                    <span class="fa fa-cc form-control-feedback"></span>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-xs-12 col-sm-12">
                <div class="form-group has-feedback">
                  <label for="direccion" class="col-xs-12 col-sm-2">Dirección</label>
                  <div class="col-sm-10">
                    <input type="text" id="direccion" name="direccion" class="form-control"  value="{{old('direccion')}}" required>
                    <span class="fa fa-home form-control-feedback"></span>
                  </div>
                </div>
              </div>
            </div>    

          </div>
          <div class="col-xs-12 col-sm-6">

            <div class="row row-first" >
              <div class="col-xs-12 col-sm-12">
                <div class="form-group has-feedback">
                  <label for="password" class="col-xs-12 col-sm-2">Contraseña</label>
                  <div class="col-sm-10 checkbox">
                    <input type="password" id="password" name="password" class="form-control" value="{{old('password')}}" min="6" max="15"  required>
                    <span class="fa fa-lock form-control-feedback"></span>
                    <label>
                      <input type="checkbox" id="cbocedula" autofocus="autofocus"> Usar la cedula como clave...
                    </label>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-xs-12 col-sm-12">
                <div class="form-group has-feedback">
                  <label for="repassword" class="col-xs-12 col-sm-2">Confirmar Contraseña</label>
                  <div class="col-sm-10 checkbox">
                    <input type="password" id="repassword" name="repassword" class="form-control" value="{{old('repassword')}}" min="6" max="15"   required>
                    <span class="fa fa-retweet form-control-feedback"></span>
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
          <div class="col-xs-0 col-sm-0 col-lg-3 text-center" style="padding-bottom: 5px; padding-top: 5px"></div>
          <div class="col-xs-12 col-sm-4 col-lg-2 text-center" style="padding-bottom: 5px; padding-top: 5px">

            <button class="btn btn-primary btn_end" type="submit"  id="success_btn"  > Guardar </button>

          </div>
          <div class="col-xs-12 col-sm-4 col-lg-2 text-center" style="padding-bottom: 5px; padding-top: 5px">

            <a class="btn btn-danger btn_end" type="reset" id="limpiar">Limpiar</a>

          </div>
          <div class="col-xs-12 col-sm-4 col-lg-2 text-center"  style="padding-bottom: 5px; padding-top: 5px">

            <a href="{{route('users.users.index')}}" class="btn btn-info btn_end" id="back" >Atrás</a><br>

          </div>
          <div class="col-xs-0 col-sm-0 col-lg-3 text-center" style="padding-bottom: 5px; padding-top: 5px"></div>

        </div>      
      </div>
    </div>

  </div>

</div>

{!!Form::close()!!}
</section>
@endsection

@section('scripts')
<script>

  $(document).ready(function($) {



   // $('#msg').hide();

   function Comprobar(){

    var html = '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"><strong>&times;</strong></button> <h4><i class="icon fa fa-warning"></i> ¡Alerta!</h4> Esta usando el numero de identificación como clave. </div>';
    
    $('#msg').append(html);
    console.log(html);



  }

  $('#cbocedula:checkbox').change(function() {

    if ($(this).is(':checked')) {

      Comprobar();
      $('#password').val($('#documento').val());
      $('#repassword').val($('#documento').val());
      console.log($(this).val() + ' is now checked'); 

    } else {

      $('#password').val("");
      $('#repassword').val("");
      console.log($(this).val() + '  is now unchecked'); 
    }

  });  

  $('#repassword').keyup(function () {
   console.log('Escrito');

 });

  

});

  $(document).ready(function() {
    //variables
    var password = $('[name=password]');
    var repassword = $('[name=repassword]');
    var confirmacion = "Las contraseñas si coinciden";
    var longitud = "La contraseña debe estar formada entre 6-10 carácteres (ambos inclusive)";
    var negacion = "No coinciden las contraseñas";
    var vacio = "La contraseña no puede estar vacía";
    //oculto por defecto el elemento span
    var span = $('<span></span>').insertAfter(repassword);
    span.hide();
    //función que comprueba las dos contraseñas
    function coincidePassword(){
      var valor1 = password.val();
      var valor2 = repassword.val();
      //muestro el span
      span.show().removeClass();
      //condiciones dentro de la función
      if(valor1 != valor2){
        span.text(negacion).addClass('negacion'); 
      }
      if(valor1.length==0 || valor1==""){
        span.text(vacio).addClass('negacion');  
      }
      if(valor1.length<6 || valor1.length>10){
        span.text(longitud).addClass('negacion');
      }
      if(valor1.length!=0 && valor1==valor2){
        span.text(confirmacion).removeClass("negacion").addClass('confirmacion');
      }
    }
    //ejecuto la función al soltar la tecla
    repassword.keyup(function(){
      coincidePassword();
    });
  });


</script>
@endsection



