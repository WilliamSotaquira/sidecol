<?php

namespace Sidecol;

use Illuminate\Database\Eloquent\Model;
use Caffeinated\Shinobi\Traits\ShinobiTrait;
use Illuminate\Auth\Authenticatable;

class marca extends Model
{

	use ShinobiTrait;

	/*
        El modelo es el encargdo de gestional las tablas de las bases de datos;
    */


        protected $table='tbl_marca';
        protected $primaryKey='idmarca';
        public $timestamps=true;

        protected $filleble=[


        	// 'idmarca',
        	'marca',
        	'tiempogarantia',
        	'image',
            // 'created_at',
            // 'updated_at',
        	
        ];
        protected $guarded =[

        ];
    }
