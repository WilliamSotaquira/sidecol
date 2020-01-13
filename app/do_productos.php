<?php

namespace Sidecol;

use Illuminate\Database\Eloquent\Model;
use Caffeinated\Shinobi\Traits\ShinobiTrait;
use Illuminate\Auth\Authenticatable;

class do_productos extends Model
{
	use ShinobiTrait;

	protected $table='do_productos';
	protected $primaryKey='iddo_productos';
	public $timestamps=false;

	protected $filleble=[

		'detalleost_id',
		'producto_id',

	];
	protected $guarded =[

	];
}
