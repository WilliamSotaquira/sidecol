<tr class="selected" id="fila'+cont+'"> 
	<td> 
		<button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">Eliminar</button> 
	</td> 
	<td>
		<input type="hidden" name="idmarca[]" value="'+idmarca+'">'+idmarca+". "+marca+'		
	</td>
	<td> 
		<input type="hidden" name="idsubcategoria[]" value="'+idsubcategoria+'">'+idsubcategoria+". "+subcategoria+'
	</td> 
</tr>

<tr class="selected" id="fila'+cont+'"> <td> <button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">Eliminar</button> </td> <td> <input type="hidden" name="idmarca[]" value="'+idmarca+'">'+idmarca+". "+marca+'</td> <td> <input type="hidden" name="idsubcategoria[]" value="'+idsubcategoria+'">'+idsubcategoria+". "+subcategoria+'</td> </tr>