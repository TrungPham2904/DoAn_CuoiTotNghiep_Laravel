<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kieu_phim extends Model
{
    protected $table = 'kieu_phims';
    public function phims()
    {
    	return $this->hasOne('App\phim','id','kieu_phim_id');
    }
}
