<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Phim\AddNewRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Database\Eloquent\Builder;
use App\phim;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Helpers\UploadFile;
use App\chi_tiet_dien_vien;
use App\dien_vien;
use App\loai_phim;
use App\kieu_phim;
use App\QuocGia;

class PhimController extends Controller
{
    public function layDanhSach(Request $req)
    {
        $limit=30;
        if(isset($req->limit) && !empty($req->limit)){
            $limit=$req->limit;
        }
        $filter = json_decode($req->filter, true);
        $listDanhSach = phim::where('phims.id','>',0);
        if(!empty($filter['the_loai_phim'])){
             $theLoaiPhim=$filter['the_loai_phim'];
             $listDanhSach->whereHas('LoaiPhim',function (Builder $query) use ($theLoaiPhim){
                $query->where('the_loai_phim',$theLoaiPhim);
             });
         }
         if(!empty($filter['ten_quoc_gia'])){
            $tenQuocGia=$filter['ten_quoc_gia'];
            $listDanhSach->whereHas('Quocgia',function (Builder $query) use ($tenQuocGia){
               $query->where('ten_quoc_gia',$tenQuocGia);
            });
        }
        if(!empty($filter['kieu_phim'])){
            $kieuPhim=$filter['kieu_phim'];
            $listDanhSach->whereHas('KieuPhim',function (Builder $query) use ($kieuPhim){
               $query->where('kieu_phim',$kieuPhim);
            });
        }
        if(!empty($filter['nam_san_xuat'])){
            $listDanhSach->whereYear('nam_san_xuat',$filter['nam_san_xuat'])->get();
        }
        // $listDanhSach->with(['ChiTietDienVien' => function($query){
        //     $query->with(['DienVien' => function($query){
        //         $query->select('id','ten_dien_vien');
        //     }]);
        // }]);  
        $listDanhSach->join('chi_tiet_dien_viens as ct','ct.phim_id','phims.id')
                    ->join('dien_viens as dv','dv.id','ct.dien_vien_id')
                    ->select('phims.*','dv.ten_dien_vien'); 
        $listDanhSach->orderByDesc('updated_at');
        $data=$listDanhSach->paginate($limit);
            $customMess = collect([
                'message'   => 'Lấy danh sách thành công',
                'code'      => 200
            ]);
            $result = $customMess->merge($data);
            return response()->json($result);

    }
    public function footerPhimLe()
    {
        $limit=30;
        if(isset($req->limit) && !empty($req->limit)){
            $limit=$req->limit;
        }
        $listDanhSachPhimLe = phim::where('phims.kieu_phim_id',2);
        $data=$listDanhSachPhimLe->paginate($limit);   
        $customMess = collect([
            'message'   => 'Lấy danh sách phim lẻ thành công',
            'code'      => 200
        ]);
        $result = $customMess->merge($data);
        return response()->json($result);

    }
    public function TiemKiem(Request $req)
	{
		$limit=30;
        if(isset($req->limit) && !empty($req->limit)){
            $limit=$req->limit;
        }
        $listDanhSach = phim::join('chi_tiet_dien_viens as ct','ct.phim_id','phims.id')
                            ->join('dien_viens as dv','dv.id','ct.dien_vien_id')
                            ->join('kieu_phims as kp','kp.id','phims.kieu_phim_id')
                            ->join('quoc_gias as qg','qg.id','phims.quoc_gia_id')
                            ->select('phims.*','dv.ten_dien_vien','kp.kieu_phim','qg.ten_quoc_gia');         
        if(!empty($req->key_word)){
            $keyWord=$req->key_word;
            $listDanhSach->where(function($query) use ($keyWord){
             $query->where('phims.ten_phim','like','%' .$keyWord. '%')   
                  ->orWhere('dv.ten_dien_vien','like','%' .$keyWord. '%')
                  ->orWhere('phims.dao_dien','like','%' .$keyWord. '%')
                  ->orWhere('qg.ten_quoc_gia','like','%' .$keyWord. '%')
                  ->orWhere('kp.kieu_phim','like','%' .$keyWord. '%');
        });
        }
        
        $data=$listDanhSach->paginate($limit);

        return response()->json(
            [
              'message'=>'Tìm kiếm thành công',
               'data'=>$data,
               'code'=>200   
            ]
        );

    }
    public function ChiTietTrang($id)
    {
        $Id=phim::find($id);
        if(empty($Id)){
            return response()->json([
                'message'=>'Không tìm thấy thông tin chi tiết',
               'data'=>$data,
               'code'=>404
            ]);
        }
        return response()->json(
            [
              'message'=>'Lấy thông tin chi tiết thành công',
               'data'=>$data,
               'code'=>200   
            ]
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
        $valid = new AddNewRequest;
        $validation = Validator::make($req->all(), $valid->rules(), $valid->messages());
        $msgError = $validation->messages()->first();
        if ($validation->fails()) {
            return response()->json([
                'message'   => $msgError,
                'code'      => 417
            ]);
        }
        $quocGia=QuocGia::where('id',$req->quoc_gia_id)->first();
        if(empty($quocGia))
        {
            return response()->json([
                'message_vn'    => 'Không tìm thấy thông tin quốc gia tương ứng',
                'code'          => 417
            ]);
        }

        $loaiPhim=loai_phim::where('id',$req->loai_phim_id)->first();
        if(empty($loaiPhim))
        {
            return response()->json([
                'message_vn'    => 'Không tìm thấy thông tin loại phim tương ứng',
                'code'          => 417
            ]);
        }
        $kieuPhim=kieu_phim::where('id',$req->kieu_phim_id)->first();
        if(empty($kieuPhim))
        {
            return response()->json([
                'message_vn'    => 'Không tìm thấy thông tin kiểu phim tương ứng',
                'code'          => 417
            ]);
        }
        // $dienVien=dien_vien::where('id',$req->dien_vien_id)->first();
        // if(empty($dienVien))
        // {
        //     return response()->json([
        //         'message_vn'    => 'Không tìm thấy thông tin diễn viên tương ứng',
        //         'code'          => 417
        //     ]);
        // }


        $phim = new phim;
        // $chitietDienVien= new chi_tiet_dien_vien; 
        if (isset($req->ten_phim) && !empty($req->ten_phim)) {
            if ($req->ten_phim != $phim->ten_phim) {
                $existsTenPhim = phim::whereTenPhim($req->ten_phim)
                                   ->first();
                if (!empty($existsTenPhim)) {
                    return response()->json([
                        'message_vn'    => 'Tên phim đã tồn tại',
                        'message_en'    => 'Name film already exists',
                        'code'          => 417
                    ]);
                }
            }
            $phim->ten_phim=$req->ten_phim;
        }      
        $phim->loai_phim_id=$loaiPhim->id;   
        $phim->quoc_gia_id=$quocGia->id;
        $phim->kieu_phim_id=$kieuPhim->id;
        $phim->thoi_luong=$req->thoi_luong;
        // $chitietDienVien->dien_vien_id=$dienVien->id;
        $phim->link_server=$req->link_server;
        $phim->dao_dien=$req->dao_dien;
        $phim->link_trailer=$req->link_trailer;
        $phim->nam_san_xuat=$req->nam_san_xuat;
        $phim->tieu_de = $req->tieu_de;
        $phim->save();
        // DienVienControler::update();
        if ($req->hasFile('poster') && $req->file('poster')->isValid()) {
            $img = $req->poster;
            $nameFile = UploadFile::uploadImg($img, 'phim', 'poster');
            phim::whereId($phim->id)->update(['poster' => $nameFile]);
        }
        // $chitietDienVien->phim_id=$phim->id;
        // $chitietDienVien->save();
        return response()->json([
            'message_vn'    => 'Thêm phim thành công',
            'message_en'    => 'Add successful',
            'code'          => 200,
            'data'          => $phim
        ]);

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        if (JWTAuth::user()->id == $id || JWTAuth::user()->roles[0]->name == 'supper_admin' || JWTAuth::user()->roles[0]->name == 'quanTriVien' ) {
            $phim = phim::whereId($id)
             ->with(['ChiTietDienVien' => function($query){
             $query->with(['DienVien' => function($query){
             $query->select('id','ten_dien_vien','nam_sinh','gioi_tinh','chieu_cao','quoc_tich','tieu_su','anh_dai_dien');
            }]);
        }])->first();  
            // $phim = phim::where('phims.id',$id)
            //     ->join('chi_tiet_dien_viens as ct','ct.phim_id','phims.id')
            //         ->join('dien_viens as dv','dv.id','ct.dien_vien_id')
            //         ->select('phims.*','dv.ten_dien_vien')->first();

            if(empty($phim)){
                return response()->json([
                    'message'   => 'Không tìm thấy thông tin phim tương ứng',
                    'code'      => 404
                ]);
            }
            return response()->json([
                'message'   => 'Lấy chi tiết thông tin phim thành công!',
                'code'      => 200,
                'data'      => $phim
            ]);
    }
}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request $req, $id)
    {
        $valid = new AddNewRequest;
        $validation = Validator::make($req->all(), $valid->rules(), $valid->messages());
        $msgError = $validation->messages()->first();
        if ($validation->fails()) {
            return response()->json([
                'message'   => $msgError,
                'code'      => 417
            ]);
        }
        $quocGia=QuocGia::where('id',$req->quoc_gia_id)->first();
        if(empty($quocGia))
        {
            return response()->json([
                'message_vn'    => 'Không tìm thấy thông tin quốc gia tương ứng',
                'code'          => 417
            ]);
        }

        $loaiPhim=loai_phim::where('id',$req->loai_phim_id)->first();
        if(empty($loaiPhim))
        {
            return response()->json([
                'message_vn'    => 'Không tìm thấy thông tin loại phim tương ứng',
                'code'          => 417
            ]);
        }
        $kieuPhim=kieu_phim::where('id',$req->kieu_phim_id)->first();
        if(empty($kieuPhim))
        {
            return response()->json([
                'message_vn'    => 'Không tìm thấy thông tin kiểu phim tương ứng',
                'code'          => 417
            ]);
        }
        $phim = phim::find($id);
        // $chitietDienVien=chi_tiet_dien_vien::find($id); 
        if(empty($phim)){
          return response()->json([
              'message'   => 'Không tìm thấy thông tin phim tương ứng',
              'code'      => 404
          ]);
        }
        if (isset($req->ten_phim) && !empty($req->ten_phim)) {
          if ($req->ten_phim != $phim->ten_phim) {
              $existsTenPhim = phim::whereTenPhim($req->ten_phim)->first();
              if (!empty($existsTenPhim)) {
                  return response()->json([
                      'message_vn'    => 'Tên phim đã tồn tại',
                      'code'          => 417
                  ]);
              }
          }
           $phim->ten_phim =$req->ten_phim;
      }
        $phim->loai_phim_id=$loaiPhim->id;      
        $phim->quoc_gia_id=$quocGia->id;
        $phim->kieu_phim_id=$kieuPhim->id;
        $phim->thoi_luong=$req->thoi_luong;
        // $chitietDienVien->dien_vien_id=$req->dien_vien_id;
        $phim->link_server=$req->link_server;
        $phim->link_trailer=$req->link_trailer;
        $phim->nam_san_xuat=$req->nam_san_xuat;
        $phim->tieu_de = $req->tieu_de;
        if ($req->hasFile('poster') && $req->file('poster')->isValid()) {
            $img = $req->poster;
            $nameFile = UploadFile::uploadImg($img, 'phim', 'poster');
            phim::whereId($phim->id)->update(['poster' => $nameFile]);
        }
        $phim->save();
       
        // $chitietDienVien->phim_id=$phim->id;
        // $chitietDienVien->save();
        return response()->json([
          'message_vn'    => 'Cập nhật thành công',
          'message_en'    => 'Update successful',
          'code'=>200,
          'date'=>$phim
      ]);
          return response()->json([
              'message'   => 'Bạn không thể thực hiện chức năng này',
              'code'      => 403
          ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (JWTAuth::user()->id == $id || JWTAuth::user()->roles[0]->name == 'supper_admin' || JWTAuth::user()->roles[0]->name == 'quanTriVien' ) {
        $phim = phim::where('phims.id',$id)
        ->join('chi_tiet_dien_viens as ct','ct.phim_id','phims.id')
            ->join('dien_viens as dv','dv.id','ct.dien_vien_id')
            ->select('phims.*','dv.ten_dien_vien')->first();
        if($phim !=null){
        $phim->delete();
        return response()->json([
            'message_vn'    => 'Xóa thành thành công',
            'message_en'    => 'Delete successful',
            'code'=>200,
            'date'=>$phim
        ]);
        }
        return response()->json([
            'message'   => 'Id phim này không tồn tại',
            'code'      => 403
        ]);
    }
    return response()->json([
        'message'   => 'Bạn không thể thực hiện chức năng này',
        'code'      => 403
    ]);
    }

    public function danhSachPhimDaXoa()
    {
       
        $phim=phim::onlyTrashed()->get();
        return response()->json([
            'message_vn'    => 'Lấy danh sách xóa thành công',
            'message_en'    => 'List delete successful',
            'code'=>200,
            'date'=>$phim
        ]);
    }

    public function khoiPhucPhimDaXoa($id)
    {
        if (JWTAuth::user()->id == $id || JWTAuth::user()->roles[0]->name == 'supper_admin' || JWTAuth::user()->roles[0]->name == 'quanTriVien' ) {
        $phim=phim::onlyTrashed()->where('phims.id',$id)
            ->join('chi_tiet_dien_viens as ct','ct.phim_id','phims.id')
            ->join('dien_viens as dv','dv.id','ct.dien_vien_id')
            ->select('phims.*','dv.ten_dien_vien')->first();
        if($phim != null)
        {
        $phim->restore();
        return response()->json([
            'message_vn'    => 'Khôi phục thành công',
            'code'=>200,
            'date'=>$phim
        ]);
        } return response()->json([
            'message'   => 'Id phim này chưa được xóa hoặc không tồn tại',
            'code'      => 403
        ]);
    }
    return response()->json([
        'message'   => 'Bạn không thể thực hiện chức năng này',
        'code'      => 403
    ]);
    }

}
