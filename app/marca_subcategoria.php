<?php

namespace Sidecol;

use Illuminate\Database\Eloquent\Model;
use Caffeinated\Shinobi\Traits\ShinobiTrait;
use Illuminate\Auth\Authenticatable;




class marca_subcategoria extends Model
{
	use ShinobiTrait;

	/*
        El modelo es el encargdo de gestional las tablas de las bases de datos;
    */


        protected $table='tbl_marcasubcategoria';
        protected $primaryKey='idmarcasubcategoria';
        public $timestamps=true;

        protected $filleble=[

        	'idmarcasubcategoria',
        	'marca_id',
        	'subcategoria_id',
        	'created_at',
        	'updated_at',
        ];
        protected $guarded =[

        ];
}
