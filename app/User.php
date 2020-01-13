<?php

namespace Sidecol;



use Caffeinated\Shinobi\Traits\ShinobiTrait;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
//use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
//use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                   // AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, CanResetPassword, ShinobiTrait; //Authorizable

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
      
     'name',
     'apellidos',
     'email',
     'celular',
     'tipo_documento',
     'documento',
     'direccion',
     'score',
     'password',
        
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
