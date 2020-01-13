<?php

namespace Sidecol;

use Illuminate\Database\Eloquent\Model;
use Caffeinated\Shinobi\Traits\ShinobiTrait;
use Illuminate\Auth\Authenticatable;

class productos_bodega extends Model
{
	use ShinobiTrait;

	/*
        El modelo es el encargdo de gestional las tablas de las bases de datos;
    */


        protected $table='tbl_productobodega';
        protected $primaryKey='idProductoBodega';
        public $timestamps=false;

        protected $filleble=[

        	'idProductoBodega',
        	'bodega_id',
        	'producto_id',
        	'cantidad',
        ];
        protected $guarded =[

        ];
    }

