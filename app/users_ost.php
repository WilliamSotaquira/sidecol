<?php

namespace Sidecol;

use Illuminate\Database\Eloquent\Model;
use Caffeinated\Shinobi\Traits\ShinobiTrait;
use Illuminate\Auth\Authenticatable;


class users_ost extends Model
{
	use ShinobiTrait;

	/*
        El modelo es el encargdo de gestional las tablas de las bases de datos;
    */


        protected $table='users_ost';
        protected $primaryKey='idusers_ost';
        public $timestamps=true;

        protected $filleble=[


        	'idusers_ost',
        	'users_id',
        	'ost_id',
        	'tipo',
        	'fecha_asg',
        	'estado',
        	'created_at',
        	'updated_at',


        ];
        protected $guarded =[

        ];
    }
