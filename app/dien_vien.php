<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dien_vien extends Model
{
    protected $table = 'dien_viens';
    public function dienviens()
    {
    	return $this->hasMany('App\chi_tiet_dien_vien','id','dien_vien_id');
    }
}
