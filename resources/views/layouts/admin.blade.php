<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title> Sidecol | Idea Colombia </title>
  <!-- Bootstrap -->
  <link rel="stylesheet" href="{{asset('almasaeed2010/adminlte/bower_components/bootstrap/dist/css/bootstrap.css') }}">  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('almasaeed2010/adminlte/bower_components/font-awesome/css/font-awesome.min.css') }}">

  
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('almasaeed2010/adminlte/bower_components/Ionicons/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('almasaeed2010/adminlte/dist/css/AdminLTE.css') }}">
  <!-- Smoke -->
  <link rel="stylesheet" href="{{asset('smoke-v3.1.1/css/smoke.css')}}" >
  <!-- Bootstrap Select -->
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="{{asset('css/bootstrap-select.min.css')}}">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="{{asset('almasaeed2010/adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.css') }}">
  <!-- bootstrap timepicker -->
  <link rel="stylesheet" href="{{asset('almasaeed2010/adminlte/bower_components/bootstrap-timepicker/css/timepicker.less') }}">

  

  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
  page. However, you can choose any other skin. Make sure you
  apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="{{asset('almasaeed2010/adminlte/dist/css/skins/skin-black.css') }}">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--   [if lt IE 9]> -->
  <!-- <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script> -->
    <!--   <![endif] -->
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <!-- Icono de Sidecol  -->
    <link rel="icon" type="image/png" href="/images/logos/logo16x16.png" />
    



  </head>

  <!-- Este es el cuerpo de la pagina SIDECOL -->
  <body class="hold-transition skin-black sidebar-mini">
    <div class="wrapper">

     <header class="main-header">

      <!-- Logo -->
      <a href="{{ route('home') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><img class="responsive  img-fluid mx-auto d-block" src="{{asset ('images/logos/logo14x22.png')}}"></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><img class="responsive  img-fluid mx-auto d-block" src="{{asset('images/logos/logo2_89x25.png')}}"></span>
      </a>

      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
      </nav>

    </header>
    <!------------------------------------------------------------------------------------------------------------------------------------->

    @include('treemenu')

    <!------------------------------------------------------------------------------------------------------------------------------------->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

      <!-- Main content -->
      <!--Contenido-->
      @yield('contenido')
      <!--Fin Contenido-->


    </div>
    
    <footer class="main-footer">
     <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <center>
      <strong>2020 <a href="http://grupo-idea.com/colombia/">Idea Colombia S.A.S.</a>.</strong> All rights
      reserved.
    </center>
  </footer>
</div>


<!-- REQUIRED JS SCRIPTS -->
<!-- <script src="https://use.fontawesome.com/fd6220c6dc.js"></script> -->
<!-- jQuery 3 -->
<script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
<!-- <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script> -->
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('almasaeed2010/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{asset('almasaeed2010/adminlte/dist/js/adminlte.min.js') }}"></script>
<!-- Smoke -->
<script src="{{asset('smoke-v3.1.1/js/smoke.min.js')}}"></script>
<script src="{{asset('smoke-v3.1.1/lang/es.min.js')}}"></script>
<!-- Bootstrap Select -->
<!-- Latest compiled and minified JavaScript -->
<script src="{{asset('js/bootstrap-select.min.js')}}"></script>
<!-- bootstrap datepicker -->
<script src="{{asset('almasaeed2010/adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.js') }}"></script>
<!-- bootstrap timepicker -->
<script src="{{asset('almasaeed2010/adminlte/bower_components/bootstrap-timepicker/js/bootstrap-timepicker.js') }}"></script>


@yield('scripts')

</body>
</html>