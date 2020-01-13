@extends ('layouts.admin')
@section ('contenido')
@include('users.orgsusers.encabezado')


<section class="content">

  {!!Form::open(array('url'=>'users/orgsusers/store','method'=>'POST','autocomplete'=>'off','files'=> true))!!}
  {{ csrf_field() }}

  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Asignar técnico a orden de servicio</h3>


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

          <div class="row row-first"> 
            <div class="col-xs-12 col-sm-6">
             <div class="form-group">
              <label for="users_id" class="col-xs-12 col-sm-3" >Colaborador</label>
              <div class="col-sm-9">
                <select id="users_id" name="users_id" class="selectpicker form-control" data-live-search="true" id="users_id" required>
                  <option selected disabled="true">Seleccione &hellip;</option>  
                  @foreach($usuarios as $users)  
                  <option value="{{$users->id}}">{{$users->name}} {{$users->apellidos}} - {{$users->documento}}</option>
                  @endforeach

                </select>                                              
              </div>          
            </div>
          </div>
        </div>
        

       <div class="row row-first">               

        <div class="col-xs-12 col-sm-6  ">
         <div class="form-group">
          <label for="organizacion_id" class="col-xs-12 col-sm-3" >Organización</label>
          <div class="col-sm-9">
            <select id="organizacion_id" name="organizacion_id" class="selectpicker form-control" autofocus="autofocus" data-live-search="true" id="organizacion_id" required>
              <option selected disabled="true">Seleccione &hellip;</option>  
              @foreach($orgs as $org)  
              <option value="{{$org->idtbl_organizacion}}">{{$org->razonsocial}} - {{$org->nit}}</option>
              @endforeach

            </select>                                              
          </div>          
        </div>
      </div>
    </div>


  <div class="row row-first"> 
    <div class="col-xs-12 col-sm-6">
     <div class="form-group">
      <label for="estado" class="col-xs-12 col-sm-3" >Estado del Contrato</label>
      <div class="col-sm-9">
        <select id="estado" name="estado" class="selectpicker form-control" data-live-search="true" id="estado" required>
          <option selected disabled="true">Seleccione &hellip;</option>  
          <option value="1">Activo</option>
          <option value="2">Deshabilitado </option>
        </select>                                              
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
        <div class="col-xs-0 col-sm-0 col-lg-3 text-center" style="padding-bottom: 5px; padding-top: 5px"></div>
        <div class="col-xs-12 col-sm-4 col-lg-2 text-center" style="padding-bottom: 5px; padding-top: 5px">

          <button class="btn btn-success btn_end" type="submit" > Guardar </button>

        </div>
        <div class="col-xs-12 col-sm-4 col-lg-2 text-center" style="padding-bottom: 5px; padding-top: 5px">

         <a href="{{route('users.orgsusers.create')}}" class="btn btn-default btn_end" id="back" >Limpiar</a><br>

       </div>
       <div class="col-xs-12 col-sm-4 col-lg-2 text-center"  style="padding-bottom: 5px; padding-top: 5px">

        <a href="{{route('users.orgsusers.index')}}" class="btn btn-info btn_end" id="back" >Atrás</a><br>

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
