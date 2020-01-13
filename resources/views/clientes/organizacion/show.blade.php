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
		<li><a href="/">Organizaciones</a></li>
		<li class="active">Ver Registro</li>
	</ol>
</section>
@can('organizacion.index')
<section class="content">

	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Informacion del Registro</h3>

			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
				</button>
				<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
			</div>
		</div>

		<!-- /.box-header -->
		<!-- form start -->
    <!--
            * idtbl_organizacion
            * nit
            * razonsocial
            * logo     
            * margen
            * estado 
          -->
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
              <div class="col-xs-12 col-sm-8">

                <div class="row row-first">
                  <div class="col-xs-12 col-sm-12">
                    <div class="form-group">
                      <label for="nit" class="col-xs-12 col-sm-2 control-label">NIT</label>
                      <div class="col-sm-10">
                       <input type="text" class="form-control" name="nit" id="nit" value="{{$formorg->nit}}" disabled >
                     </div> 
                   </div> 
                 </div> 
               </div> 

               <div class="row">
                <div class="col-xs-12 col-sm-12">
                  <div class="form-group">
                   <label for="razonsocial" class="col-xs-12 col-sm-2 control-label">Razon Social</label>
                   <div class="col-sm-10">
                     <input type="text" class="form-control" name="razonsocial" id="razonsocial" value="{{$formorg->razonsocial}}" disabled="">
                   </div>
                 </div>
               </div>
             </div>

             <div class="row">
              <div class="col-xs-12 col-sm-12">
                <div class="form-group">
                  <label for="margen" class="col-xs-12 col-sm-2 control-label">Margen</label>
                  <div class="col-sm-10">      
                   <div class="input-group">
                    <input type="text" name="margen" id="margen" class="form-control" value="{{$formorg->margen}}" disabled="">
                    <span class="input-group-addon">%</span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-12 col-sm-12">
              <div class="form-group">
                <label for="estado" class="col-xs-12 col-sm-2 control-label">Estado</label>
                <div class="col-sm-10">
                 <select name="estado" class="form-control selectpiker" data-live-search="true" id="estado" disabled="">
                  <option selected disabled="true">Seleccione &hellip;</option>                  
                  @if ($formorg->estado==='1')						
                  <option value="1" selected >Activo</option>
                  <option value="0">Inactivo</option>
                  @elseif ($formorg->estado==='0')
                  <option value="1" >Activo</option>
                  <option value="0" selected>Inactivo</option>
                  @else
                  <option value="2" selected="">Eliminado</option>		
                  @endif    
                </select>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-4">
       <div class="box-body">
        <label for="" class="col-sm-2 control-label">Logo</label><a href="{{$formorg->image}}">         

        <div id="preview" class="thumbnail">  
         @if ($formorg->image!=null)	
        <img src="{{asset ($formorg->image)}}"/>
         @else
         <img src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22200%22%20height%3D%22200%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20200%20200%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_16706540b1a%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A10pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_16706540b1a%22%3E%3Crect%20width%3D%22200%22%20height%3D%22200%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2274.4296875%22%20y%3D%22104.5%22%3ESin&nbsp;Logo%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E"/>

         @endif  


       </div>
       <span class="alert alert-default " id="file-info" style="margin:0px;  ">Logo : {{$formorg->razonsocial}}</span></a>



     </div>
   </div>
 </div>
 <div class="box-footer " id="guardar">
  <div class="container-fluid">
    <div class="row-bottons">
      <div class="col-sm-12">
       <div class="col-sm-3 text-center" style="padding-bottom: 5px; padding-top: 5px"></div>
       <div class="col-sm-2 text-center" style="padding-bottom: 5px; padding-top: 5px"></div>
       <div class="col-sm-2 text-center" style="padding-bottom: 5px; padding-top: 5px">

        <a href="{{route('clientes.organizacion.index')}}" class="btn btn-info btn_end" id="back" >Atras</a><br>

      </div>
      <div class="col-sm-2 text-center"  style="padding-bottom: 5px; padding-top: 5px"></div>
      <div class="col-sm-3 text-center" style="padding-bottom: 5px; padding-top: 5px"></div>
      
    </div>
  </div>
</div>
</div>

</section>

@endcan
@endsection
@section('scripts')
<link rel="stylesheet" type="text/css" href="{{asset ('css/img.css')}}">
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

		$('#file').click();
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

@endsection