@extends ('layouts.admin')
@section ('contenido')
@include('seguridad.roluser.encabezado')



<section class="content">

  {!!Form::model($RolUsers,['method'=>'PUT','route'=>['seguridad.roluser.update',$RolUsers->id],'files'=>'true'])!!}
  {{Form::token()}}


  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Editar Asignación {{$RolUsers->id}}</h3>
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




          <div class="row row-first"> 
            <div class="col-xs-12 col-sm-12">
              <div class="form-group">
                <label for="user_id" class="col-xs-12 col-sm-3 control-label">Usuario</label>
                <div class="col-sm-9">
                  <select name="user_id" class="form-control selectpicker" data-live-search="true" data-size="6" id="user_id" >
                    @foreach($users as $user)

                    @if ( $user->id==$RolUsers->user_id) 
                    <option value="{{$user->id}}" selected >{{$user->id}} . {{$user->name}} {{$user->apellidos}}</option>
                    
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
                <label for="role_id" class="col-xs-12 col-sm-3 control-label">Roles</label>
                <div class="col-sm-9">
                  <select name="role_id" class="form-control selectpicker" data-live-search="true" data-size="6" id="role_id" required>
                   @foreach($roles as $rol)

                   @if ( $rol->id==$RolUsers->role_id) 
                   <option value="{{$rol->id}}" selected >{{$rol->id}} . {{$rol->name}} : <strong>{{$rol->slug}}</strong></option>
                   @else
                   <option value="{{$rol->id}}" >{{$rol->id}} . {{$rol->name}} : <strong>{{$rol->slug}}</strong></option>
                   @endif
                   @endforeach 

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

          <a href="{{route('seguridad.roluser.index')}}" class="btn btn-info btn_end" id="back" >Atras</a><br>

        </div>
        <div class="col-xs-12 col-sm-4 col-lg-2 text-center" style="padding-bottom: 5px; padding-top: 5px">


         <a href="{{route('seguridad.roluser.edit',$RolUsers->id)}}" class="btn btn-default btn_end" id="back" >Limpiar</a><br>

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

