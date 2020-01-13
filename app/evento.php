<?php

namespace Sidecol;

use Illuminate\Database\Eloquent\Model;
use Caffeinated\Shinobi\Traits\ShinobiTrait;
use Illuminate\Auth\Authenticatable;

class evento extends Model
{
	use ShinobiTrait;

	/*
        El modelo es el encargdo de gestional las tablas de las bases de datos;
    */


        protected $table='tbl_evento';
        protected $primaryKey='idtbl_evento';
        public $timestamps=true;

        protected $filleble=[

         	// 'idtbl_evento',
        	'tipo_evento',
        	'descripcion',
        	'estado',
            // 'updated_at',
            // 'created_at',

        ];
        protected $guarded =[

        ];

    }
