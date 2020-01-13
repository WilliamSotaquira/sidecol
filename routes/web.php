	<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/welcome', function () {
	return view('welcome')->name('welcome');
});
Route::get('/preorden', 'HomeController@preorden')->name('preorden');
Route::post('preorden/guardar', 'HomeController@poguardar')->name('poguardar');
Route::get('/{id}/progreso', 'HomeController@progreso')->name('progreso');

Route::get('/', function () {
	return view('welcome');
});

Route::get('/logout','LogoutSesionController@EndSession')->name('EndSesion');

Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');


Route::middleware(['auth'])->group(function(){

//Rutas de Home

	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('/mantenimiento', 'HomeController@show')->name('mantenimiento');
	

	/* ---------------------------------------------------------------------------------------------------------------------------------- */
// Rutas del Administrador
	/* ---------------------------------------------------------------------------------------------------------------------------------- */
	

// Rutas de Organzaciones

		// Donde crear - guardar 
	Route::post('clientes/organizacion/store','OrganizacionController@store')->name('clientes.organizacion.store')
	->middleware('permission:organizacion.create');	

		// Donde visualiza el estado
	Route::get('clientes/organizacion','OrganizacionController@index')->name('clientes.organizacion.index')
	->middleware('permission:organizacion.index');

		// Donde ver el formulario de creacion
	Route::get('clientes/organizacion/create','OrganizacionController@create')->name('clientes.organizacion.create')
	->middleware('permission:organizacion.create');

		// Donde actualizar
	Route::put('clientes/organizacion/{role}','OrganizacionController@update')->name('clientes.organizacion.update')
	->middleware('permission:organizacion.edit');

		// Donde ver el detalle
	Route::get('clientes/organizacion/{role}','OrganizacionController@show')->name('clientes.organizacion.show')
	->middleware('permission:organizacion.show');

		// Donde eliminar
	Route::delete('clientes/organizacion/{role}','OrganizacionController@destroy')->name('clientes.organizacion.destroy')
	->middleware('permission:organizacion.destroy');

		// Donde ver el formulario de edicion
	Route::get('clientes/organizacion/{edit}/edit','OrganizacionController@edit')->name('clientes.organizacion.edit')
	->middleware('permission:organizacion.edit');


	/* ---------------------------------------------------------------------------------------------------------------------------------- */


// Rutas de Sedes

		// Donde crear - guardar 
	Route::post('clientes/sede/store','SedeController@store')->name('clientes.sede.store')
	->middleware('permission:sede.create');	

		// Donde visualiza el estado
	Route::get('clientes/sede','SedeController@index')->name('clientes.sede.index')
	->middleware('permission:sede.index');

		// Donde ver el formulario de creacion
	Route::get('clientes/sede/create','SedeController@create')->name('clientes.sede.create')
	->middleware('permission:sede.create');

		// Donde actualizar
	Route::put('clientes/sede/{role}','SedeController@update')->name('clientes.sede.update')
	->middleware('permission:sede.edit');

		// Donde ver el detalle
	Route::get('clientes/sede/{role}','SedeController@show')->name('clientes.sede.show')
	->middleware('permission:sede.show');

		// Donde eliminar
	Route::delete('clientes/sede/{role}','SedeController@destroy')->name('clientes.sede.destroy')
	->middleware('permission:sede.destroy');

		// Donde ver el formulario de edicion
	Route::get('clientes/sede/{edit}/edit','SedeController@edit')->name('clientes.sede.edit')
	->middleware('permission:sede.edit');


	/* ---------------------------------------------------------------------------------------------------------------------------------- */


// Rutas de Roles

		// Donde crear - guardar 
	Route::post('seguridad/roles/store','RolController@store')->name('seguridad.roles.store')
	->middleware('permission:roles.create');	

		// Donde visualiza el estado
	Route::get('seguridad/roles','RolController@index')->name('seguridad.roles.index')
	->middleware('permission:roles.index');

		// Donde ver el formulario de creacion
	Route::get('seguridad/roles/create','RolController@create')->name('seguridad.roles.create')
	->middleware('permission:roles.create');

		// Donde actualizar
	Route::put('seguridad/roles/{role}','RolController@update')->name('seguridad.roles.update')
	->middleware('permission:roles.edit');

		// Donde ver el detalle
	Route::get('seguridad/roles/{role}','RolController@show')->name('seguridad.roles.show')
	->middleware('permission:roles.show');

		// Donde eliminar
	Route::delete('seguridad/roles/{role}','RolController@destroy')->name('seguridad.roles.destroy')
	->middleware('permission:roles.destroy');

		// Donde ver el formulario de edicion
	Route::get('seguridad/roles/{edit}/edit','RolController@edit')->name('seguridad.roles.edit')
	->middleware('permission:roles.edit');


	/* ---------------------------------------------------------------------------------------------------------------------------------- */


// Rutas de usuarios

		// Donde crear - guardar 
	Route::post('seguridad/permisos/store','PermisoController@store')->name('seguridad.permisos.store')
	->middleware('permission:permisos.create');	

		// Donde visualiza el estado
	Route::get('seguridad/permisos','PermisoController@index')->name('seguridad.permisos.index')
	->middleware('permission:permisos.index');

		// Donde ver el formulario de creacion
	Route::get('seguridad/permisos/create','PermisoController@create')->name('seguridad.permisos.create')
	->middleware('permission:permisos.create');

		// Donde actualizar
	Route::put('seguridad/permisos/{role}','PermisoController@update')->name('seguridad.permisos.update')
	->middleware('permission:permisos.edit');

		// Donde ver el detalle
	Route::get('seguridad/permisos/{role}','PermisoController@show')->name('seguridad.permisos.show')
	->middleware('permission:permisos.show');

		// Donde eliminar
	Route::delete('seguridad/permisos/{role}','PermisoController@destroy')->name('seguridad.permisos.destroy')
	->middleware('permission:permisos.destroy');

		// Donde ver el formulario de edicion
	Route::get('seguridad/permisos/{edit}/edit','PermisoController@edit')->name('seguridad.permisos.edit')
	->middleware('permission:permisos.edit');


	/* ---------------------------------------------------------------------------------------------------------------------------------- */


// Rutas de usuarios

		// Donde crear - guardar 
	Route::post('users/users/store','UserController@store')->name('users.users.store')
	->middleware('permission:users.create');	

		// Donde visualiza el estado
	Route::get('users/users/index','UserController@index')->name('users.users.index')
	->middleware('permission:users.index');

		// Donde ver el formulario de creacion
	Route::get('users/users/create','UserController@create')->name('users.users.create')
	->middleware('permission:users.create');

		// Donde actualizar
	Route::put('users/users/{role}','UserController@update')->name('users.users.update')
	->middleware('permission:users.edit');

		// Donde ver el detalle
	Route::get('users/users/{role}','UserController@show')->name('users.users.show')
	->middleware('permission:users.show');

		// Donde eliminar
	Route::delete('users/users/{role}','UserController@destroy')->name('users.users.destroy')
	->middleware('permission:users.destroy');

		// Donde ver el formulario de edicion
	Route::get('users/users/{edit}/edit','UserController@edit')->name('users.users.edit')
	->middleware('permission:users.edit');


	/* ---------------------------------------------------------------------------------------------------------------------------------- */


// Rutas de rolusuario

		// Donde crear - guardar 
	Route::post('seguridad/roluser/store','RolUsuarioController@store')->name('seguridad.roluser.store')
	->middleware('permission:roluser.create');	

		// Donde visualiza el estado
	Route::get('seguridad/roluser','RolUsuarioController@index')->name('seguridad.roluser.index')
	->middleware('permission:roluser.index');

		// Donde ver el formulario de creacion
	Route::get('seguridad/roluser/create','RolUsuarioController@create')->name('seguridad.roluser.create')
	->middleware('permission:roluser.create');

		// Donde actualizar
	Route::put('seguridad/roluser/{role}','RolUsuarioController@update')->name('seguridad.roluser.update')
	->middleware('permission:roluser.edit');

		// Donde ver el detalle
	Route::get('seguridad/roluser/{role}','RolUsuarioController@show')->name('seguridad.roluser.show')
	->middleware('permission:roluser.show');

		// Donde eliminar
	Route::delete('seguridad/roluser/{role}','RolUsuarioController@destroy')->name('seguridad.roluser.destroy')
	->middleware('permission:roluser.destroy');

		// Donde ver el formulario de edicion
	Route::get('seguridad/roluser/{edit}/edit','RolUsuarioController@edit')->name('seguridad.roluser.edit')
	->middleware('permission:roluser.edit');


	/* ---------------------------------------------------------------------------------------------------------------------------------- */


// Rutas de permisosroles

		// Donde crear - guardar 
	Route::post('seguridad/permisosroles/store','PermisoRolController@store')->name('seguridad.permisosroles.store')
	->middleware('permission:permisosroles.create');	

		// Donde visualiza el estado
	Route::get('seguridad/permisosroles','PermisoRolController@index')->name('seguridad.permisosroles.index')
	->middleware('permission:permisosroles.index');

		// Donde ver el formulario de creacion
	Route::get('seguridad/permisosroles/create','PermisoRolController@create')->name('seguridad.permisosroles.create')
	->middleware('permission:permisosroles.create');

		// Donde actualizar
	Route::put('seguridad/permisosroles/{role}','PermisoRolController@update')->name('seguridad.permisosroles.update')
	->middleware('permission:permisosroles.edit');

		// Donde ver el detalle
	Route::get('seguridad/permisosroles/{role}','PermisoRolController@show')->name('seguridad.permisosroles.show')
	->middleware('permission:permisosroles.show');

		// Donde eliminar
	Route::delete('seguridad/permisosroles/{role}','PermisoRolController@destroy')->name('seguridad.permisosroles.destroy')
	->middleware('permission:permisosroles.destroy');

		// Donde ver el formulario de edicion
	Route::get('seguridad/permisosroles/{edit}/edit','PermisoRolController@edit')->name('seguridad.permisosroles.edit')
	->middleware('permission:permisosroles.edit');


	/* ---------------------------------------------------------------------------------------------------------------------------------- */



// Rutas de permisosusuarios

		// Donde crear - guardar 
	Route::post('seguridad/permisosusuarios/store','PermisoUsuarioController@store')->name('seguridad.permisosusuarios.store')
	->middleware('permission:permisosusuarios.create');	

		// Donde visualiza el estado
	Route::get('seguridad/permisosusuarios','PermisoUsuarioController@index')->name('seguridad.permisosusuarios.index')
	->middleware('permission:permisosusuarios.index');

		// Donde ver el formulario de creacion
	Route::get('seguridad/permisosusuarios/create','PermisoUsuarioController@create')->name('seguridad.permisosusuarios.create')
	->middleware('permission:permisosusuarios.create');

		// Donde actualizar
	Route::put('seguridad/permisosusuarios/{role}','PermisoUsuarioController@update')->name('seguridad.permisosusuarios.update')
	->middleware('permission:permisosusuarios.edit');

		// Donde ver el detalle
	Route::get('seguridad/permisosusuarios/{role}','PermisoUsuarioController@show')->name('seguridad.permisosusuarios.show')
	->middleware('permission:permisosusuarios.show');

		// Donde eliminar
	Route::delete('seguridad/permisosusuarios/{role}','PermisoUsuarioController@destroy')->name('seguridad.permisosusuarios.destroy')
	->middleware('permission:permisosusuarios.destroy');

		// Donde ver el formulario de edicion
	Route::get('seguridad/permisosusuarios/{edit}/edit','PermisoUsuarioController@edit')->name('seguridad.permisosusuarios.edit')
	->middleware('permission:permisosusuarios.edit');


	/* ---------------------------------------------------------------------------------------------------------------------------------- */



// Rutas de bodega

		// Donde crear - guardar 
	Route::post('productos/bodegas/store','BodegaController@store')->name('productos.bodegas.store')
	->middleware('permission:bodegas.create');	

		// Donde visualiza el estado
	Route::get('productos/bodegas','BodegaController@index')->name('productos.bodegas.index')
	->middleware('permission:bodegas.index');

		// Donde ver el formulario de creacion
	Route::get('productos/bodegas/create','BodegaController@create')->name('productos.bodegas.create')
	->middleware('permission:bodegas.create');

		// Donde actualizar
	Route::put('productos/bodegas/{role}','BodegaController@update')->name('productos.bodegas.update')
	->middleware('permission:bodegas.edit');

		// Donde ver el detalle
	Route::get('productos/bodegas/{role}','BodegaController@show')->name('productos.bodegas.show')
	->middleware('permission:bodegas.show');

		// Donde eliminar
	Route::delete('productos/bodegas/{role}','BodegaController@destroy')->name('productos.bodegas.destroy')
	->middleware('permission:bodegas.destroy');

		// Donde ver el formulario de edicion
	Route::get('productos/bodegas/{edit}/edit','BodegaController@edit')->name('productos.bodegas.edit')
	->middleware('permission:bodegas.edit');


	/* ---------------------------------------------------------------------------------------------------------------------------------- */




// Rutas de producto

		// Donde crear - guardar 
	Route::post('productos/productos/store','ProductoController@store')->name('productos.productos.store')
	->middleware('permission:productos.create');	

		// Donde visualiza el estado
	Route::get('productos/productos','ProductoController@index')->name('productos.productos.index')
	->middleware('permission:productos.index');

		// Donde ver el formulario de creacion
	Route::get('productos/productos/create','ProductoController@create')->name('productos.productos.create')
	->middleware('permission:productos.create');

		// Donde actualizar
	Route::put('productos/productos/{role}','ProductoController@update')->name('productos.productos.update')
	->middleware('permission:productos.edit');

		// Donde ver el detalle
	Route::get('productos/productos/{role}','ProductoController@show')->name('productos.productos.show')
	->middleware('permission:productos.show');

		// Donde eliminar
	Route::delete('productos/productos/{role}','ProductoController@destroy')->name('productos.productos.destroy')
	->middleware('permission:productos.destroy');

		// Donde ver el formulario de edicion
	Route::get('productos/productos/{edit}/edit','ProductoController@edit')->name('productos.productos.edit')
	->middleware('permission:productos.edit');


	/* ---------------------------------------------------------------------------------------------------------------------------------- */



// Rutas de Categoria

		// Donde crear - guardar 
	Route::post('productos/categorias/store','CategoriaController@store')->name('productos.categorias.store')
	->middleware('permission:categorias.create');	

		// Donde visualiza el estado
	Route::get('productos/categorias','CategoriaController@index')->name('productos.categorias.index')
	->middleware('permission:categorias.index');

		// Donde ver el formulario de creacion
	Route::get('productos/categorias/create','CategoriaController@create')->name('productos.categorias.create')
	->middleware('permission:categorias.create');

		// Donde actualizar
	Route::put('productos/categorias/{role}','CategoriaController@update')->name('productos.categorias.update')
	->middleware('permission:categorias.edit');

		// Donde ver el detalle
	Route::get('productos/categorias/{role}','CategoriaController@show')->name('productos.categorias.show')
	->middleware('permission:categorias.show');

		// Donde eliminar
	Route::delete('productos/categorias/{role}','CategoriaController@destroy')->name('productos.categorias.destroy')
	->middleware('permission:categorias.destroy');

		// Donde ver el formulario de edicion
	Route::get('productos/categorias/{edit}/edit','CategoriaController@edit')->name('productos.categorias.edit')
	->middleware('permission:categorias.edit');


	/* ---------------------------------------------------------------------------------------------------------------------------------- */


// Rutas de Marcas

		// Donde crear - guardar 
	Route::post('productos/marcas/store','MarcaController@store')->name('productos.marcas.store')
	->middleware('permission:marcas.create');	

		// Donde visualiza el estado
	Route::get('productos/marcas','MarcaController@index')->name('productos.marcas.index')
	->middleware('permission:marcas.index');

		// Donde ver el formulario de creacion
	Route::get('productos/marcas/create','MarcaController@create')->name('productos.marcas.create')
	->middleware('permission:marcas.create');

		// Donde actualizar
	Route::put('productos/marcas/{role}','MarcaController@update')->name('productos.marcas.update')
	->middleware('permission:marcas.edit');

		// Donde ver el detalle
	Route::get('productos/marcas/{role}','MarcaController@show')->name('productos.marcas.show')
	->middleware('permission:marcas.show');

		// Donde eliminar
	Route::delete('productos/marcas/{role}','MarcaController@destroy')->name('productos.marcas.destroy')
	->middleware('permission:marcas.destroy');

		// Donde ver el formulario de edicion
	Route::get('productos/marcas/{edit}/edit','MarcaController@edit')->name('productos.marcas.edit')
	->middleware('permission:marcas.edit');


	/* ---------------------------------------------------------------------------------------------------------------------------------- */



// Rutas de subcategorias

		// Donde crear - guardar 
	Route::post('productos/subcategorias/store','SubcategoriaController@store')->name('productos.subcategorias.store')
	->middleware('permission:subcategorias.create');	

		// Donde visualiza el estado
	Route::get('productos/subcategorias','SubcategoriaController@index')->name('productos.subcategorias.index')
	->middleware('permission:subcategorias.index');

		// Donde ver el formulario de creacion
	Route::get('productos/subcategorias/create','SubcategoriaController@create')->name('productos.subcategorias.create')
	->middleware('permission:subcategorias.create');

		// Donde actualizar
	Route::put('productos/subcategorias/{role}','SubcategoriaController@update')->name('productos.subcategorias.update')
	->middleware('permission:subcategorias.edit');

		// Donde ver el detalle
	Route::get('productos/subcategorias/{role}','SubcategoriaController@show')->name('productos.subcategorias.show')
	->middleware('permission:subcategorias.show');

		// Donde eliminar
	Route::delete('productos/subcategorias/{role}','SubcategoriaController@destroy')->name('productos.subcategorias.destroy')
	->middleware('permission:subcategorias.destroy');

		// Donde ver el formulario de edicion
	Route::get('productos/subcategorias/{edit}/edit','SubcategoriaController@edit')->name('productos.subcategorias.edit')
	->middleware('permission:subcategorias.edit');


	/* ---------------------------------------------------------------------------------------------------------------------------------- */

// Rutas de MarcaSubcategorias

		// Donde crear - guardar 
	Route::post('productos/marcasubcategorias/store','MarcaSubcategoriaController@store')->name('productos.marcasubcategorias.store')
	->middleware('permission:marcasubcategorias.create');	

		// Donde visualiza el estado
	Route::get('productos/marcasubcategorias','MarcaSubcategoriaController@index')->name('productos.marcasubcategorias.index')
	->middleware('permission:marcasubcategorias.index');

		// Donde ver el formulario de creacion
	Route::get('productos/marcasubcategorias/create','MarcaSubcategoriaController@create')->name('productos.marcasubcategorias.create')
	->middleware('permission:marcasubcategorias.create');

		// Donde actualizar
	Route::put('productos/marcasubcategorias/{role}','MarcaSubcategoriaController@update')->name('productos.marcasubcategorias.update')
	->middleware('permission:marcasubcategorias.edit');

		// Donde ver el detalle
	Route::get('productos/marcasubcategorias/{role}','MarcaSubcategoriaController@show')->name('productos.marcasubcategorias.show')
	->middleware('permission:marcasubcategorias.show');

		// Donde eliminar
	Route::delete('productos/marcasubcategorias/{role}','MarcaSubcategoriaController@destroy')->name('productos.marcasubcategorias.destroy')
	->middleware('permission:marcasubcategorias.destroy');

		// Donde ver el formulario de edicion
	Route::get('productos/marcasubcategorias/{edit}/edit','MarcaSubcategoriaController@edit')->name('productos.marcasubcategorias.edit')
	->middleware('permission:marcasubcategorias.edit');


	/* ---------------------------------------------------------------------------------------------------------------------------------- */

// Rutas de productosbodegas

		// Donde crear - guardar 
	Route::post('productos/productosbodegas/store','ProductosBodegaController@store')->name('productos.productosbodegas.store')
	->middleware('permission:productosbodegas.create');	

		// Donde visualiza el estado
	Route::get('productos/productosbodegas','ProductosBodegaController@index')->name('productos.productosbodegas.index')
	->middleware('permission:productosbodegas.index');

		// Donde ver el formulario de creacion
	Route::get('productos/productosbodegas/create','ProductosBodegaController@create')->name('productos.productosbodegas.create')
	->middleware('permission:productosbodegas.create');

		// Donde actualizar
	Route::put('productos/productosbodegas/{role}','ProductosBodegaController@update')->name('productos.productosbodegas.update')
	->middleware('permission:productosbodegas.edit');

		// Donde ver el detalle
	Route::get('productos/productosbodegas/{role}','ProductosBodegaController@show')->name('productos.productosbodegas.show')
	->middleware('permission:productosbodegas.show');

		// Donde eliminar
	Route::delete('productos/productosbodegas/{role}','ProductosBodegaController@destroy')->name('productos.productosbodegas.destroy')
	->middleware('permission:productosbodegas.destroy');

		// Donde ver el formulario de edicion
	Route::get('productos/productosbodegas/{edit}/edit','ProductosBodegaController@edit')->name('productos.productosbodegas.edit')
	->middleware('permission:productosbodegas.edit');


	/* ---------------------------------------------------------------------------------------------------------------------------------- */

// Rutas de Ordenes de Servicio Tecnico

		// Donde crear - guardar 
	Route::post('servicios/osts/store','OstController@store')->name('servicios.osts.store')
	->middleware('permission:osts.create');	

		// Donde visualiza el estado
	Route::get('servicios/osts','OstController@index')->name('servicios.osts.index')
	->middleware('permission:osts.index');

		// Donde ver el formulario de creacion
	Route::get('servicios/osts/create','OstController@create')->name('servicios.osts.create')
	->middleware('permission:osts.create');

		// Donde actualizar
	Route::put('servicios/osts/{role}/update','OstController@update')->name('servicios.osts.update')
	->middleware('permission:osts.edit');

		// Donde ver el detalle
	Route::get('servicios/osts/{role}/show','OstController@show')->name('servicios.osts.show')
	->middleware('permission:osts.show');

		// Donde eliminar
	Route::delete('servicios/osts/{role}','OstController@destroy')->name('servicios.osts.destroy')
	->middleware('permission:osts.destroy');

		// Donde ver el formulario de edicion
	Route::get('servicios/osts/{edit}/edit','OstController@edit')->name('servicios.osts.edit')
	->middleware('permission:osts.edit');

		// Donde ver el formulario de creacion
	Route::get('servicios/osts/{edit}/subcreate','OstController@subcreate')->name('servicios.osts.subcreate')
	->middleware('permission:osts.edit');

		// Donde actualizar
	Route::put('servicios/osts/{role}/subupdate','OstController@subupdate')->name('servicios.osts.subupdate')
	->middleware('permission:osts.edit');




	/* ---------------------------------------------------------------------------------------------------------------------------------- */

// Rutas de Asignacion de Ordenes de Servicio Tecnico

		// Donde crear - guardar 
	Route::post('servicios/usersosts/store','UsersOstController@store')->name('servicios.usersosts.store')
	->middleware('permission:usersosts.create');	

		// Donde visualiza el estado
	Route::get('servicios/usersosts','UsersOstController@index')->name('servicios.usersosts.index')
	->middleware('permission:usersosts.index');

		// Donde ver el formulario de creacion
	Route::get('servicios/usersosts/create/{id}','UsersOstController@create')->name('servicios.usersosts.create')
	->middleware('permission:usersosts.create');

		// Donde actualizar
	Route::put('servicios/usersosts/{role}','UsersOstController@update')->name('servicios.usersosts.update')
	->middleware('permission:usersosts.edit');

		// Donde ver el detalle
	Route::get('servicios/usersosts/{role}','UsersOstController@show')->name('servicios.usersosts.show')
	->middleware('permission:usersosts.show');

		// Donde eliminar
	Route::delete('servicios/usersosts/{role}','UsersOstController@destroy')->name('servicios.usersosts.destroy')
	->middleware('permission:usersosts.destroy');

		// Donde ver el formulario de edicion
	Route::get('servicios/usersosts/{edit}/edit','UsersOstController@edit')->name('servicios.usersosts.edit')
	->middleware('permission:usersosts.edit');


	/* ---------------------------------------------------------------------------------------------------------------------------------- */


// Rutas de Asignacion de Usuario a Organizacion

		// Donde crear - guardar 
	Route::post('users/orgsusers/store','OrgUserController@store')->name('users.orgsusers.store')
	->middleware('permission:orgsusers.create');	

		// Donde visualiza el estado
	Route::get('users/orgsusers','OrgUserController@index')->name('users.orgsusers.index')
	->middleware('permission:orgsusers.index');

		// Donde ver el formulario de creacion
	Route::get('users/orgsusers/create','OrgUserController@create')->name('users.orgsusers.create')
	->middleware('permission:orgsusers.create');

		// Donde actualizar
	Route::put('users/orgsusers/{role}','OrgUserController@update')->name('users.orgsusers.update')
	->middleware('permission:orgsusers.edit');

		// Donde ver el detalle
	Route::get('users/orgsusers/{role}','OrgUserController@show')->name('users.orgsusers.show')
	->middleware('permission:orgsusers.show');

		// Donde eliminar
	Route::delete('users/orgsusers/{role}','OrgUserController@destroy')->name('users.orgsusers.destroy')
	->middleware('permission:orgsusers.destroy');

		// Donde ver el formulario de edicion
	Route::get('users/orgsusers/{edit}/edit','OrgUserController@edit')->name('users.orgsusers.edit')
	->middleware('permission:orgsusers.edit');


	/* ---------------------------------------------------------------------------------------------------------------------------------- */


// Rutas menu de Tecnicos Ost

		// Donde crear - guardar 
	Route::post('servicios/tecnicos/osts/{id}','TecnicosController@ostsstore')->name('servicios.tecnicos.osts.store')
	->middleware('permission:tecnicos.create');	

		// Donde visualiza el estado
	Route::get('servicios/tecnicos/osts','TecnicosController@ostsindex')->name('servicios.tecnicos.osts.index')
	->middleware('permission:tecnicos.index');

		// Donde ver el formulario de creacion
	Route::get('servicios/tecnicos/osts/{role}/create','TecnicosController@ostscreate')->name('servicios.tecnicos.osts.create')
	->middleware('permission:tecnicos.create');

		// Donde actualizar
	Route::put('servicios/tecnicos/osts/{role}','TecnicosController@ostsupdate')->name('servicios.tecnicos.osts.update')
	->middleware('permission:tecnicos.edit');

		// Donde ver el detalle
	Route::get('servicios/tecnicos/osts/{role}','TecnicosController@ostsshow')->name('servicios.tecnicos.osts.show')
	->middleware('permission:tecnicos.show');

		// Donde eliminar
	Route::delete('servicios/tecnicos/osts/{role}','TecnicosController@ostsdestroy')->name('servicios.tecnicos.osts.destroy')
	->middleware('permission:tecnicos.destroy');

		// Donde ver el formulario de edicion
	Route::get('servicios/tecnicos/osts/{edit}/edit','TecnicosController@ostsedit')->name('servicios.tecnicos.osts.edit')
	->middleware('permission:tecnicos.edit');

// Rutas menu de Tecnicos Ost

		// Donde crear - guardar 
	Route::post('servicios/tecnicos/eventos/{id}','TecnicosController@eventosstore')->name('servicios.tecnicos.eventos.store')
	->middleware('permission:tecnicos.create');	

		// Donde visualiza el estado
	Route::get('servicios/tecnicos/eventos','TecnicosController@eventosindex')->name('servicios.tecnicos.eventos.index')
	->middleware('permission:tecnicos.index');

		// Donde ver el formulario de creacion
	Route::get('servicios/tecnicos/eventos/{role}/create','TecnicosController@eventoscreate')->name('servicios.tecnicos.eventos.create')
	->middleware('permission:tecnicos.create');

		// Donde actualizar
	Route::put('servicios/tecnicos/eventos/{role}','TecnicosController@eventosupdate')->name('servicios.tecnicos.eventos.update')
	->middleware('permission:tecnicos.edit');

		// Donde ver el detalle
	Route::get('servicios/tecnicos/eventos/{role}','TecnicosController@eventosshow')->name('servicios.tecnicos.eventos.show')
	->middleware('permission:tecnicos.show');

		// Donde eliminar
	Route::delete('servicios/tecnicos/eventos/{role}','TecnicosController@eventosdestroy')->name('servicios.tecnicos.eventos.destroy')
	->middleware('permission:tecnicos.destroy');

		// Donde ver el formulario de edicion
	Route::get('servicios/tecnicos/eventos/{edit}/edit','TecnicosController@eventosedit')->name('servicios.tecnicos.eventos.edit')
	->middleware('permission:tecnicos.edit');


	/* ---------------------------------------------------------------------------------------------------------------------------------- */


// Rutas menu de talleres osts

		// Donde crear - guardar 
	Route::post('servicios/talleres/osts/{id}','TalleresController@store')->name('servicios.talleres.osts.store')
	->middleware('permission:talleres.create');	

		// Donde visualiza el estado
	Route::get('servicios/talleres/osts','TalleresController@index')->name('servicios.talleres.osts.index')
	->middleware('permission:talleres.index');

		// Donde ver el formulario de creacion
	Route::get('servicios/talleres/osts/{role}/create','TalleresController@create')->name('servicios.talleres.osts.create')
	->middleware('permission:talleres.create');

		// Donde actualizar
	Route::put('servicios/talleres/osts/{role}','TalleresController@update')->name('servicios.talleres.osts.update')
	->middleware('permission:talleres.edit'); 

		// Donde ver el detalle
	Route::get('servicios/talleres/osts/{role}/show','TalleresController@show')->name('servicios.talleres.osts.show')
	->middleware('permission:talleres.show');

		// Donde eliminar
	Route::delete('servicios/talleres/osts/update/{role}','TalleresController@destroy')->name('servicios.talleres.osts.destroy')
	->middleware('permission:talleres.destroy');

		// Donde ver el formulario de edicion
	Route::get('servicios/talleres/osts/{edit}/edit','TalleresController@edit')->name('servicios.talleres.osts.edit')
	->middleware('permission:talleres.edit');

		// Visualiza los datos que se van a editar de la asignacion de orden se servicio (Reasignar)
	Route::get('servicios/talleres/osts/{edit}/edit_uo','TalleresController@edit_uo')->name('servicios.talleres.osts.edit_uo')
	->middleware('permission:talleres.edit');

		// Ruta de actualizacion de las asignacines desde la vista de taller
	Route::put('servicios/talleres/osts/update_uo/{role}','TalleresController@update_uo')->name('servicios.talleres.osts.update_uo')
	->middleware('permission:talleres.edit');


// Rutas menu de talleres eventos

		// Donde crear - guardar 
	Route::post('servicios/talleres/eventos/store','TalleresController@eventosstore')->name('servicios.talleres.eventos.store')
	->middleware('permission:talleres.create');	

		// Donde visualiza el estado
	Route::get('servicios/talleres/eventos','TalleresController@eventosindex')->name('servicios.talleres.eventos.index')
	->middleware('permission:talleres.index');

		// Donde ver el formulario de creacion
	Route::get('servicios/talleres/eventos/{role}/create','TalleresController@eventoscreate')->name('servicios.talleres.eventos.create')
	->middleware('permission:talleres.create');

		// Donde actualizar
	Route::put('servicios/talleres/{role}','TalleresController@update')->name('servicios.talleres.eventos.update')
	->middleware('permission:talleres.edit');

		// Donde ver el detalle
	Route::get('servicios/talleres/{role}/show','TalleresController@show')->name('servicios.talleres.eventos.show')
	->middleware('permission:talleres.show');

		// Donde eliminar
	Route::delete('servicios/talleres/eventos/{role}','TalleresController@destroy')->name('servicios.talleres.eventos.destroy')
	->middleware('permission:talleres.destroy');

		// Donde ver el formulario de edicion
	Route::get('servicios/talleres/{edit}/edit','TalleresController@edit')->name('servicios.talleres.eventos.edit')
	->middleware('permission:talleres.edit');


// Rutas menu de talleres tecnicos

			// Donde visualiza el estado
	Route::get('servicios/talleres/tecnicos/index','TalleresController@tecnicosindex')->name('servicios.talleres.tecnicos.index')
	->middleware('permission:talleres.index');

			// Donde ver el formulario de creacion
	Route::get('servicios/talleres/tecnicos/create','TalleresController@tecnicoscreate')->name('servicios.talleres.tecnicos.create')
	->middleware('permission:talleres.create');

		// Donde crear - guardar 
	Route::post('servicios/talleres/tecnicos/store','TalleresController@tecnicosstore')->name('servicios.talleres.tecnicos.store')
	->middleware('permission:talleres.create');	

			// Donde ver el detalle
	Route::get('servicios/talleres/tecnicos/{role}/show','TalleresController@tecnicosshow')->name('servicios.talleres.tecnicos.show')
	->middleware('permission:talleres.show');

		// Donde eliminar
	Route::delete('servicios/talleres/tecnicos/{role}','TalleresController@tecnicosdestroy')->name('servicios.talleres.tecnicos.destroy')
	->middleware('permission:talleres.destroy');

	/* ---------------------------------------------------------------------------------------------------------------------------------- */

// Rutas menu de eventos de ost


		// Donde crear - guardar 
	Route::post('servicios/eventososts/store','EventosOstsController@store')->name('servicios.eventososts.store')
	->middleware('permission:eventososts.create');	

		// Donde visualiza el estado
	Route::get('servicios/eventososts','EventosOstsController@index')->name('servicios.eventososts.index')
	->middleware('permission:eventososts.index');

		// Donde ver el formulario de creacion
	Route::get('servicios/eventososts/create/{id}','EventosOstsController@create')->name('servicios.eventososts.create')
	->middleware('permission:eventososts.create');

	// 	// Donde actualizar
	// Route::put('servicios/eventososts/{role}','EventosOstsController@update')->name('servicios.eventososts.update')
	// ->middleware('permission:eventososts.edit');

	// 	// Donde ver el detalle
	// Route::get('servicios/eventososts/{role}','EventosOstsController@show')->name('servicios.eventososts.show')
	// ->middleware('permission:eventososts.show');

	// 	// Donde eliminar
	// Route::delete('servicios/eventososts/{role}','EventosOstsController@destroy')->name('servicios.eventososts.destroy')
	// ->middleware('permission:eventososts.destroy');

	// 	// Donde ver el formulario de edicion
	// Route::get('servicios/eventososts/{edit}/edit','EventosOstsController@edit')->name('servicios.eventososts.edit')
	// ->middleware('permission:eventososts.edit');

		// Aceptar ver el servicio
	Route::get('servicios/eventososts/{id}/aceptar','EventosOstsController@aceptar')->name('servicios.eventososts.aceptar')
	->middleware('permission:eventososts.show');

		// Aceptar ver el servicio
	Route::get('servicios/eventososts/ratificar/{id}','EventosOstsController@ratificar')->name('servicios.eventososts.ratificar')
	->middleware('permission:eventososts.show');

		// Aceptar  Cliente OST
	Route::get('servicios/eventososts/{id}/aceptarcliente','EventosOstsController@aceptarcliente')->name('servicios.eventososts.aceptarcliente')
	->middleware('permission:eventososts.show'); 

		//  Donde actualizar
	Route::put('servicios/eventososts/{role}/update','EventosOstsController@updateservice')->name('servicios.eventososts.update')
	->middleware('permission:eventososts.edit');

		//  Donde Rechazar
	Route::get('servicios/eventososts/rechazar/{id}','EventosOstsController@rechazar')->name('servicios.eventososts.rechazar')
	->middleware('permission:eventososts.destroy');


	/* ---------------------------------------------------------------------------------------------------------------------------------- */
// Rutas de impresion

	Route::get('impresion/osts/{id}/imprimir','PrintController@ImprimirOst')->name('impresion.osts.imprimir')
	->middleware('permission:print.access'); 

	/* ---------------------------------------------------------------------------------------------------------------------------------- */


	Route::get('sendemail', function () {

		$data = array(
			'name' => "Curso Laravel",
		);

		Mail::send('emails.welcome', $data, function ($message) {

			$message->from('serviciotecnico@gmail.com', 'Curso Laravel');

			$message->to('serviciotecnico@gmail.com')->subject('test email Curso Laravel');

		});

		return "Tú email ha sido enviado correctamente";

	})
	->middleware('permission:mail.send');



	/* ---------------------------------------------------------------------------------------------------------------------------------- */


});



