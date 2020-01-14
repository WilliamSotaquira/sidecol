<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title> Sidecol | Idea Colombia </title>
  <!-- Bootstrap -->
  <link rel="stylesheet" href="{{asset('almasaeed2010/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('almasaeed2010/adminlte/bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('almasaeed2010/adminlte/bower_components/Ionicons/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('almasaeed2010/adminlte/dist/css/AdminLTE.css') }}">

  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
  page. However, you can choose any other skin. Make sure you
  apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="{{asset('almasaeed2010/adminlte/dist/css/skins/skin-black.css') }}">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  <!-- Google Font -->
  <link rel="stylesheet"
  href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
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
      <span class="logo-lg"><img class="responsive  img-fluid mx-auto d-block" src="{{asset ('images/logos/logo2_89x25.png')}}"></span>
    </a>

    <!-- Modal  -->




    <!-- End Modal -->


    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <!-- Messages: style can be found in dropdown.less-->
          @can('mensajes.menu')
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa  fa-bell-o"></i>
              <span class="label label-success"></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Últimos Eventos</li>
              
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">

                  @foreach($eventososts as $eventos  )
                  <li><!-- start message -->
                    <a href="{{route('servicios.osts.show',['idost' => Crypt::encrypt($eventos->idost)])}}">
                      <div class="pull-left">
                        <p>OST{{$eventos->idost}}</p>                          
                      </div>
                      <h4>

                        @switch($eventos->tipoevento)

                        @case(1)
                        OST Completada
                        @break

                        @case(2)
                        Petición de Repuesto
                        @break

                        @case(3)
                        Novedad de OST
                        @break

                        @case(4)
                        Soporte de OST
                        @break

                        @case(5)
                        Alerta por retraso
                        @break

                        @case(6)
                        No se pudo contactar
                        @break

                        @case(7)
                        Otro
                        @break

                        @default
                        Sin información
                        @break


                        @endswitch
                        <?php  
                        $date = $eventos->created_at;

                        $date  = (new \DateTime($date))->format("m/d - G:i a") . PHP_EOL;                    

                        ?>
                        <small><i class="fa fa-clock-o"></i> {{$date}}</small>
                      </h4>
                      <p>{{$eventos->descripcion}}</p>
                    </a>
                  </li>
                  @endforeach
                  <!-- end message -->

                </ul>
              </li>
              <li class="footer"><a href="{{route('servicios.eventososts.index')}}">Ver todos los eventos</a></li>
            </ul>
          </li>
          @endcan

          <!-- Notifications: style can be found in dropdown.less -->
          @can('notificaciones.menu')

          <?php 
          $total=$sc+$sp+$ss+$us;
          ?>

          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-warning">{{$total}}</span>
            </a>
            <ul class="dropdown-menu">

              <li class="header">{{$total}} Notificaciones nuevas</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-red"></i> {{$sc}} Ordenes Criticas
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-thumbs-up text-yellow"></i> {{$sp}} Ordenes por Asignar
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-check-circle text-green"></i>{{$ss}} Ordenes Completadas
                    </a>
                  </li>                 
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> {{$us}} Técnicos
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> 0 Bajas
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">Ver mas</a></li>
            </ul>
          </li>
          @endcan

          <!-- Tasks: style can be found in dropdown.less -->
          @can('tareas.menu')
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">1</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Tareas</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Diseño de botones
                        <small class="pull-right">20%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                        <span class="sr-only">20% completo</span>
                      </div>
                    </div>
                  </a>
                </li>

                <!-- end task item -->
              </ul>
            </li>
            <li class="footer">
              <a href="#">Ver tareas</a>
            </li>
          </ul>
        </li>
        @endcan

        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="{{asset ('images/user/user1_160x160.png')}}" class="user-image" alt="User Image">
            <span class="hidden-xs" style="color:white;">{{Auth::user()->name}}</span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header" id="desde">
              <img src="{{asset ('images/user/user1_160x160.png')}}" class="img-circle" alt="User Image">
              <input type="hidden" name="id_user" id="id_user" value="{{Auth::id()}}">
              <div class="col-sm-12">
                <p id="fila" style="color: white; "><strong>{{Auth::user()->name}} {{Auth::user()->apellidos}}</strong><br></p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-6 text-center">
                    <a href="#">Mi actividad</a>
                  </div>
                  <div class="col-xs-6 text-center">
                    <a href="#">Ayuda</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-primary" >Mi Perfil</a>
                </div>
                <div class="pull-right">

                  <a href="{{url('/logout')}}" class="btn btn-danger">Cerrar Sesión </a>
                </div>
              </li>
            </ul>
          </li>

        </ul>
      </div>

    </nav>

  </header>
  <!------------------------------------------------------------------------------------------------------------------------------------>

  @include('treemenu')

  <!------------------------------------------------------------------------------------------------------------------------------------>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Sidecol
        <small>Version 2.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Escritorio</li>
      </ol>


    </section>


    @if(session()->has('success'))
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="alert alert-success alert-dismissible" style="margin: 15px;">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-check"></i> ¡Completado!</h4>
          {{session('success')}}    
        </div>
      </div>
    </div>
    @elseif(session()->has('danger'))
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="alert alert-danger alert-dismissible" style="margin: 15px;">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-ban"></i> ¡Advertencia!</h4>
          {{session('danger')}}          
        </div>
      </div>
    </div>
    @elseif(session()->has('warning'))
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="alert alert-warning alert-dismissible" style="margin: 15px;">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-ban"></i> ¡Alerta!</h4>
          {{session('warning')}}          
        </div>
      </div>
    </div>
    @endif

    <!-- Main content -->
    <section class="content">

      @can('servicio.menu')
      <!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
      <!-- Escritorio de Gerencia  de servicio --> 
      <!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->

      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-close"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Servicios<br>Criticos</span>
              <span class="info-box-number">{{$sc}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-warning"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Servicios<br>Incompletos</span>
              <span class="info-box-number">{{$sp}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col <-->
        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-check"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Servicios<br>Satisfactorios</span>
              <span class="info-box-number">{{$ss}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total <br> Usuarios</span>
              <span class="info-box-number">{{$us}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->



      <!-- Menu de acceso rapido Gerencia de Servicio -->
      <!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

      <div class="row">
        <div class="col-sm-12">
          <div class="box">
            <div class="box-header with-border">
              <div class="box-title">Acceso Rápido - Gerencia de Servicio</div>
            </div> 
            <div class="box-body">
             <?php 
             $ide= Crypt::encrypt('0');
             ?>

             <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
              <a class="button" style="font-size: 10px;" title="Enlista todos los servicio se le han asignado" href="{{route ('servicios.eventososts.index',$ide)}}">   
                <div class="panel panel-head" style="background-color: #285943;"><center><h4 style="color: #ffffff">Eventos
                  <span class="pull-right-container">
                    <span class="label label-danger pull-right-center" id="servicios"></span>
                  </span>
                </h4></center>
                <div class="panel panel-body" style="background-color: #77AF9C;" >
                  <div style="font-size:7em; color:#ffffff"><center><i class="fa fa-thumb-tack"></i></center>
                  </div>
                </div>
              </div>
            </a>
          </div>


          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <a class="button" style="font-size: 10px;" title="Ultimas novedades de los servicios tecnicos que se me han asignado" href="{{route('servicios.osts.index')}}">       
              <div class="panel panel-head" style="background-color: #272838;"><center><h4 style="color: #ffffff">Ordenes de Servicio
                <span class="pull-right-container">
                  <span class="label label-danger pull-right-center" id="asignados"></span>
                </span>
              </h4></center>
              <div class="panel panel-body" style="background-color: #5D536B;" >
                <div style="font-size:7em; color:#ffffff"><center><i class="fa fa-wrench"></i></center>
                </div>
              </div>
            </div>
          </a>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
          <a class="button" style="font-size: 10px;" title="Cancelar o Modificar Ordenes de Servicio Tecnico" href="{{asset('#')}}">       
            <div class="panel panel-head" style="background-color: #247BA0;"><center><h4 style="color: #ffffff">Manuales (ED  )</h4></center>
              <div class="panel panel-body" style="background-color: #70C1B3;" >
                <div style="font-size:7em; color:#ffffff"><center><i class="fa fa-book"></i></center>
                </div>
              </div>
            </div>
          </a>
        </div>

      </div>

    </div>        
  </div>      
</div>
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<!-- fin de MAR -  Gerencia -->


<!-- Ultimos Servicios y Productos -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

<div class="row">
  <div class="col-md-6">
    <!-- TABLE: LATEST ORDERS -->         
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Ultimos Servicios</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>

          <span></span>
        </div>
      </div>

      <!-- /.box-header -->
      <div class="box-body">
        <div class="table-responsive">
          <table class="table no-margin">
            <thead>
              <tr>
                <th>Orden ID</th>
                <th>Cliente</th>
                <th>Estado</th>
                <th>Detalles</th>
              </tr>
            </thead>
            <tbody>
              @foreach($osts as $ost)
              <tr>
                <td><a href="{{route('servicios.osts.show',['idost' => Crypt::encrypt($ost->idost),$ost->iddetalleost])}}">OST{{$ost->idost}}</a></td>
                <td>{{$ost->contacto_ost}}</td>
                <td>

                  @switch($ost->estado_os)

                  @case(0)
                  <strong><p style="color: red;">PreOrden <br> de servicio</p></strong>
                  @break

                  @case(1)
                  <strong><p style="color: red;"> Sin Asignar</p></strong>
                  @break

                  @case(2)
                  <p style="color: red;">Esperando aprobación <br> del técnico</p>
                  @break

                  @case(3)
                  <p style="color:#3d9970;">Aceptado <br>por el técnico</p>
                  @break

                  @case(4)
                  <p style="color:#3d9970;">Cliente <br> Contactado</p>
                  @break

                  @case(5)
                  <p>Orden Confirmada</p>
                  @break

                  @case(6)
                  <strong><p>Por visitar</p></strong>          
                  @break

                  @case(7)
                  <strong><p>Cliente visitado</p></strong>
                  @break

                  @case(8)
                  <strong><p>Servicio Completado</p></strong>
                  @break

                  @case(9)
                  <strong><p>Rechazado por el técnico</p></strong>
                  @break

                  @case(10)
                  <strong><p>En espera</p></strong>
                  @break

                  @case(11)
                  <strong><p>Critico Demora</p></strong>
                  @break

                  @case(12)
                  <strong><p>Cliente Rechaza</p></strong>
                  @break

                  @case(13)
                  <strong><p>Administracion Cierra</p></strong>
                  @break

                  @default
                  <p style="color: red">Sin información</p>
                  @break

                  @endswitch
                </td>                 

                <td>
                  @if($ost->observaciones==null)
                  <div class="sparkbar" data-color="#00a65a" data-height="20">Sin registro</div>
                  @else
                  <div class="sparkbar" data-color="#00a65a" data-height="20">{{$ost->observaciones}}</div>
                  @endif
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.table-responsive -->
      </div>
      <!-- /.box-body -->
      <div class="box-footer clearfix">
        <a href="{{route('servicios.osts.create')}}" class="btn btn-sm btn-info btn-flat pull-left">Crear Nueva Orden</a>
        <a href="{{route('servicios.osts.index')}}" class="btn btn-sm btn-default btn-flat pull-right">Ver más</a>
      </div>
      <!-- /.box-footer -->
    </div>
  </div>

  <!-- /.box -->
  <div class="col-md-6">

    <!-- PRODUCT LIST -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Productos Agragados Recientemente</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <ul class="products-list product-list-in-box">
          @foreach($productos as $producto)
          <li class="item">
          <!--   <div class="product-img">
              <img src="#" alt="Product Image">
            </div> -->
            <div class="product-info">
              <a href="javascript:void(0)" class="product-title">
                <!-- <span class="label label-warning pull-right">$ {{$producto->costoventa}} </span></a> -->
                <span class="product-description"> &nbsp;
                  <strong>  {{$producto->referencia}}</strong>. {{$producto->categoria}} {{$producto->subcategoria}} {{$producto->marca}}
                </span>

              </div>
            </li>
            @endforeach



          </ul>
        </div>
        <!-- /.box-body -->
        <div class="box-footer text-center">
          <a href="javascript:void(0)" class="uppercase">Ver todos los productos</a>
        </div>
        <!-- /.box-footer -->
      </div>
    </div>
    <!-- /.col -->
  </div>

  <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
  <!-- fin de  ultimos servicio y productos  agotados -->

  <!-- Menu - Graficas de servicios -->
  <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<!--   <div class="row">

    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Fallas en Productos (En desarrollo)</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <div class="btn-group">
              <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-wrench"></i></button>
              </div>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          
          <div class="box-body">
            <div class="row">
              <div class="col-md-8">
                <p class="text-center">
                  <strong>Desde: 1 Enero - 28 febrero, 2019</strong>
                </p>

                <div class="chart">
                  
                  <canvas id="salesChart" style="height: 180px;"></canvas>
                </div>
                
              </div>
              
              <div class="col-md-4">
                <p class="text-center">
                  <strong>Ordenes de Servicio</strong>
                </p>

                <div class="progress-group">
                  <span class="progress-text">adicionados</span>
                  <span class="progress-number"><b>0</b>/0</span>

                  <div class="progress sm">
                    <div class="progress-bar progress-bar-aqua" style="width: 80%"></div>
                  </div>
                </div>
                
                <div class="progress-group">
                  <span class="progress-text">InCompletos</span>
                  <span class="progress-number"><b>0</b>/0</span>

                  <div class="progress sm">
                    <div class="progress-bar progress-bar-red" style="width: 80%"></div>
                  </div>
                </div>
                
                <div class="progress-group">
                  <span class="progress-text">Completados</span>
                  <span class="progress-number"><b>0</b>/0</span>

                  <div class="progress sm">
                    <div class="progress-bar progress-bar-green" style="width: 80%"></div>
                  </div>
                </div>
                
                <div class="progress-group">
                  <span class="progress-text">En proceso</span>
                  <span class="progress-number"><b>0</b>/0</span>

                  <div class="progress sm">
                    <div class="progress-bar progress-bar-yellow" style="width: 80%"></div>
                  </div>
                </div>
                
              </div>
              
            </div>
            
          </div>

          
          <div class="row">
            
            <div class="col-md-6">
              
              <div class="box-footer">
                <div class="row">
                  <div class="col-sm-3 col-xs-6">
                    <div class="description-block border-right">
                      <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span>
                      <h5 class="description-header">0</h5>
                      <span class="description-text">TOTAL</span>
                    </div>
                    
                  </div>
                  
                  <div class="col-sm-3 col-xs-6">
                    <div class="description-block border-right">
                      <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> 0%</span>
                      <h5 class="description-header">0</h5>
                      <span class="description-text">Unidades</span>
                    </div>
                    
                  </div>
                  
                  <div class="col-sm-3 col-xs-6">
                    <div class="description-block border-right">
                      <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 20%</span>
                      <h5 class="description-header">0</h5>
                      <span class="description-text">Valoración</span>
                    </div>
                    
                  </div>
                  
                  <div class="col-sm-3 col-xs-6">
                    <div class="description-block">
                      <span class="description-percentage text-red"><i class="fa fa-caret-down"></i> 18%</span>
                      <h5 class="description-header">0</h5>
                      <span class="description-text">Fallas</span>
                    </div>
                    
                  </div>
                </div>
                
              </div>
              
            </div>
            

            
            <div class="col-md-6">

            </div>
            
          </div>
          
        </div>
      </div>
    </div>
 -->
    <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <!-- Fin - Graficas de Servicios -->
    <!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
    <!-- fin Escritorio - Gerencia de Servicio -->
    @endcan


    @can('talleres.menu')
    <!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
    <!-- Escritorio - Talleres --> 
    <!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
    <!-- MAR - Talleres -->
    <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->


    <div class="row">
      <div class="col-sm-12">
        <div class="box">
          <div class="box-header with-border">
            <div class="box-title">Menú de Acceso Rápido - Taller</div>
          </div> 
          <div class="box-body">
           <?php 
           $ide= Crypt::encrypt('0');
           ?>

           <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <a class="button" style="font-size: 10px;" title="Ir al menú de los eventos" href="{{route ('servicios.talleres.eventos.index')}}">   
              <div class="panel panel-head" style="background-color: #285943;"><center><h4 style="color: #ffffff">Eventos
                <span class="pull-right-container">
                  <span class="label label-danger pull-right-center" id="servicios"></span>
                </span>
              </h4></center>
              <div class="panel panel-body" style="background-color: #77AF9C;" >
                <div style="font-size:7em; color:#ffffff"><center><i class="fa fa-thumb-tack"></i></center>
                </div>
              </div>
            </div>
          </a>
        </div>


        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
          <a class="button" style="font-size: 10px;" title="Enlistar todas las ordenes de servicio" href="{{route('servicios.talleres.osts.index')}}">       
            <div class="panel panel-head" style="background-color: #00171F ;"><center><h4 style="color: #ffffff">Ordenes de Servicio
              <span class="pull-right-container">
                <span class="label label-danger pull-right-center" id="asignados"></span>
              </span>
            </h4></center>
            <div class="panel panel-body" style="background-color: #003459;" >
              <div style="font-size:7em; color:#ffffff"><center><i class="fa fa-wrench"></i></center>
              </div>
            </div>
          </div>
        </a>
      </div>

      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <a class="button" style="font-size: 10px;" title="Menú de tecnicos- Aqui encontrara todo lo relativo a sus colavoradores." href="{{route('servicios.talleres.tecnicos.index')}}">       
          <div class="panel panel-head" style="background-color: #A62923;"><center><h4 style="color: #ffffff">Técnicos (ED)</h4></center>
            <div class="panel panel-body" style="background-color: #424242;" >
              <div style="font-size:7em; color:#ffffff"><center><i class="fa fa-users"></i></center>
              </div>
            </div>
          </div>
        </a>
      </div>

    </div>

  </div>        
</div>      
</div>

<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- fin MAR - Talleres-->

<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
<!-- Fin de Escritorio - Talleres -->
@endcan

@can('tecnicos.menu')
<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
<!-- Escritorio de Tecnicos de Servicio --> 
<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->

<!-- MAR- TDS -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

<div class="row">
  <div class="col-sm-12">
    <div class="box">
      <div class="box-header with-border">
        <div class="box-title">Menú de Acceso Rápido - Tecnico de Servicio </div>
      </div> 
      <div class="box-body">
       <?php 
       $ide= Crypt::encrypt('0');
       ?>

       <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <a class="button" style="font-size: 10px;" title="Ir al menú de eventos" href="{{route ('servicios.tecnicos.eventos.create',$ide)}}">   
          <div class="panel panel-head" style="background-color: #285943;"><center><h4 style="color: #ffffff">Eventos
            <span class="pull-right-container">
              <span class="label label-danger pull-right-center" id="servicios"></span>
            </span>
          </h4></center>
          <div class="panel panel-body" style="background-color: #77AF9C;" >
            <div style="font-size:7em; color:#ffffff"><center><i class="fa fa-thumb-tack"></i></center>
            </div>
          </div>
        </div>
      </a>
    </div>



    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
      <a class="button" style="font-size: 10px;" title="Ultimas novedades de los servicios tecnicos que se me han asignado" href="{{route('servicios.tecnicos.osts.index')}}">       
        <div class="panel panel-head" style="background-color: #00171F;"><center><h4 style="color: #ffffff">Mis servicios
          <span class="pull-right-container">
            <span class="label label-danger pull-right-center" id="asignados"></span>
          </span>
        </h4></center>
        <div class="panel panel-body" style="background-color: #003459;" >
          <div style="font-size:7em; color:#ffffff"><center><i class="fa fa-wrench"></i></center>
          </div>
        </div>
      </div>
    </a>
  </div>

  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
    <a class="button" style="font-size: 10px;" title="Cancelar o Modificar Ordenes de Servicio Tecnico" href="{{asset('#')}}">       
      <div class="panel panel-head" style="background-color: #A62923;"><center><h4 style="color: #ffffff">Soportes (ED  )</h4></center>
        <div class="panel panel-body" style="background-color: #424242;" >
          <div style="font-size:7em; color:#ffffff"><center><i class="fa fa-file-pdf-o"></i></center>
          </div>
        </div>
      </div>
    </a>
  </div>

</div>

</div>        
</div>      
</div>
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- Fin MAR - TDS -->


<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
<!-- Fin Escritorio TDS -->
@endcan

</section>


</div>
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <!-- Main content -->
  <!--Contenido-->
  @yield('contenido')
  <!--Fin Contenido-->


</div>
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

<footer class="main-footer">

 <div class="pull-right hidden-xs">
  <b>Version</b> 2.4.0
</div>
<center>
  <strong>2020 <a href="http://grupo-idea.com/colombia/">Idea Colombia S.A.S.</a>.</strong> All rights
  reserved.in
</center>
<p><small>&nbsp;</small></p>
</footer>
</div>


<!-- REQUIRED JS SCRIPTS -->
<!-- jQuery 3 -->
<!-- <script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script> -->
<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('almasaeed2010/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- bootstrap datepicker -->
<script src="{{asset('almasaeed2010/adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{asset('almasaeed2010/adminlte/dist/js/adminlte.min.js') }}"></script>
<!-- jQuery Knob -->
<script src="{{asset('almasaeed2010/adminlte/bower_components/jquery-knob/js/jquery.knob.js')}}"></script>

<script>
  $(document).ready(function(){
    $(".knob").knob({
      'min':0,
      'max':5
    });

    $('.knob').val(3);
    
  });
</script>

<script >
  $(document).ready(function() {

    var id =$("#id_user").val(); 
    roles();
    PorAsignar();

    function roles(){

      // console.log("id: "+id);
      $.ajax({
        url: 'api/sidecol/'+id+'/cargarRole',
        type: 'GET',

      })
      .done(function(data) {
        // console.log("success");
        console.log('Success Role Data');

        for (var i = 0; i < data.length; i++) {
          var fila='<small>&nbsp;&squf;'+data[i].name+'&nbsp;</small>';
          $('#fila').append(fila);
        };


      })
      .fail(function(data) {
        console.log("error Role Data");
        for (var i = 0; i < data.length; i++) {
          console.log(data[i].name);
        };
      })
      .always(function() {
        console.log("complete function Role Data");

      });    

    }

    function PorAsignar(){

      $.ajax({
        url: 'api/sidecol/'+id+'/PorAsignar',
        type: 'GET',
      })
      .done(function(data) {        
        console.log('Success Por asignar'+data);

        // for (var i = 0; i < data.length; i++) {
          var fila='<span>'+data+'</span>';      
          $('#asignados').append(fila);
          // };


        })
      .fail(function() {
        console.log("error");
      })
      .always(function() {
        console.log("complete");
      });






    }


  });


</script>
</body>

</html>