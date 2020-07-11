<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class nguoi_dung extends Authenticatable implements 
		JWTSubject
{
    protected $table = 'nguoi_dungs';
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
