<?php

namespace Sidecol;

use Illuminate\Database\Eloquent\Model;
use Caffeinated\Shinobi\Traits\ShinobiTrait;
use Illuminate\Auth\Authenticatable;

class organizacion extends Model
{
	use ShinobiTrait;
    
	/*
        El modelo es el encargdo de gestional las tablas de las bases de datos;
    */
	

    protected $table='tbl_organizacion';
    protected $primaryKey='idtbl_organizacion';
    public $timestamps=false;

    protected $filleble=[
      
        //'idtbl_organizacion',
        'nit',
    	'razonsocial',
        'image',
        'margen',
    	'estado',

    ];
    protected $guarded =[
    	
    ];
}
