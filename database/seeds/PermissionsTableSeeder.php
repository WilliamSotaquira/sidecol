jd<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

//Permisos de modelo de usuarios
        Permission::create
        ([
        	'name'			=>'Navegar usuarios',
        	'slug'			=>'users.index',
        	'description'	=>'Lista y navega todos los usuarios del sistema',
        ]);

        Permission::create
        ([
        	'name'			=>'Ver detalle de usuarios',
        	'slug'			=>'users.show',
        	'description'	=>'Visualiza los detalles de los usuarios del sistema',
        ]);

        Permission::create
        ([
        	'name'			=>'Edición de usuarios',
        	'slug'			=>'users.edit',
        	'description'	=>'Edita cualquier datos de usuarios del sistema',
        ]);

        Permission::create
        ([
        	'name'			=>'Eliminar usuarios',
        	'slug'			=>'users.destroy',
        	'description'	=>'Elinina a los usuarios del sistema',
        ]);


//Permisos de modelo de Roles
        Permission::create
        ([
        	'name'			=>'Navegar roles',
        	'slug'			=>'roles.index',
        	'description'	=>'Lista y navega todos los roles del sistema',
        ]);

        Permission::create
        ([
        	'name'			=>'Ver detalle de roles',
        	'slug'			=>'roles.show',
        	'description'	=>'Visualiza los detalles de los roles del sistema',
        ]);

        Permission::create
        ([
        	'name'			=>'Creación de roles',
        	'slug'			=>'roles.create',
        	'description'	=>'Edita cualquier datos de roles del sistema',
        ]);

        Permission::create
        ([
        	'name'			=>'Edición de roles',
        	'slug'			=>'roles.edit',
        	'description'	=>'Edita cualquier datos de roles del sistema',
        ]);

        Permission::create
        ([
        	'name'			=>'Eliminar roles',
        	'slug'			=>'roles.destroy',
        	'description'	=>'Elinina a los roles del sistema',
        ]);

//Permisos de modelo de organizacion
        Permission::create
        ([
        	'name'			=>'Navegar organizacion',
        	'slug'			=>'organizacion.index',
        	'description'	=>'Lista y navega todos los organizacion del sistema',
        ]);

        Permission::create
        ([
        	'name'			=>'Ver detalle de organizacion',
        	'slug'			=>'organizacion.show',
        	'description'	=>'Visualiza los detalles de los organizacion del sistema',
        ]);

        Permission::create
        ([
        	'name'			=>'Creación de organizacion',
        	'slug'			=>'organizacion.create',
        	'description'	=>'Edita cualquier datos de organizacion del sistema',
        ]);

        Permission::create
        ([
        	'name'			=>'Edición de organizacion',
        	'slug'			=>'organizacion.edit',
        	'description'	=>'Edita cualquier datos de organizacion del sistema',
        ]);

        Permission::create
        ([
        	'name'			=>'Eliminar organizacion',
        	'slug'			=>'organizacion.destroy',
        	'description'	=>'Elinina a los organizacion del sistema',
        ]);

//Permisos de modelo de sedes
        Permission::create
        ([
        	'name'			=>'Navegar sedes',
        	'slug'			=>'sedes.index',
        	'description'	=>'Lista y navega todos los sedes del sistema',
        ]);

        Permission::create
        ([
        	'name'			=>'Ver detalle de sedes',
        	'slug'			=>'sedes.show',
        	'description'	=>'Visualiza los detalles de los sedes del sistema',
        ]);

        Permission::create
        ([
        	'name'			=>'Creación de sedes',
        	'slug'			=>'sedes.create',
        	'description'	=>'Edita cualquier datos de sedes del sistema',
        ]);

        Permission::create
        ([
        	'name'			=>'Edición de sedes',
        	'slug'			=>'sedes.edit',
        	'description'	=>'Edita cualquier datos de sedes del sistema',
        ]);

        Permission::create
        ([
        	'name'			=>'Eliminar sedes',
        	'slug'			=>'sedes.destroy',
        	'description'	=>'Elinina a los sedes del sistema',
        ]);
//Permisos de modelo de pqrs
        Permission::create
        ([
        	'name'			=>'Navegar pqrs',
        	'slug'			=>'pqrs.index',
        	'description'	=>'Lista y navega todos los pqrs del sistema',
        ]);

        Permission::create
        ([
        	'name'			=>'Ver detalle de pqrs',
        	'slug'			=>'pqrs.show',
        	'description'	=>'Visualiza los detalles de los pqrs del sistema',
        ]);

        Permission::create
        ([
        	'name'			=>'Creación de pqrs',
        	'slug'			=>'pqrs.create',
        	'description'	=>'Edita cualquier datos de pqrs del sistema',
        ]);

        Permission::create
        ([
        	'name'			=>'Edición de pqrs',
        	'slug'			=>'pqrs.edit',
        	'description'	=>'Edita cualquier datos de pqrs del sistema',
        ]);

        Permission::create
        ([
        	'name'			=>'Eliminar pqrs',
        	'slug'			=>'pqrs.destroy',
        	'description'	=>'Elinina a los pqrs del sistema',
        ]);

//Permisos de modelo de ost
        Permission::create
        ([
        	'name'			=>'Navegar ost',
        	'slug'			=>'ost.index',
        	'description'	=>'Lista y navega todos los ost del sistema',
        ]);

        Permission::create
        ([
        	'name'			=>'Ver detalle de ost',
        	'slug'			=>'ost.show',
        	'description'	=>'Visualiza los detalles de los ost del sistema',
        ]);

        Permission::create
        ([
        	'name'			=>'Creación de ost',
        	'slug'			=>'ost.create',
        	'description'	=>'Edita cualquier datos de ost del sistema',
        ]);

        Permission::create
        ([
        	'name'			=>'Edición de ost',
        	'slug'			=>'ost.edit',
        	'description'	=>'Edita cualquier datos de ost del sistema',
        ]);

        Permission::create
        ([
        	'name'			=>'Eliminar ost',
        	'slug'			=>'ost.destroy',
        	'description'	=>'Elinina a los ost del sistema',
        ]);

//Permisos de modelo de ciudad
        Permission::create
        ([
        	'name'			=>'Navegar ciudad',
        	'slug'			=>'ciudad.index',
        	'description'	=>'Lista y navega todos los ciudad del sistema',
        ]);

        Permission::create
        ([
        	'name'			=>'Ver detalle de ciudad',
        	'slug'			=>'ciudad.show',
        	'description'	=>'Visualiza los detalles de los ciudad del sistema',
        ]);

        Permission::create
        ([
        	'name'			=>'Creación de ciudad',
        	'slug'			=>'ciudad.create',
        	'description'	=>'Edita cualquier datos de ciudad del sistema',
        ]);

        Permission::create
        ([
        	'name'			=>'Edición de ciudad',
        	'slug'			=>'ciudad.edit',
        	'description'	=>'Edita cualquier datos de ciudad del sistema',
        ]);

        Permission::create
        ([
        	'name'			=>'Eliminar ciudad',
        	'slug'			=>'ciudad.destroy',
        	'description'	=>'Elinina a los ciudad del sistema',
        ]);

//Permisos de modelo de eventos
        Permission::create
        ([
        	'name'			=>'Navegar eventos',
        	'slug'			=>'eventos.index',
        	'description'	=>'Lista y navega todos los eventos del sistema',
        ]);

        Permission::create
        ([
        	'name'			=>'Ver detalle de eventos',
        	'slug'			=>'eventos.show',
        	'description'	=>'Visualiza los detalles de los eventos del sistema',
        ]);

        Permission::create
        ([
        	'name'			=>'Creación de eventos',
        	'slug'			=>'eventos.create',
        	'description'	=>'Edita cualquier datos de eventos del sistema',
        ]);

        Permission::create
        ([
        	'name'			=>'Edición de eventos',
        	'slug'			=>'eventos.edit',
        	'description'	=>'Edita cualquier datos de eventos del sistema',
        ]);

        Permission::create
        ([
        	'name'			=>'Eliminar eventos',
        	'slug'			=>'eventos.destroy',
        	'description'	=>'Elinina a los eventos del sistema',
        ]);

//Permisos de modelo de dt_ots
        Permission::create
        ([
        	'name'			=>'Navegar dt_ots',
        	'slug'			=>'dt_ots.index',
        	'description'	=>'Lista y navega todos los dt_ots del sistema',
        ]);

        Permission::create
        ([
        	'name'			=>'Ver detalle de dt_ots',
        	'slug'			=>'dt_ots.show',
        	'description'	=>'Visualiza los detalles de los dt_ots del sistema',
        ]);

        Permission::create
        ([
        	'name'			=>'Creación de dt_ots',
        	'slug'			=>'dt_ots.create',
        	'description'	=>'Edita cualquier datos de dt_ots del sistema',
        ]);

        Permission::create
        ([
        	'name'			=>'Edición de dt_ots',
        	'slug'			=>'dt_ots.edit',
        	'description'	=>'Edita cualquier datos de dt_ots del sistema',
        ]);

        Permission::create
        ([
        	'name'			=>'Eliminar dt_ots',
        	'slug'			=>'dt_ots.destroy',
        	'description'	=>'Elinina a los dt_ots del sistema',
        ]);

//Permisos de modelo de productos
        Permission::create
        ([
        	'name'			=>'Navegar productos',
        	'slug'			=>'productos.index',
        	'description'	=>'Lista y navega todos los productos del sistema',
        ]);

        Permission::create
        ([
        	'name'			=>'Ver detalle de productos',
        	'slug'			=>'productos.show',
        	'description'	=>'Visualiza los detalles de los productos del sistema',
        ]);

        Permission::create
        ([
        	'name'			=>'Creación de productos',
        	'slug'			=>'productos.create',
        	'description'	=>'Edita cualquier datos de productos del sistema',
        ]);

        Permission::create
        ([
        	'name'			=>'Edición de productos',
        	'slug'			=>'productos.edit',
        	'description'	=>'Edita cualquier datos de productos del sistema',
        ]);

        Permission::create
        ([
        	'name'			=>'Eliminar productos',
        	'slug'			=>'productos.destroy',
        	'description'	=>'Elinina a los productos del sistema',
        ]);

//Permisos de modelo de dt_productos
        Permission::create
        ([
        	'name'			=>'Navegar dt_productos',
        	'slug'			=>'dt_productos.index',
        	'description'	=>'Lista y navega todos los dt_productos del sistema',
        ]);

        Permission::create
        ([
        	'name'			=>'Ver detalle de dt_productos',
        	'slug'			=>'dt_productos.show',
        	'description'	=>'Visualiza los detalles de los dt_productos del sistema',
        ]);

        Permission::create
        ([
        	'name'			=>'Creación de dt_productos',
        	'slug'			=>'dt_productos.create',
        	'description'	=>'Edita cualquier datos de dt_productos del sistema',
        ]);

        Permission::create
        ([
        	'name'			=>'Edición de dt_productos',
        	'slug'			=>'dt_productos.edit',
        	'description'	=>'Edita cualquier datos de dt_productos del sistema',
        ]);

        Permission::create
        ([
        	'name'			=>'Eliminar dt_productos',
        	'slug'			=>'dt_productos.destroy',
        	'description'	=>'Elinina a los dt_productos del sistema',
        ]);

//Permisos de modelo de categoria
        Permission::create
        ([
        	'name'			=>'Navegar categoria',
        	'slug'			=>'categoria.index',
        	'description'	=>'Lista y navega todos los categoria del sistema',
        ]);

        Permission::create
        ([
        	'name'			=>'Ver detalle de categoria',
        	'slug'			=>'categoria.show',
        	'description'	=>'Visualiza los detalles de los categoria del sistema',
        ]);

        Permission::create
        ([
        	'name'			=>'Creación de categoria',
        	'slug'			=>'categoria.create',
        	'description'	=>'Edita cualquier datos de categoria del sistema',
        ]);

        Permission::create
        ([
        	'name'			=>'Edición de categoria',
        	'slug'			=>'categoria.edit',
        	'description'	=>'Edita cualquier datos de categoria del sistema',
        ]);

        Permission::create
        ([
        	'name'			=>'Eliminar categoria',
        	'slug'			=>'categoria.destroy',
        	'description'	=>'Elinina a los categoria del sistema',
        ]);

//Permisos de modelo de subcategoria
        Permission::create
        ([
        	'name'			=>'Navegar subcategoria',
        	'slug'			=>'subcategoria.index',
        	'description'	=>'Lista y navega todos los subcategoria del sistema',
        ]);

        Permission::create
        ([
        	'name'			=>'Ver detalle de subcategoria',
        	'slug'			=>'subcategoria.show',
        	'description'	=>'Visualiza los detalles de los subcategoria del sistema',
        ]);

        Permission::create
        ([
        	'name'			=>'Creación de subcategoria',
        	'slug'			=>'subcategoria.create',
        	'description'	=>'Edita cualquier datos de subcategoria del sistema',
        ]);

        Permission::create
        ([
        	'name'			=>'Edición de subcategoria',
        	'slug'			=>'subcategoria.edit',
        	'description'	=>'Edita cualquier datos de subcategoria del sistema',
        ]);

        Permission::create
        ([
        	'name'			=>'Eliminar subcategoria',
        	'slug'			=>'subcategoria.destroy',
        	'description'	=>'Elinina a los subcategoria del sistema',
        ]);

//Permisos de modelo de marca
        Permission::create
        ([
        	'name'			=>'Navegar marca',
        	'slug'			=>'marca.index',
        	'description'	=>'Lista y navega todos los marca del sistema',
        ]);

        Permission::create
        ([
        	'name'			=>'Ver detalle de marca',
        	'slug'			=>'marca.show',
        	'description'	=>'Visualiza los detalles de los marca del sistema',
        ]);

        Permission::create
        ([
        	'name'			=>'Creación de marca',
        	'slug'			=>'marca.create',
        	'description'	=>'Edita cualquier datos de marca del sistema',
        ]);

        Permission::create
        ([
        	'name'			=>'Edición de marca',
        	'slug'			=>'marca.edit',
        	'description'	=>'Edita cualquier datos de marca del sistema',
        ]);

        Permission::create
        ([
        	'name'			=>'Eliminar marca',
        	'slug'			=>'marca.destroy',
        	'description'	=>'Elinina a los marca del sistema',
        ]);





    }
}
