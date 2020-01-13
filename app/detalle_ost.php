<?php

namespace Sidecol;

use Illuminate\Database\Eloquent\Model;
use Caffeinated\Shinobi\Traits\ShinobiTrait;
use Illuminate\Auth\Authenticatable;

class detalle_ost extends Model
{
	use ShinobiTrait;

	/*
        El modelo es el encargdo de gestional las tablas de las bases de datos;
    */


        protected $table='tbl_detalleost';
        protected $primaryKey='iddetalleost';
        public $timestamps=false;

        protected $filleble=[

        	'iddetalleost',
        	'contacto_ost',
            'tipo_doc',
            'numero_doc',
            'direccion_ost',
            'celular_ost',
            'telefono_ost',
            'email_ost',
            'nro_factura',
            'estado_garantia',
            'nro_serie',
            'falla',
            'ost_id',
            'producto_id',
            'municipio_id',


        ];
        protected $guarded =[

        ];
    }

