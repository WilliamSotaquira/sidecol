        @extends('layouts.app')

        @section('content')


        <div class="container-preorder">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="card">  
                {!!Form::open(array('url'=>'/preorden/guardar','method'=>'POST','autocomplete'=>'off', 'files'=> true))!!}
                {{ csrf_field() }} 
                <div class="card-header"><strong>{{ __('PreOrden de Servicio Técnico') }}</strong></div>


                <div class="card-body-intro">

                  <div class="row"> 
                   <div class="col-xs-12 col-md-12 ">

                    <table class="table">

                      <thead style="align-items: center;">
                        <tr><td width="25%" ><center><img style="padding-bottom: 15px" src="http://grupo-idea.com/colombia/wp-content/uploads/sites/6/2015/08/ideacolombia.png"></center></td>
                          <td width="75%" style="background-color: #87EC22;  "><center><h6>Señor usuario</h6><p>Esta creando una nueva Pre-Orden de servicio que sera  atendida por técnicos autorizados por Idea Colombia S.A.S. Recuerde tener en cuenta nuestras politicas de garantia .</p><strong><a href="{{asset('politicas/CERTIFICADO%20DE%20GARANT%C3%8DA%20ARISTON.PDF') }}" title="">Ariston</a></strong>, <strong><a href="{{asset('politicas/CERTIFICADO%20DE%20GARANT%C3%8DA%20AirOn.pdf') }}" title="">AirOn</a></strong> </center></td>
                        </tr>
                      </thead>   
                      <tbody>
                        <tr>
                          <td colspan="2">
                            <div class="row"> 

                              <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6"> 

                                <div class="input-group"> 
                                  <div class="col-sm-5">
                                    <label for="contacto">Persona <small> de Contacto</small></label>                               
                                  </div>
                                  <div class="col-xs-12 col-sm-7 col-md-7">
                                   <input type="text" class="form-control" autocomplete="autocomplete" name="contacto" id="contacto" placeholder="Nombre Completo" value="{{old('contacto')}}" required="required" autofocus="autofocus">
                                 </div>                                                             
                               </div>
                               <div class="input-group"> 
                                <div class="col-sm-5">
                                  <label for="celular">Celular</label>                               
                                </div>
                                <div class="col-xs-12 col-sm-7 col-md-7">
                                 <input type="tel" class="form-control" autocomplete="autocomplete" name="celular" id="celular" placeholder="" value="{{old('celular')}}">
                               </div>                                                             
                             </div>

                             <div class="input-group"> 
                              <div class="col-sm-5">
                                <label for="direccion">Dirección</label>                               
                              </div>
                              <div class="col-xs-12 col-sm-7 col-md-7">
                               <input type="text" class="form-control" autocomplete="autocomplete" name="direccion" id="direccion" placeholder="" value="{{old('direccion')}}" required="required">
                             </div>                                                             
                           </div>
                           <div class="input-group"> 
                            <div class="col-sm-5">
                              <label for="contacto">Ciudad</label>                               
                            </div>
                            <div class="col-xs-12 col-sm-7 col-md-7">
                              <select name="municipio_id" class="form-control selectpicker" data-size="6" data-live-search="true" id="municipio_id" value="{{old('municipio_id')}}" required="required">
                                <option selected ="true">Seleccione &hellip;</option> 
                                @foreach($municipios as $municipio) 
                                <option value="{{$municipio->id_municipio}}">{{$municipio->municipio}} - {{$municipio->departamento}}</option>
                                @endforeach
                              </select>
                            </div>                                                             
                          </div>

                        </div> 

                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6"> 

                          <div class="input-group"> 
                            <div class="col-sm-5">
                              <label for="email">E mail</label>                               
                            </div>
                            <div class="col-xs-12 col-sm-7 col-md-7">
                             <input type="emial" class="form-control" autocomplete="autocomplete" name="email" id="email" placeholder="" value="{{old('email')}}" required="required">
                           </div>                                                             
                         </div>
                         <div class="input-group"> 
                          <div class="col-sm-5">
                            <label for="telefono">Teléfono</label>                               
                          </div>
                          <div class="col-xs-12 col-sm-7 col-md-7">
                            <input type="tel" class="form-control" autocomplete="autocomplete" name="telefono" id="telefono" placeholder="" value="{{old('telefono')}}">
                         </div>                                                             
                       </div>
                       <div class="input-group"> 
                        <div class="col-sm-5">
                          <label for="observaciones">Observaciones</label>                               
                        </div>
                        <div class="col-xs-12 col-sm-7 col-md-7">
                          <textarea name="observaciones" id="observaciones" class="form-control" rows="3" required="required"></textarea>
                        </div>                                                             
                      </div>

                    </div>

                  </div>
                </td>
              </tr>
            </tbody>


          </table>
        </div>
      </div>
      <div class="row"> 
        <div class="col-sm-12 text-center"> 
          <button class="btn btn-primary btn_end" type="submit" > Guardar </button>
        </div>
      </div>
    </div>
    {!!Form::close()!!}  
  </div>  
</div>
</div>
</div>

@endsection
@section('scripts')



@endsection
