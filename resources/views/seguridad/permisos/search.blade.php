{!! Form::open(array('url'=>'seguridad/permisos','method'=>'GET','autocomplete'=>'on','role'=>'search')) !!}

<div class="form-group">
	<div class="input-group">
		<input type="text" class="form-control" id="searchText" name="searchText" placeholder="Buscar..." value="{{$searchText}}">
		<span class="input-group-btn">
			<button type="submit" class="btn btn-primary">Buscar</button>
		</span>
		
	</div>
</div>
{{Form::close()}}