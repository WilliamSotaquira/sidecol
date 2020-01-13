<?php 
use Illuminate\Support\Facades\Auth;

Auth::logout();

?>
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="icon" type="image/png" href="/images/logos/logo16x16.png" />

  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title> Sidecol | Idea Colombia SAS</title>


  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('/css/bootstrap.css')}}">
  <link rel="stylesheet" type="text/css" href="/css/bootstrap-grid.css">
  


  <link rel="stylesheet" type="text/css" href="{{asset('almasaeed2010/adminlte/bower_components/font-awesome/css/fontawesome-all.min.css')}}">

  <style type="text/css" media="screen">
    html, body {
      background-color: #404040FF;
      color: #000000;
      font-weight: 100;
      /*margin: -75px;*/
      height: 100%; 
      margin: 0px; 
      padding: 0px;
      background-image: url(images/w_hd/dark_1.jpg);
      background-color: #282923FF
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-position: right;

    }

    #full { background: #0f0; height: 100% 
    }   

    .flex-center {  
      align-items: center;
      display: flex;
      justify-content: center;
      /*background-image: url(images/w_hd/text_2.png);*/
      background-position: center;
      background-repeat: no-repeat;
      background-attachment: fixed;
    }
    .full-body {
      height: 90vh; 

    }
    .footer{
      background-color: #343A40FF;
    }

  </style>


</head>
<body>
  <div id="app">
    <!-- Barra de navegacion -->


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
      <a class="navbar-brand" href="/" ><img class="responsive  img-fluid mx-auto d-block" src="/images/logos/logo2_89x25.png"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item px-3 active">
            <a class="nav-link " href="/">Inicio</a>
          </li>
 <!--          <li class="nav-item px-3 active">
            <a class="nav-link " href="{{ route('login')}}">Ingreso</a>
          </li> -->
          <li class="nav-item px-3 active" >
            <a class="nav-link" href="{{ route('register')}}">Registro</a>
          </li>
          <li class="nav-item dropleft active">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Contacto</a>
            <div class="dropdown-menu bg-dark">

              <a id="data" class="dropdown-item bg-dark " href="#">
                <strong><h6 class="text-capitalize mb-4  ">Idea Colombia S.A.S</h6><br></strong>
                <p><i class="fa fa-home"></i>&nbsp;&nbsp;Av. 19 No. 114 - 09 Of. 304 | Bogotá</p>
                <p><i class="fa fa-envelope"></i>&nbsp;&nbsp;soporte@grupo-idea.com</p>
                <p><i class="fa fa-phone"></i>&nbsp;&nbsp;Línea gratuita nacional:</p>
                <p>018000-112064</p>
                <p><i class="far fa-circle"></i>&nbsp;&nbsp;(571) 620 81 57</p>
                <p><i class="far fa-circle"></i>&nbsp;&nbsp;(571) 637 41 44</p>
                <p><i class="far fa-circle"></i>&nbsp;&nbsp;(571) 637 41 13</p>

              </a>
            </div>
          </li>
          <li class="nav-item px-3 active">
            <a class="btn btn-info" href="{{ route('login') }}">Ingreso</a>
          </li>

        </ul>
      </div>
    </nav>


    <!-- fin de Barra de navegacion -->

    
    <header id="header" class="flex-center full-body">

      @yield('content')       

    </header><!-- /header -->
  </div>  
  <footer class="footer fixed-bottom py-5">
    <p class="m-0 text-center text-white">Copyright &copy; Sidecol 2019 | <small>Idea Colombia S.A.S.</small></p>
    <!-- /.container -->
  </footer>
</body>


<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>

@yield('scripts')

</html>
