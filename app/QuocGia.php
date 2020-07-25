<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuocGia extends Model
{
    protected $table = 'quoc_gias';
    public function phims()
    {
    	return $this->hasMany('App\phim','id','quoc_gia_id');
    }
    
}
