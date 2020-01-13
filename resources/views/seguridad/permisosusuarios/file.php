<tr class="selected" id="fila'+i+'"> 
	<td> 
		<button type="button" class="btn btn-warning" onclick="eliminar('+i+');">Eliminar</button> 
	</td> 
	<td>
		<input type="hidden" name="userid" value="userid">userid			
	</td>
	<td> 
		<input type="hidden" name="role_id[]" value="'+data[i].rid+'">'+data[i].rname+'
	</td> 
	<td> 
		<input type="hidden" name="rdescription[]" value="'+data[i].rdescription+'">'+data[i].rdescription+'
	</td> 
	<td> 
		<input type="hidden" name="permission_id[]" value="'+data[i].pid+'">'+data[i].pname+'
	</td> 
	<td> 
		<input type="hidden" name="pdescription[]" value="'+data[i].pdescription+'">'+data[i].pdescription+'
	</td> 
</tr>
userid
data[i].rid
data[i].rname
data[i].rdescription
data[i].pid
data[i].pname
data[i].pdescription

<tr class="selected" id="fila'+i+'"> <td> <button type="button" class="btn btn-warning" onclick="eliminar('+i+');">Eliminar</button> </td> <td> <input type="hidden" name="userid" value="userid">userid </td> <td> <input type="hidden" name="role_id[]" value="'+data[i].rid+'">'+data[i].rname+'</td> <td> <input type="hidden" name="rdescription[]" value="'+data[i].rdescription+'">'+data[i].rdescription+'</td> <td> <input type="hidden" name="permission_id[]" value="'+data[i].pid+'">'+data[i].pname+'</td> <td> <input type="hidden" name="pdescription[]" value="'+data[i].pdescription+'">'+data[i].pdescription+'</td> </tr>