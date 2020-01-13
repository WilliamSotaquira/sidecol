<?php

namespace Sidecol;

use Illuminate\Database\Eloquent\Model;
use Caffeinated\Shinobi\Traits\ShinobiTrait;
use Illuminate\Auth\Authenticatable;

class sede extends Model
{

	use ShinobiTrait;
    // idtbl_sede
    // nombresede
    // email
    // direccion
    // telefono
    // estado
    // fk_organizacion
    // fk_ciudad


    protected $table='tbl_sede';
    protected $primaryKey='idtbl_sede';
    public $timestamps=false;

    protected $filleble=[
      
	'nombresede',
	'email',
	'direccion',
	'telefono',
	'estado',
    'fk_organizacion',
    'fk_ciudad',


    ];
    protected $guarded =[
    	
    ];


}
