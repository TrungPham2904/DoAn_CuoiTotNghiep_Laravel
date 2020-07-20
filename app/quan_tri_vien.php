<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;

class quan_tri_vien extends Authenticatable implements 
    JWTSubject
{
    use SoftDeletes, HasRoles;
    protected $table = 'quan_tri_viens';
    protected $hidden = ['mat_khau'];

    public function getPasswordAttribute()
    {
    	return $this->mat_khau;
    }
    public function getJWTIdentifier()
    {
    	return $this->getKey();
    }

     public function getJWTCustomClaims()
     {
     	return [];
     }
    
}
