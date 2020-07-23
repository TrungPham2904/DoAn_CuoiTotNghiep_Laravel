<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class phim extends Model
{
    protected $table = 'phims';
    public function Quocgia()
    {
    	return $this->hasOne('App\QuocGia','id','quoc_gia_id');
    }
    // public function Loaiphim()
    // {
    //     return $this->belongsTo('App\loai_phim','id','loai_phim_id');
    // }
    
}
