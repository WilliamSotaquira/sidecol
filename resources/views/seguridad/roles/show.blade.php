@extends ('layouts.admin')
@section ('contenido')
@include('seguridad.roles.encabezado')


@can('organizacion.index')
<section class="content">

	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Informacion del Rol</h3>

			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
				</button>
				<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
			</div>
		</div>   

    <!-- Tabla: roles
    id
    name
    slug
    description       
    created_at
    updated_at
    special
  -->


  <div class="box-body">
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

      <div class="col-xs-12 col-sm-8">

        <div class="row row-first">
          <div class="col-xs-12 col-sm-12">
            <div class="form-group">
              <label for="id" class="col-xs-12 col-sm-2 control-label">ID</label>
              <div class="col-sm-6">
               <input type="text" class="form-control" name="id" id="id" value="{{$roles->id}}" disabled >
             </div> 
           </div> 
         </div> 
       </div> 

       <div class="row">
        <div class="col-xs-12 col-sm-12">
          <div class="form-group">
           <label for="name" class="col-xs-12 col-sm-2 control-label">Nombre</label>
           <div class="col-sm-10">
             <input type="text" class="form-control" name="name" id="name" value="{{$roles->name}}" disabled="">
           </div>
         </div>
       </div>
     </div>     

     <div class="row">
      <div class="col-xs-12 col-sm-12">
        <div class="form-group">
         <label for="slug" class="col-xs-12 col-sm-2 control-label">Identificador</label>
         <div class="col-sm-10">
           <input type="text" class="form-control" slug="slug" id="slug" value="{{$roles->slug}}" disabled="">
         </div>
       </div>
     </div>
   </div>

   <div class="row">
    <div class="col-xs-12 col-sm-12">
      <div class="form-group">
        <label for="description" class="col-xs-12 col-sm-2 control-label">Descripción</label>
        <div class="col-sm-10">     
          <textarea class="form-control" rows="3" value="{{$roles->description}}" disabled>{{$roles->description}}</textarea>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-xs-12 col-sm-12">
      <div class="form-group">
        <label for="created_at" class="col-xs-12 col-sm-2 control-label">Desde</label>
        <div class="col-sm-6">
          <input type="text" name="created_at" id="created_at" class="form-control" value="{{$roles->created_at}}" disabled="">
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-xs-12 col-sm-12">
      <div class="form-group">
        <label for="updated_at" class="col-xs-12 col-sm-2 control-label">Actualizado</label>
        <div class="col-sm-6">
          <input type="text" name="updated_at" id="updated_at" class="form-control" value="{{$roles->updated_at}}" disabled="">
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-xs-12 col-sm-12">
      <div class="form-group">
        <label for="special" class="col-xs-12 col-sm-2 control-label">Estado</label>
        <div class="col-sm-6">
         <select name="special" class="form-control selectpiker" data-live-search="true" id="special" disabled="">
          <option selected disabled="true">Seleccione &hellip;</option>                  
          @if ($roles->special==='all-access')						
          <option selected >Acceso Total</option>
          @elseif ($roles->special==='no-access')
          <option selected>Limitado</option>
          @else
          <option value=" " selected="">Ninguno</option>		
          @endif    
        </select>
      </div>
    </div>
  </div>
</div>
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

        <a href="{{route('seguridad.roles.index')}}" class="btn btn-info btn_end" id="back" >Atras</a><br>

      </div>
      <div class="col-sm-2 text-center"  style="padding-bottom: 5px; padding-top: 5px"></div>
      <div class="col-sm-3 text-center" style="padding-bottom: 5px; padding-top: 5px"></div>
      
    </div>
  </div>
</div>
</div>
</div>

</section>

@endcan
@endsection
