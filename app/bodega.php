<?php

namespace Sidecol;

use Illuminate\Database\Eloquent\Model;
use Caffeinated\Shinobi\Traits\ShinobiTrait;
use Illuminate\Auth\Authenticatable;

class bodega extends Model
{
    use ShinobiTrait;

	/*
        El modelo es el encargdo de gestional las tablas de las bases de datos;
    */


        protected $table='tbl_bodega';
        protected $primaryKey='idBodega';
        public $timestamps=true;

        protected $filleble=[

         	// 'idBodega',
         	'TipoBodega',	
         	'Descripcion',
         	'Estado',
         	// 'created_at',
         	// 'updated_at',


        ];
        protected $guarded =[

        ];
}
  