<?php

namespace Sidecol;

use Illuminate\Database\Eloquent\Model;
use Caffeinated\Shinobi\Traits\ShinobiTrait;
use Illuminate\Auth\Authenticatable;

class permiso_usuario extends Model
{
	use ShinobiTrait;

	/*
        El modelo es el encargdo de gestional las tablas de las bases de datos;
    */


        protected $table='permission_user';
        protected $primaryKey='id';
        public $timestamps=true;

        protected $filleble=[

        	'id',
        	'permission_id',
        	'user_id',
        	'created_at',
        	'updated_at',
        ];
        protected $guarded =[

        ];

    }

