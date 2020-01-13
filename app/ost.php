<?php

namespace Sidecol;

use Illuminate\Database\Eloquent\Model;
use Caffeinated\Shinobi\Traits\ShinobiTrait;
use Illuminate\Auth\Authenticatable;

class ost extends Model
{
	use ShinobiTrait;
	
	/*
        El modelo es el encargdo de gestional las tablas de las bases de datos;
    */
        

        protected $table='tbl_ost';
        protected $primaryKey='idost';
        public $timestamps=true;

        protected $filleble=[
        	
        	'idost',
        	'observaciones',
            'tipo_os',
        	'jornada',            
        	'estado_os',
        	'created_at',
        	'updated_at',
        ];
        protected $guarded =[
        	
        ];
    }



