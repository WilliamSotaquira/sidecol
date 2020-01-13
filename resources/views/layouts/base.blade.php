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
		<li class="active">Organizaciones</li>
	</ol>
</section>
@can('organizacion.index')
<section class="content">


	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Agregar Nuevo Registro</h3>

			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
				</button>
				<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
			</div>
		</div>
		<!-- /.box-header -->
		<div class="box-body">	
			<div class="row mt-1 justify-content-between align-items-center" >
                        
				
			</div>
		</div>
		

   </div>

   <!-- /.box-body -->
		<!-- <div class="box-footer text-center"
			<a href="javascript:void(0)" class="uppercase"></a>
		</div> -->
		<!-- /.box-footer -->
	
</div>

</section>
@endcan
@endsection