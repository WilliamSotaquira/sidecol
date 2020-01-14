<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    


    <!-- CSRF Token -->
    <!--<meta name="csrf-token" content="{{ csrf_token() }}">-->
    <link rel="icon" type="image/png" href="/images/logos/logo16x16.png" />

    <title>
        Sidecol | Idea Colombia
    </title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{asset('css/bootstrap-grid.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-reboot.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="/css/bootstrap-grid.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">




    <!-- Styles -->
    <style type="text/css" media="screen">

        html, body {
            background-color: #404040FF;
            color: #FFFFFF;
            font-weight: 100;
            /*margin: -75px;*/
            height: 100%; 


            margin: 0px; 
            padding: 0px;
            background-image: url(images/w_hd/text_1.png);
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
        .flex-footer{

            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;

            flex-wrap: wrap;
            flex-direction: row;

            background-color : rgba(40, 41, 35, .9);
            /*width: 100%;*/



        }
        .contenedor-footer{
            height: 100px;
            width: 200px;

            background-color: white;
            color: white;
            align-self: center;

            font-size: 3em;
            margin: 4px ;

            border-radius: 8px 8px 8px 8px;
            -moz-border-radius: 8px 8px 8px 8px;
            -webkit-border-radius: 8px 8px 8px 8px;
            border: 0px solid #000000;

            justify-content: center;
            align-items: center;
            vertical-align: center;

        }
        .position-ref {
            position: relative;
        }
        .full-body {
            height: 70%;        
        }
        .full-footer1{
            height: 13vh;
        }
        .full-footer2{
            height: 7vh;
        }

        .vertical-position{
            vertical-align: center;
        }
        .jumbotron{
            background-color : rgba(52, 58, 64, .9);
            padding: 3rem;
            align-items: center;
            justify-content: center;
        }

        .color{
            background-color : rgba(52, 58, 64, .9);    
        }
        .btn{
            width: 10rem;
        }

        #data{

         line-height: 0.4em; 
         font-size: .9em ;
     }


 </style> 
</head>

<body>
  @if(session()->has('success'))
  <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-check"></i> ¡Completado!</h4>
    {{session('success')}}    
</div>
@elseif(session()->has('danger'))
<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-ban"></i> ¡Advertencia!</h4>
    {{session('danger')}}          
</div>
@elseif(session()->has('warning'))
<div class="alert alert-warning alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-ban"></i> ¡Alerta!</h4>
    {{session('warning')}}          
</div>
@endif
{{ csrf_field() }}

<!--Barra de navegacion-->

<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
  <a class="navbar-brand" href="/"><img class="responsive  img-fluid mx-auto d-block" src="images/logos/logo2_89x25.png"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
    <ul class="navbar-nav">
        <li class="nav-item px-3 active">
            <a class="nav-link" href="{{ route('register') }}">Registro</a>
        </li>

        <li class="nav-item dropleft">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Contacto</a>
            <div class="dropdown-menu bg-dark">

                <a id="data"class="dropdown-item bg-dark " href="#"></a>
                    <strong><h6 class="text-capitalize mb-4  ">Idea Colombia S.A.S</h6><br></strong>
                    <p><i class="fa fa-home"></i>&nbsp&nbspAv. 19 No. 114 - 09 Of. 304 | Bogotá</p>
                    <p><i class="fa fa-envelope"></i>&nbsp&nbspsoporte@grupo-idea.com</p>
                    <p><i class="fa fa-phone"></i>&nbsp&nbspLínea gratuita nacional:</p>
                    <p><ul>018000-112064</ul></p>
                    <p><i class="far fa-circle"></i></i>&nbsp&nbsp(571) 620 81 57</p>
                    <p><i class="far fa-circle"></i></i>&nbsp&nbsp(571) 637 41 44</p>
                    <p><i class="far fa-circle"></i></i>&nbsp&nbsp(571) 637 41 13</p>
            </div>
        </li>
        
        <li class="nav-item px-3 active">
            <a class="btn btn-info" href="{{ route('login') }}">Ingreso</a>
        </li>
    </ul>
</div>
</nav>


<!--Fin barra de navegacion-->

<a href="" data-target=" #modal-alert" data-toggle="modal" id="enlace"><button hidden="hidden" id="boton" name="boton"></button></a>
@include('alert')  


<div class="flex-center full-body">
    <div class="container-fluid">
        <div class="container">

            <div class="jumbotron">
                <div class="row">
                    <div class="col-sm-9">
                       <p class="lead">¡Bienvenido!</p>
                       <hr class="my-1">
                       <p> Sistema web de idea Colombia</p>
                       <p class="lead">                    
                        <a class="btn btn-success" href="{{ route('preorden') }}" role="button"> ¡Cree su Pre-Orden!</a>
                    </p>              
                    <p> ¿Desea registrarse? Click <a class="nav-link-j" href="{{ route('register') }}">Aqui</a></p>
                </div>

            </div>


        </div>
    </div>
</div>        
</div>

<script src="{{asset('js/app.js') }}"></script>
<!-- jQuery 3 -->
<script src="{{asset('almasaeed2010/adminlte/bower_components/jquery/dist/jquery.min.js') }}"></script>


<script type="text/javascript">
 $(document).ready(function(e) {           
     // Simular click
     $('#boton').click();
 });
</script>


</body>

<!-- <footer>    
        <div class="container-fluid color rounded "> 
            <div class="row align-items-baseline justify-content-center ">
                <h6 class="small">Idea Colombia S.A.S. | 2019 </h6>            
            </div>
            <div class="row align-items-baseline justify-content-center ">
                <h6 class="small">Politicas de Seguridad</h6>            
            </div>


        </div>
          
    </footer> -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">

     <div id="menu" class="container-fluid">


        <div  id="row1"  class="row mt-1 justify-content-between align-items-center">

            <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 ">
                <img class="responsive  img-fluid mx-auto d-block" src="images/logos/dg180x60.png"> 
            </div>   
            <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                <img class="responsive  img-fluid mx-auto d-block" src="images/logos/a180x60.png">
            </div>
            <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                <img class="responsive  img-fluid mx-auto d-block" src="images/logos/ic180x60.png">
            </div>                  
            <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                <img class="responsive  img-fluid mx-auto d-block" src="images/logos/ai180x60.png">
            </div>      
            <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                <img class="responsive  img-fluid mx-auto d-block" src="images/logos/lg180x60.png">
            </div>            
            
            <!-- Grid column -->
        </div> 

    </div>

    <p class="m-0 text-center text-white">Copyright &copy; Idea Colombia S.A.S. 2020</p>
    <center><a href="http://grupo-idea.com/politicas/politicas_y_procedimientos_de_proteccion_de_base_de_datos.pdf">Politicas de manejo de datos</a></center>
    <!-- /.container -->
</footer>
<script src="{{asset('js/app.js') }}"></script>
<!-- jQuery 3 -->
<script src="{{asset('almasaeed2010/adminlte/bower_components/jquery/dist/jquery.min.js') }}"></script>


</html>
