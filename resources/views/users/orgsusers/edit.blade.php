@extends ('layouts.admin')
@section ('contenido')
@include('users.orgsusers.encabezado')



<section class="content">

  {!!Form::model($org_users,['method'=>'PUT','route'=>['users.orgsusers.update',$org_users->id],'files'=>'true'])!!}
  {{Form::token()}}


  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Editar Asignación {{$org_users->id}}</h3>
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
        <div class="col-xs-12 col-sm-8">

          <div class="row "> 
            <div class="col-xs-12 col-sm-12">
              <div class="form-group">
                <label for="organizacion_id" class="col-xs-12 col-sm-3 control-label">Organización</label>
                <div class="col-sm-9">
                  <select name="organizacion_id" class="form-control selectpicker" data-live-search="true" data-size="6" id="organizacion_id" required>
                   @foreach($orgs as $org)

                   @if ( $org->idtbl_organizacion==$org_users->organizacion_id) 
                   <option value="{{$org->idtbl_organizacion}}" selected >{{$org->nit}} - {{$org->razonsocial}}</option>
                   @else
                    <option value="{{$org->idtbl_organizacion}}" selected >{{$org->nit}} - {{$org->razonsocial}}</option>

                   @endif
                   @endforeach 

                 </select>                                              
               </div> 
             </div>
           </div>
         </div>


         <div class="row row-first"> 
          <div class="col-xs-12 col-sm-12">
            <div class="form-group">
              <label for="users_id" class="col-xs-12 col-sm-3 control-label">Colaborador</label>
              <div class="col-sm-9">
                <select name="users_id" class="form-control selectpicker" data-live-search="true" data-size="6" id="users_id" >
                  @foreach($usuarios as $user)

                  @if ( $user->id==$org_users->users_id) 
                  <option value="{{$user->id}}" selected ><strong>{{$user->documento}}</strong> - {{$user->name}} {{$user->apellidos}}</option>
                  @else
                  <option value="{{$user->id}}" ><strong>{{$user->documento}}</strong> - {{$user->name}} {{$user->apellidos}}</strong></option>
                  @endif

                  @endforeach               

                </select>                                              
              </div> 
            </div>
          </div>
        </div>

                <div class="row "> 
          <div class="col-xs-12 col-sm-12">
            <div class="form-group">
              <label for="estado" class="col-xs-12 col-sm-3 control-label">Estado</label>
              <div class="col-sm-9">
                <select name="estado" class="form-control selectpicker" data-live-search="true" data-size="6" id="estado" required>
                                   
                  @if($org_users->estado===1)  
                  <option value="1" >Activo</option>
                  <option value="2" >Deshabilitado</option>

                  @elseif($org_users->estado===2) 
                  <option value="1">Activo</option>
                  <option value="2" selected >Deshabilitado</option>

                  @elseif($org_users->estado===3) 
                  <option value="1" >Activo</option>        
                  <option value="2" >Deshabilitado</option>
                  <option value="3" selected>Eliminado</option>        
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
    <div class="row">
      <div class="col-sm-12">

        <div class="col-xs-0 col-sm-0 col-lg-3 text-center" style="padding-bottom: 5px; padding-top: 5px"></div>
        <div class="col-xs-12 col-sm-4 col-lg-2 text-center" style="padding-bottom: 5px; padding-top: 5px">

          <a href="{{route('users.orgsusers.index')}}" class="btn btn-info btn_end" id="back" >Atras</a><br>

        </div>
        <div class="col-xs-12 col-sm-4 col-lg-2 text-center" style="padding-bottom: 5px; padding-top: 5px">


         <a href="{{route('users.orgsusers.edit',$org_users->id)}}" class="btn btn-default btn_end" id="back" >Limpiar</a><br>

       </div>
       <div class="col-xs-12 col-sm-4 col-lg-2 text-center"  style="padding-bottom: 5px; padding-top: 5px">


        <button class="btn btn-danger btn_end" type="submit" > Guardar </button>


      </div>
      <div class="col-xs-0 col-sm-0 col-lg-3 text-center" style="padding-bottom: 5px; padding-top: 5px"></div>

    </div>

  </div>


</div>

</div>
{!!Form::close()!!}
</section>
@endsection


@section('scripts')

<script>

</script>


@endsection

