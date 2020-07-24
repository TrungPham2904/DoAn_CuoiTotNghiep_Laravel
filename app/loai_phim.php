<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loai_phim extends Model
{
    protected $table = 'loai_phims';
    public function phims()
    {
    	return $this->hasMany('App\phim','id','loai_phim_id');
    }
}
