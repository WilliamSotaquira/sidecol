<?php

namespace Sidecol;

use Illuminate\Database\Eloquent\Model;
use Caffeinated\Shinobi\Traits\ShinobiTrait;
use Illuminate\Auth\Authenticatable;


class org_user extends Model
{
	use ShinobiTrait;

	/*
        El modelo es el encargdo de gestional las tablas de las bases de datos;
    */


        protected $table='organizacion_users';
        protected $primaryKey='id';
        public $timestamps=true;

        protected $filleble=[

        	'id',
        	'organizacion_id',
        	'users_id',
        	'estado',
        	'created_at',
        	'updated_at',
        ];
        protected $guarded =[

        ];

    }
