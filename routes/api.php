<?php 


//Administrador 
Route::get('sidecol/{id}/role','PermisoUsuarioController@byRole')->middleware('permission:servicio.menu');
Route::get('sidecol/{id}/cargarRole','ApiController@cargarRole')->middleware('permission:servicio.menu');
Route::get('sidecol/{id}/PorAsignar','ApiController@PorAsignar')->middleware('permission:servicio.menu');

//comprobar cantidad de servicios
Route::get('sidecol/comprobar/','ApiController@comprobar')->middleware('permission:usersosts.create');
Route::get('sidecol/cargardatos/','ApiController@cargardatos')->middleware('permission:usersosts.create');
Route::get('sidecol/tipousuario/','ApiController@tipousuario')->middleware('permission:usersosts.edit');
Route::get('sidecol/contacto/','ApiController@contacto')->middleware('permission:usersosts.edit');






