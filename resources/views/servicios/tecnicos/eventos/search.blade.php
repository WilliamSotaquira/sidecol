{!! Form::open(array('url'=>'servicios/tecnicos/eventos','method'=>'GET','autocomplete'=>'on','role'=>'search')) !!}

<div class="form-group">
	<div class="input-group">
		<span class="input-group-btn">
			<button class="btn btn-default">OST</button>			
		</span>
		<input type="text" class="form-control" id="searchText" name="searchText"  value="{{$searchText}}">
		<span class="input-group-btn">
			<button type="submit" class="btn btn-primary">Buscar por Numero de Servicio</button>
		</span>
		
	</div>
</div>
{{Form::close()}}