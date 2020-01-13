<?php

namespace Sidecol;

use Illuminate\Database\Eloquent\Model;
use Caffeinated\Shinobi\Traits\ShinobiTrait;
use Illuminate\Auth\Authenticatable;


class producto extends Model
{
	use ShinobiTrait;

	/*
        El modelo es el encargdo de gestional las tablas de las bases de datos;
    */


        protected $table='tbl_producto';
        protected $primaryKey='idproducto';
        public $timestamps=true;

        protected $filleble=[

        	// 'idproducto',
        	'referencia',
        	'articulo',
        	'estado',
            'subcatergoria_id',
            'marca_id',
        	'costoventa',
        	'costoanterior',
        	// 'created_at',
        	// 'updated_at',

        ];
        protected $guarded =[

        ];
    } 

   