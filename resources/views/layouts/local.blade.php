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
      <span class="logo-mini"><img class="responsive  img-fluid mx-auto d-block" src="/images/logos/logo14x22.png"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img class="responsive  img-fluid mx-auto d-block" src="images/logos/logo2_89x25.png"></span>
    </a>

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
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        AdminLTE Design Team
                        <small><i class="fa fa-clock-o"></i> 2 hours</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Developers
                        <small><i class="fa fa-clock-o"></i> Today</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Sales Department
                        <small><i class="fa fa-clock-o"></i> Yesterday</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Reviewers
                        <small><i class="fa fa-clock-o"></i> 2 days</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>

          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">24</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">24 Notificaciones nuevas</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-red"></i> 5 Ordenes Criticas
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-thumbs-up text-yellow"></i> 2 Ordenes por Asignar
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-check-circle text-green"></i>14 Ordenes Completadas
                    </a>
                  </li>                 
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 2 Nuevos tecnicos
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> 1 Bajas
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">Ver mas</a></li>
            </ul>
          </li>

          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                        <span class="sr-only">20% Complete</span>
                      </div>
                    </div>
                  </a>
                </li>
                <!-- end task item -->
                <li><!-- Task item -->
                  <a href="#">
                    <h3>
                      Create a nice theme
                      <small class="pull-right">40%</small>
                    </h3>
                    <div class="progress xs">
                      <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar"
                      aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                      <span class="sr-only">40% Complete</span>
                    </div>
                  </div>
                </a>
              </li>
              <!-- end task item -->
              <li><!-- Task item -->
                <a href="#">
                  <h3>
                    Some task I need to do
                    <small class="pull-right">60%</small>
                  </h3>
                  <div class="progress xs">
                    <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar"
                    aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                    <span class="sr-only">60% Complete</span>
                  </div>
                </div>
              </a>
            </li>
            <!-- end task item -->
            <li><!-- Task item -->
              <a href="#">
                <h3>
                  Make beautiful transitions
                  <small class="pull-right">80%</small>
                </h3>
                <div class="progress xs">
                  <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar"
                  aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                  <span class="sr-only">80% Complete</span>
                </div>
              </div>
            </a>
          </li>
          <!-- end task item -->
        </ul>
      </li>
      <li class="footer">
        <a href="#">View all tasks</a>
      </li>
    </ul>
  </li>

  <!-- User Account: style can be found in dropdown.less -->
  <li class="dropdown user user-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
      <img src="images/user/user1_160x160.png" class="user-image" alt="User Image">
      <span class="hidden-xs"><strong> William Sotaquira</strong></span>
    </a>
    <ul class="dropdown-menu">
      <!-- User image -->
      <li class="user-header">
        <img src="images/user/user1_160x160.png" class="img-circle" alt="User Image">

        <p>
          William Sotaquira <br><small> <strong>  Web Developer </strong></small>
          <small>Miembro desde Nov. 2018</small>
        </p>
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
          <a href="#" class="btn btn-primary btn-flat" >Mi Perfil</a>
        </div>
        <div class="pull-right">

          <a href="#" class="btn btn-danger btn-flat">Cerrar Sesión </a>
        </div>
      </li>
    </ul>
  </li>

</ul>
</div>
</nav>

</header>

<!-- Left side column. contains the logo and sidebar -->  
<aside class="main-sidebar">


  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="images/user/user1_160x160.png" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>William Sotaquira</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- / Sidebar user panel -->

    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Buscar...">
        <span class="input-group-btn">
          <button type="submit" name="search" id="search-btn" class="btn btn-flat">
            <i class="fa fa-search"></i>
          </button>
        </span>
      </div>
    </form>
    <!-- /.search form -->



    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MENU DE NAVEGACION</li>

      <!-- Menú de Servicio   -->
      <!-- ------------------------------------------------------------------------------------------------------------------------ -->

      @can('ost.index')
      <li class="treeview">
        <a href="#">
          <i class="fa fa-wrench"></i><span>Servicio</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="treeview">
            <a href="#"><i class="fa fa-dot-circle-o"></i> Ordenes de Servicio
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ route('ost.index') }}"><i class="fa fa-arrow-circle-right"></i> Intalacion</a></li>
              <li><a href="#"><i class="fa fa-arrow-circle-right"></i> Garantia</a></li>
              <li><a href="#"><i class="fa fa-arrow-circle-right"></i> Mantenimiento</a></li>
            </ul>
          </li>
          <li><a href="#"><i class="fa fa-dot-circle-o"></i> PQRS</a></li>
        </ul>

        <ul class="treeview-menu">
          <li ><a href="{{ route('ost.index') }}"><i class="fa fa-circle-o"></i> OST <strong>(Ordenes)</strong> </a></li>
          <li ><a href="#"><i class="fa fa-circle-o"></i> PQRS</a></li>
        </ul>
      </li>
      @endcan

      <!-- Menú de Administracion -->
      <!-- ------------------------------------------------------------------------------------------------------------------------ -->

      @can('users.index')
      <li class="treeview">
        <a href="#">
          <i class="fa fa-archive"></i> <span>Administracion</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">          
          <li ><a href="index2.html"><i class="fa fa-dot-circle-o"></i> Eventos </a></li>
        </ul>
      </li>
      @endcan

      <!-- Menu de Comercial-->
      <!-- ------------------------------------------------------------------------------------------------------------------------ -->
      
      @can('users.index')
      <li class="treeview">
        <a href="#">
          <i class="fa fa-line-chart"></i> <span>Comercial</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu ">
          <li class="treeview">
            <a href="#"><i class="fa fa-dot-circle-o"></i> Productos
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="#"><i class="fa fa-arrow-circle-right"></i> Detalle </a></li>
              <li><a href="#"><i class="fa fa-arrow-circle-right"></i> Fichas Tecnicas </a></li>
              <li><a href="#"><i class="fa fa-arrow-circle-right"></i> Manuales </a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#"><i class="fa fa-dot-circle-o"></i> Categorias</a>
            <a href="#"><i class="fa fa-dot-circle-o"></i> Subcategorias</a>
            <a href="#"><i class="fa fa-dot-circle-o"></i> Marcas</a>
          </li>
          <li class="treeview">
            <a href="#"><i class="fa fa-dot-circle-o"></i> Clientes
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{route ('organizacion.index')}}"><i class="fa fa-arrow-circle-right"></i> Organizaciones </a></li>
              <li><a href="#"><i class="fa fa-arrow-circle-right"></i> Sedes </a></li>
            </ul>
          </li>
        </ul>
      </li>
      @endcan

      <!-- Menú Recursos Humanos   -->
      <!-- ------------------------------------------------------------------------------------------------------------------------ -->

      @can('users.index')
      <li class="treeview">
        <a href="{{ route('users.index') }}">
          <i class="fa  fa-gears"></i> <span>RRHH</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li ><a href="index.html"><i class="fa fa-dot-circle-o"></i> Funcionarios</a></li>
          <li ><a href="index.html"><i class="fa fa-dot-circle-o"></i> Cargos</a></li>
          <li ><a href="index.html"><i class="fa fa-dot-circle-o"></i> Formatos</a></li>

        </ul>
      </li>
      @endcan

      <!-- Menú de Usuarios -->
      <!-- ------------------------------------------------------------------------------------------------------------------------ -->

      @can('users.index')
      <li class="treeview">
        <a href="#">
          <i class="fa fa-users"></i> <span>Usuarios</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>          
        </a>
        <ul class="treeview-menu">
          <li class="active"><a href="{{ route('users.index') }}"><i class="fa fa-arrow-circle-right"></i> Detalles</a></li>
          <li ><a href="index.html"><i class="fa fa-dot-circle-o"></i> Agregar</a></li>
          <li ><a href="index.html"><i class="fa fa-dot-circle-o"></i> Activar</a></li>
          <li ><a href="index.html"><i class="fa fa-dot-circle-o"></i> Editar</a></li>        
          <li ><a href="index.html"><i class="fa fa-dot-circle-o"></i> Eliminar</a></li>        
        </ul>

      </li>
      @endcan

      <!-- Menú de Seguridad -->
      <!-- ------------------------------------------------------------------------------------------------------------------------ -->

      @can('users.index')
      <li class="treeview">
        <a href="#">
          <i class="fa fa-shield"></i> <span>Seguridad</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="treeview">
            <a href="#"><i class="fa fa-dot-circle-o"></i>Roles
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="#"><i class="fa fa-arrow-circle-right"></i>Asignación rol (Usuario) </a></li>
            </ul>
          </li>
          <li ><a href="index2.html"><i class="fa fa-dot-circle-o"></i>Restricciones </a></li>
          <li class="treeview">
            <a href="#"><i class="fa fa-dot-circle-o"></i>Permisos
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="#"><i class="fa fa-arrow-circle-right"></i> Asignación Permiso (Rol) </a></li>
            </ul>
          </li>
        </ul>
      </li>
      @endcan
      
      <!-- Menu de ordenes de servicio -->
      <!-- ------------------------------------------------------------------------------------------------------------------------ -->
      @can('users.index')
      <li class="treeview">
        <a href="#">
          <i class="fa fa-files-o"></i>
          <span>Acerca de</span>
          <span class="pull-right-container">
            <span class="label label-danger pull-right ">5</span>
          </span>
        </a>
        <ul class="treeview-menu ">
          <li class="nav-item">
            <a href="#"><i class="fa fa-dot-circle-o"></i> Ayuda</a>
            <a href="#"><i class="fa fa-dot-circle-o"></i> Quienes Somos</a>
            <a href="#"><i class="fa fa-dot-circle-o"></i> Acerca de</a>
            <a href="#"><i class="fa fa-dot-circle-o"></i> Manual</a>
          </li>
        </ul>
        
      </li>        
      @endcan

      <!-- ------------------------------------------------------------------------------------------------------------------------ --> 

       <!-- <a href="#">
          <i class="fa fa-share"></i> <span>Multilevel</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="#"><i class="fa fa-dot-circle-o"></i> Level One</a></li>
          <li class="treeview">
            <a href="#"><i class="fa fa-circle-o"></i> Level One
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
              <li class="treeview">
            <li class="treeview">
           <a href="#"><i class="fa fa-circle-o"></i> Level Two
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                  <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
        </ul> -->

      </li>
    </ul>
    <!-- / sidebar menu   -->

  </section>
</aside>

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
  <strong>Copyright &copy; 2020 <a href="https://adminlte.io">Idea Colombia S.A.S.</a>.</strong> All rights
  reserved.
</center>
</footer>


<!-- REQUIRED JS SCRIPTS -->
<!-- jQuery 3 -->
<script src="{{asset('almasaeed2010/adminlte/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('almasaeed2010/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{asset('almasaeed2010/adminlte/dist/js/adminlte.min.js') }}"></script>


</div>
</body>
</html>