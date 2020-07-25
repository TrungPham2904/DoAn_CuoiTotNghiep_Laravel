<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\Request;
use App\Quocgia;
use App\loai_phim;
use App\dien_vien;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;
class phim extends Model
{
    use SoftDeletes, HasRoles;
    protected $table = 'phims';
    protected $appends = ['ten_quoc_gia','the_loai_phim','kieu_phim'];
    protected $hidden = ['quoc_gia_id','loai_phim_id','kieu_phim_id'];

    // public function getTenDienVienAttribute($id)
    // {
    //     $tenDienVien = phim::find($id)->TenDienVien()->orderBy('ten_dien_vien')->get();
    // }

    public function getTenQuocGiaAttribute()
    {
        $quocGia = QuocGia::where('id', $this->quoc_gia_id)->get();
        return $quocGia[0]->ten_quoc_gia;
    }

    public function getTheLoaiPhimAttribute()
    {
        $theLoaiPhim = loai_phim::where('id',$this->loai_phim_id)->get();
        return  $theLoaiPhim[0]->the_loai_phim;
    }
    
    public function getKieuPhimAttribute()
    {
        $kieuPhim = kieu_phim::where('id',$this->kieu_phim_id)->get();
        return  $kieuPhim[0]->kieu_phim;
    }
    public function Quocgia()
    {
        return $this->belongsTo('App\QuocGia','quoc_gia_id','id');
    }
    
    public function LoaiPhim()
    {
        return $this->belongsTo('App\loai_phim','loai_phim_id','id');
    }

    public function KieuPhim()
    {
        return $this->belongsTo('App\kieu_phim','loai_phim_id','id');
    }

    // public function TenDienVien()
    // {
    //     return $this->belongsToMany('App\dien_vien','chi_tiet_dien_vien','dien_vien_id','phim_id');
    // }

}
