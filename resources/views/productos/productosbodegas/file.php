
bodegas=document.getElementById('pbbodega_id').value.split('_');        
bodega_id=bodegas[0];
TipoBodega=bodegas[1];
console.log(bodega_id+" "+TipoBodega);

productos=document.getElementById('pbproducto_id').value.split('_');
producto_id=productos[0];
referencia=productos[1];
console.log(producto_id+" "+referencia);

cantidad = $('#pcantidad').val();
console.log(cantidad);


<tr class="selected" id="fila'+cont+'"> 
	<td> 
		<button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">Eliminar</button> 
	</td> 
	<td>
		<input type="hidden" name="bodega_id[]" value="'+bodega_id+'">'+bodega_id+". "+TipoBodega+'		
	</td>
	<td> 
		<input type="hidden" name="producto_id[]" value="'+producto_id+'">'+producto_id+". "+referencia+'
	</td> 
	<td> 
		<input type="hidden" name="cantidad[]" value="'+cantidad+'">'+cantidad+'
	</td> 
</tr>

<tr class="selected" id="fila'+cont+'"> <td> <button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">Eliminar</button> </td> <td> <input type="hidden" name="bodega_id[]" value="'+bodega_id+'">'+bodega_id+". "+TipoBodega+'</td> <td> <input type="hidden" name="producto_id[]" value="'+producto_id+'">'+producto_id+". "+referencia+'</td> <td> <input type="hidden" name="cantidad[]" value="'+cantidad+'">'+cantidad+'</td> </tr>


