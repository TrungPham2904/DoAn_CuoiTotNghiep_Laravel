<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\dien_vien;
use App\phim;
class chi_tiet_dien_vien extends Model
{
    protected $table = 'chi_tiet_dien_viens';
    protected $appends = ['dien_vien','ten_phim'];


    public function getDienVienAttribute()
    {
        $dienVien =dien_vien::where('id', $this->dien_vien_id)->get();
        return $dienVien[0]->dien_vien;
    }
    public function Tendienvien()
    {
        return $this->belongsTo('App\dien_vien','dien_vien_id','id');
    }
    public function getTenPhimAttribute()
    {
        $tenPhim =phim::where('id', $this->phim_id)->get();
        return $tenPhim[0]->ten_phim;
    }
    public function Phim()
    {
        return $this->belongsTo('App\phim','phim_id','id');
    }
    public function DienVien()
    {
        return $this->belongsTo('App\dien_vien','dien_vien_id','id');
    }
    
}
