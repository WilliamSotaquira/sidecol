<tr class="selected" id="fila'+cont+'"> 
	<td> 
		<button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">Eliminar</button> 
	</td> 
	<td>
		<input type="hidden" name="role_id[]" value="'+role_id+'">'+role_id+". "+rname+" : "+rslug+'		
	</td>
	<td> 
		<input type="hidden" name="rdescription[]" value="'+rdescription+'">'+rdescription+'
	</td> 
	<td> 
		<input type="hidden" name="permission_id[]" value="'+permission_id+'">'+permission_id+". "+pname+" : "+pslug+'
	</td> 
	<td> 
		<input type="hidden" name="pdescription[]" value="'+pdescription+'">'+pdescription+'
	</td> 
</tr>

<tr class="selected" id="fila'+cont+'"> <td> <button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">Eliminar</button> </td> <td> <input type="hidden" name="role_id[]" value="'+role_id+'">'+role_id+". "+rname+" : "+rslug+'</td> <td> <input type="hidden" name="rdescription[]" value="'+rdescription+'">'+rdescription+'</td> <td> <input type="hidden" name="permission_id[]" value="'+permission_id+'">'+permission_id+". "+pname+" : "+pslug+'</td> <td> <input type="hidden" name="pdescription[]" value="'+pdescription+'">'+pdescription+'</td> </tr>