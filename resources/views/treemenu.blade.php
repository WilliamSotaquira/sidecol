<!------------------------------------------------------------------------------------------------------------------------------------>

<!-- Left side column. contains the logo and sidebar -->  
<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{asset ('images/user/user1_160x160.png')}}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-center info">

        <p style="margin-bottom: 0px;">{{Auth::user()->name}}</p>
        <p style="color:#999999;"><small>{{Auth::user()->apellidos}}</small></p>


        <a href="#"  style="color: #999999;><i class="fa fa-circle text-success""></i> Online</a>
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

    <!------------------------------------------------------------------------------------------------------------------------------------>

    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MENU DE NAVEGACION</li>

      <!-- Menu de Productos-->
      <!-- ------------------------------------------------------------------------------------------------------------------------ -->
      
      @can('productos.menu')


      <li class="treeview" >
        <a href="#" title="Menu de los productos">
          <i class="fa fa-industry" ></i><span>Menú de productos</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">          


         <li class="active"><a href="{{route('productos.productos.index')}}" ><i class="fa fa-dot-circle-o" ></i> Productos</a></li> 
         <li class="active"><a href="{{route('productos.productosbodegas.index')}}" title=""><i class="fa fa-dot-circle-o"></i> Inventario</a></li> 
         <li><a href="{{route('productos.categorias.index')}}" title=""><i class="fa fa-dot-circle-o"></i> Categorías</a></li> 
         <li><a href="{{route ('productos.subcategorias.index')}}" title=""><i class="fa fa-dot-circle-o"></i> SubCategorías</a></li> 
         <li><a href="{{route('productos.marcas.index')}}" title=""><i class="fa fa-dot-circle-o"></i> Marcas</a></li> 
         <li><a href="{{route('productos.marcasubcategorias.index')}}" title=""><i class="fa fa-dot-circle-o"></i>Asignación de<br>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;SubCategorías a Marca</a></li>          
         <li><a href="{{route('productos.bodegas.index')}}" title=""><i class="fa fa-dot-circle-o"></i> Bodegas</a></li> 
       </ul>
     </li>


     @endcan



     <!-- Menú de Servicio   -->
     <!-- ------------------------------------------------------------------------------------------------------------------------ -->

     @can('servicio.menu')
     <li class="treeview">
      <a href="#">
        <i class="fa fa-wrench"></i><span>Servicio</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        @can('osts.create')
        <li class="active"><a href="{{route('servicios.osts.create')}}"><i class="fa fa-dot-circle-o"></i> Crear OST</a></li>
        @endcan
        @can('osts.index')
        <li class="active"><a href="{{route('servicios.osts.index')}}"><i class="fa fa-dot-circle-o"></i> Ordenes de Servicio</a></li>
        @endcan
        @can('usersosts.index')
        <li class="active"><a href="{{route('servicios.usersosts.index')}}"><i class="fa fa-dot-circle-o"></i> Asignar Técnico a OST</a></li>
        @endcan
        @can('eventososts.index')
        <li class="active"><a href="{{route('servicios.eventososts.index')}}"><i class="fa fa-dot-circle-o"></i>Eventos de OST</a></li>
        @endcan


        <li class="treeview">
          <a href="#"><i class="fa fa-dot-circle-o"></i> Técnicos
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li ><a href="{{route('users.users.create')}}"><i class="fa fa-arrow-circle-right"></i>Crear Nuevo Técnico</a></li>
            <li ><a href="{{ route('clientes.organizacion.create') }}"><i class="fa fa-arrow-circle-right"></i> Crear Taller</a></li>        
            <li ><a href="{{route('users.orgsusers.index')}}"><i class="fa fa-arrow-circle-right"></i> Asignar Técnico a Taller</a></li>        
            <li ><a href="{{ route('seguridad.roluser.create') }}"><i class="fa fa-arrow-circle-right"></i> Asignar Rol a Técnico</a></li>        
          </ul>
        </li>

        @can('repuestos.index')
        <li><a href="#"><i class="fa fa-dot-circle-o"></i> Repuestos(ED)</a></li>
        @endcan
        @can('pqrs.index')
        <li><a href="#"><i class="fa fa-dot-circle-o"></i> PQRS(ED)</a></li>
        @endcan
      </ul>

      <ul class="treeview-menu">
        <li ><a href="#"><i class="fa fa-circle-o"></i> OST <strong>(Ordenes)</strong> </a></li>
        <li ><a href="#"><i class="fa fa-circle-o"></i> PQRS</a></li>
      </ul>
    </li>

    @endcan

    <!-- Menú de Seguridad -->
    <!-- ------------------------------------------------------------------------------------------------------------------------ -->

    @can('seguridad.menu')
    <li class="treeview">
      <a href="#">
        <i class="fa fa-lock"></i> <span>Seguridad</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>

      <ul class="treeview-menu">

        @can('roles.index')

        <li class="treeview">
          <a href="#"><i class="fa fa-dot-circle-o"></i>Roles
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <li><a href="{{ route('seguridad.roles.index') }}"><i class="fa fa-arrow-circle-right"></i>Menú Roles</a></li>
            @endcan
            @can('rolesusers.index')
            <li><a href="{{ route('seguridad.roluser.index') }}"><i class="fa fa-arrow-circle-right"></i><strong>Roles de usuarios</strong> </a></li>
            @endcan
            @can('roles.index')

          </ul>
        </li>
        @endcan


        <li class="treeview">
          <a href="#"><i class="fa fa-dot-circle-o"></i>Permisos
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route ('seguridad.permisos.index')}}"><i class="fa fa-arrow-circle-right"></i>Menú Permisos</a></li>
            <li><a href="{{route ('seguridad.permisosroles.index')}}" ><i class="fa fa-arrow-circle-right "></i><strong>Permisos a roles</strong></a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#"><i class="fa fa-dot-circle-o"></i>Usuarios
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('seguridad.permisosusuarios.index')}}"><i class="fa fa-arrow-circle-right"></i><strong>Permisos a usuarios</strong></a></li>
          </ul>
        </li>
        
      </ul>
    </li>

    @endcan 


    <!-- Menú de Usuarios -->
    <!-- ------------------------------------------------------------------------------------------------------------------------ -->
    @can('usuarios.menu')
    <li class="treeview">
      <a href="#">
        <i class="fa fa-user"></i> <span>Usuarios</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>          
      </a>
      <ul class="treeview-menu">
        <li class="active"><a href="{{route('users.users.create')}}"><i class="fa fa-dot-circle-o"></i> Agregar Usuario</a></li>
        <li ><a href="{{route('users.users.index')}}"><i class="fa fa-dot-circle-o"></i> Menú de Usuarios</a></li>
        <li ><a href="{{route('users.orgsusers.index')}}"><i class="fa fa-dot-circle-o"></i> Asignar <br>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;Usuario a Organización</a></li>
      </ul>

    </li>

    @endcan  

    <!-- Menú de talleres -->
    <!-- ------------------------------------------------------------------------------------------------------------------------ -->
    @can('talleres.menu')
    <li class="treeview">
      <a href="#">
        <i class="fa fa-briefcase"></i> <span>Menú de Taller</span>
        <span class="pull-right-container" >
          <i class="fa fa-angle-left pull-right"></i>
        </span>          
      </a>
      <ul class="treeview-menu">
        <li ><a href="{{route('servicios.talleres.osts.index')}}" title="Este el menu de las ordenes de servicio asignadas a esta organización."><i class="fa fa-dot-circle-o"></i>Ordenes de Servicios (OST)</a></li>           
        <li><a href="{{route('servicios.talleres.eventos.index')}}"><i class="fa fa-dot-circle-o"></i>Eventos</a></li>        

        <?php 
        $ide= Crypt::encrypt('0');
        ?>

        <li ><a href="{{route ('servicios.talleres.eventos.create',$ide)}}" title="Agragar soportes al desarrollo de la OST."><i class="fa fa-dot-circle-o"></i>Crear Evento</a></li>

        <li class="treeview">
          <a href="#"><i class="fa fa-dot-circle-o"></i> Técnicos
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li ><a href="{{route('servicios.talleres.tecnicos.index')}}"><i class="fa fa-arrow-circle-right"></i>Mis Técnicos</a></li>    
            <li ><a href="{{route('users.users.create')}}"><i class="fa fa-arrow-circle-right"></i>Crear Nuevo Técnico</a></li>
          </ul>
        </li>

      </ul>

    </li>
    @endcan    

    <!-- Menú de talleres -->
    <!-- ------------------------------------------------------------------------------------------------------------------------ -->
    @can('tecnicos.menu')
    <li class="treeview">
      <a href="#">
        <i class="fa fa-users"></i> <span>Menú de Técnicos</span>
        <span class="pull-right-container" >
          <i class="fa fa-angle-left pull-right"></i>
        </span>          
      </a>
      <ul class="treeview-menu">
        <!-- <li class="active"><a href="{{route('users.users.create')}}"><i class="fa fa-dot-circle-o"></i>Mi Perfil</a></li> -->
        <li ><a href="{{route('servicios.tecnicos.osts.index')}}" title="Este el el menu de mis ordenes de servicio."><i class="fa fa-dot-circle-o"></i>Mis OST</a></li>           

        <?php 
        $ide= Crypt::encrypt('0');
        ?>

        <li ><a href="{{route ('servicios.tecnicos.eventos.index')}}" title="Agragar soportes al desarrollo de la OST."><i class="fa fa-dot-circle-o"></i>Mis Eventos</a></li>

        <li ><a href="{{route ('servicios.tecnicos.eventos.create',$ide)}}" title="Agragar soportes al desarrollo de la OST."><i class="fa fa-dot-circle-o"></i>Crear Evento</a></li>
<!--         <li ><a href="{{route('mantenimiento')}}" title="Aceptar la orden de servicio técnico OST."><i class="fa fa-dot-circle-o"></i>Aceptar de OST</a></li>
  <li ><a href="{{route('mantenimiento')}}" title="Rechazar la orden de servicio técnico ."><i class="fa fa-dot-circle-o"></i>Rechazar de OST</a></li> -->
  <li ><a href="{{route('mantenimiento')}}"><i class="fa fa-dot-circle-o"></i>Manuales de Productos (ED)</a></li>
</ul>

</li>


@endcan    


<!-- Menú de Logistica -->
<!-- ------------------------------------------------------------------------------------------------------------------------ -->
@can('logistica.menu')

<li class="treeview">
  <a href="#">
    <i class="fa  fa-truck"></i> <span>Logística (ED)</span>
    <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>          
  </a>
  <ul class="treeview-menu">
    <li ><a href="{{ route('clientes.organizacion.index') }}"><i class="fa fa-arrow-circle-right"></i> Organizaciones</a></li>
    <li ><a href="{{ route('clientes.sede.index') }}"><i class="fa fa-arrow-circle-right"></i> Sedes</a></li>       
  </ul>
</li>
@endcan 

<!-- Menu de Comercial-->
<!-- ------------------------------------------------------------------------------------------------------------------------ -->

@can('comercial.menu')
<li class="treeview">
  <a href="#">
    <i class="fa fa-line-chart"></i> <span>Comercial (ED)</span>
    <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu ">
    @can('clientes.menu')
    <li class="treeview">
      <a href="#"><i class="fa fa-dot-circle-o"></i> Clientes
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li ><a href="{{ route('clientes.organizacion.index') }}"><i class="fa fa-arrow-circle-right"></i> Organizaciones</a></li>
        <li ><a href="{{ route('clientes.sede.index') }}"><i class="fa fa-arrow-circle-right"></i> Sucursales</a></li>        
      </ul>
    </li>
    @endcan
    <li class="nav-item">
      <a href="#"><i class="fa fa-dot-circle-o"></i> Informacion (ED)</a>
    </li>
  </ul>
</li>

@endcan



<!-- Menú de Administracion -->
<!-- ------------------------------------------------------------------------------------------------------------------------ -->
@can('administracion.menu')

<li class="treeview">
  <a href="#">
    <i class="fa fa-archive"></i> <span>Admin (ED)</span>
    <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">          
    <li ><a href="index2.html"><i class="fa fa-dot-circle-o"></i> Eventos </a></li>
  </ul>
</li>

@endcan


<!-- Menú Recursos Humanos   -->
<!-- ------------------------------------------------------------------------------------------------------------------------ -->

@can('rrhh.menu')
<li class="treeview">
  <a href="{{ route('users.users.index') }}">
    <i class="fa  fa-gears"></i> <span>RRHH (ED)</span>
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


<!-- Menu de ordenes de servicio -->
<!-- ------------------------------------------------------------------------------------------------------------------------ -->

<li class="treeview">
  <a href="#">
    <i class="fa fa-files-o"></i>
    <span>Acerca de</span>
    <span class="pull-right-container">
      <!-- <span class="label label-danger pull-right ">5</span> -->
    </span>
  </a>
  <ul class="treeview-menu ">
    <li class="nav-item">
      <a href="#"><i class="fa fa-dot-circle-o"></i> Ayuda</a>
      <ul style="color: #FFFFFF;">
        <li>soporte@grupo-idea.com</li>
      </ul>
      <a href="http://grupo-idea.com/colombia/nosotros/"><i class="fa fa-dot-circle-o"></i> Quienes Somos</a>
      <a href="#"><i class="fa fa-dot-circle-o"></i> Acerca de</a>
        <ul style="color: #FFFFFF;">
        <li>Idea Colombia S.A.S</li>
        <li>Av. 19 No. 114 - 09 Of. 304 <br> Bogotá</li>
        <li>Línea gratuita nacional:<br> 018000-112064</li>
        <li>(571) 620 8157</li>
        <li>(571) 637 4144</li>
        <li>(571) 637 4113</li>
      </ul>
      <!-- <a href="#"><i class="fa fa-dot-circle-o"></i> Manual</a> -->
    </li>
  </ul>

     
 <!--                    <strong><h6 class="text-capitalize mb-4  ">Idea Colombia S.A.S</h6><br></strong>
                    <p><i class="fa fa-home"></i>&nbsp&nbspAv. 19 No. 114 - 09 Of. 304 | Bogotá</p>
                    <p><i class="fa fa-envelope"></i>&nbsp&nbspsoporte@grupo-idea.com</p>
                    <p><i class="fa fa-phone"></i>&nbsp&nbspLínea gratuita nacional:</p>
                    <p><ul>018000-112064</ul></p>
                    <p><i class="far fa-circle"></i></i>&nbsp&nbsp(571) 620 81 57</p>
                    <p><i class="far fa-circle"></i></i>&nbsp&nbsp(571) 637 41 44</p>
                    <p><i class="far fa-circle"></i></i>&nbsp&nbsp(571) 637 41 13</p>
 -->
</li>        


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

<!------------------------------------------------------------------------------------------------------------------------------------>
