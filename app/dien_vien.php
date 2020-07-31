<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class dien_vien extends Model
{
    use SoftDeletes;
    protected $table = 'dien_viens';
    
    public function dienviens()
    {
    	return $this->hasMany('App\chi_tiet_dien_vien','id','dien_vien_id');
    }
}
