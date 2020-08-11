<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class dien_vien extends Model
{
    use SoftDeletes;
    protected $table = 'dien_viens';
    protected $appends = ['img'];
    protected $fillable = ['anh_dai_dien'];
    public function dienviens()
    {
    	return $this->hasMany('App\chi_tiet_dien_vien','id','dien_vien_id');
    }
    public function getImgAttribute() {
        if ($this->anh_dai_dien == null) {
            return null;
        }
        return [
            'original'  => request()->getSchemeAndHttpHost(). '/dien_vien/anh_dai_dien/original/'. $this->anh_dai_dien,
            'medium'    => request()->getSchemeAndHttpHost(). '/dien_vien/anh_dai_dien/medium/'. $this->anh_dai_dien,
            'thumb'     => request()->getSchemeAndHttpHost(). '/dien_vien/anh_dai_dien/thumb/'. $this->anh_dai_dien,
        ];
    }
}
