<?php

namespace Sidecol;

use Illuminate\Database\Eloquent\Model;

use Caffeinated\Shinobi\Traits\ShinobiTrait;
use Illuminate\Auth\Authenticatable;


class eventos_osts extends Model
{
	use ShinobiTrait;

	/*
        El modelo es el encargdo de gestional las tablas de las bases de datos;
    */


        protected $table='eventos_osts';
        protected $primaryKey='ideventososts';
        public $timestamps=true;

        protected $filleble=[


        	'ideventososts',
        	'tipoevento',
        	'descripcion',
        	'soporte',
        	'estado_eo',
        	'idost',
        	'created_at',	
        	'updated_at',
        	'sujeto',


        ];
        protected $guarded =[

        ];
    }
