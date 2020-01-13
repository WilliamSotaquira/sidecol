<?php

namespace Sidecol;

use Illuminate\Database\Eloquent\Model;
use Caffeinated\Shinobi\Traits\ShinobiTrait;
use Illuminate\Auth\Authenticatable;

// idsubcategoria	subcategoria	estado	categoria_id	created_at	updated_at

class subcategoria extends Model
{
	use ShinobiTrait;

	protected $table='tbl_subcategoria';
	protected $primaryKey='idsubcategoria';
	public $timestamps=true;

	protected $filleble=[

		'idsubcategoria',
		'subcategoria',
		'estado',
		'categoria_id',
		'created_at',
		'updated_at',
		
	];
	protected $guarded =[

	];

} 


