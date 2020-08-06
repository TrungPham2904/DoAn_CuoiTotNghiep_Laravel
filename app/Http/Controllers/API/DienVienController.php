<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use App\Helpers\UploadFile;
use App\dien_vien;
use App\chi_tiet_dien_vien;

class DienVienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $limit=30;
        if(isset($req->limit) && !empty($req->limit)){
            $limit=$req->limit;
        }
        $listDanhSach = dien_vien::where('id','>',0);
        $data=$listDanhSach->paginate($limit);
        return response()->json(
            [
              'message'=>'Lấy danh sách thành công',
               'data'=>$data,
               'code'=>200   
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
        $dienVien= new dien_vien;
        $dienVien->ten_dien_vien = $req->ten_dien_vien;
        $dienVien->nam_sinh = $req->nam_sinh;
        $dienVien->gioi_tinh = $req->gioi_tinh;
        $dienVien->chieu_cao = $req->chieu_cao;
        $dienVien->quoc_tich = $req->quoc_tich;
        $dienVien->tieu_su = $req->tieu_su;
        $dienVien->save();
        if ($req->hasFile('anh_dai_dien') && $req->file('anh_dai_dien')->isValid()) {
            $img = $req->anh_dai_dien;
            $nameFile = UploadFile::uploadImg($img, 'dien_vien', 'anh_dai_dien');
            dien_vien::whereId($dienVien->id)->update(['anh_dai_dien' => $nameFile]);
        }
        return response()->json([
            'message_vn'    => 'Thêm thành công',
            'message_en'    => 'Add successful',
            'code'          => 200,
            'data'          => $dienVien
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
            $dienVien = dien_vien::find($id);
            if(empty($dienVien)){
                return response()->json([
                    'message'   => 'Không tìm thấy thông tin phim tương ứng',
                    'code'      => 404
                ]);
            }
            return response()->json([
                'message'   => 'Lấy chi tiết thông tin phim thành công!',
                'code'      => 200,
                'data'      => $dienVien
            ]);
        }
        return response()->json([
            'message'   => 'Bạn không thể thực hiện chức năng này',
            'code'      => 403
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $dienVien = dien_vien::find($id);
        if(empty($dienVien)){
          return response()->json([
              'message'   => 'Không tìm thấy thông tin quản trị viên tương ứng',
              'code'      => 404
          ]);
        }
        if (isset($req->ten_dien_vien) && !empty($req->ten_dien_vien)) {
          if ($req->ten_dien_vien != $dienVien->ten_dien_vien) {
              $existsTenDienVien = dien_vien::whereTenDienVien($req->ten_dien_vien)->first();
              if (!empty($existsTenDienVien)) {
                  return response()->json([
                      'message_vn'    => 'Tên đã tồn tại',
                      'message_en'    => 'Name already exists',
                      'code'          => 417
                  ]);
              }
          }
           $dienVien->ten_dien_vien =$req->ten_dien_vien;
      }
         $dienVien->nam_sinh=$req->nam_sinh;
         $dienVien->gioi_tinh=$req->gioi_tinh;
         $dienVien->chieu_cao=$req->chieu_cao;
         $dienVien->quoc_tich=$req->quoc_tich;
         $dienVien->tieu_su=$req->tieu_su;
         if ($req->hasFile('anh_dai_dien') && $req->file('anh_dai_dien')->isValid()) {
            $img = $req->anh_dai_dien;
            $nameFile = UploadFile::uploadImg($img, 'dien_vien', 'anh_dai_dien');
            dien_vien::whereId($dienVien->id)->update(['anh_dai_dien' => $nameFile]);
        }
         $dienVien->save();
       
        return response()->json([
          'message_vn'    => 'Cập nhật thành công',
          'message_en'    => 'Update successful',
          'code'=>200,
          'date'=>$dienVien
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
            $dienVien = dien_vien::find($id);
            if($dienVien !=null)
            {
            $dienVien->delete();
            return response()->json([
                'message_vn'    => 'Xóa thành thành công',
                'message_en'    => 'Delete successful',
                'code'=>200,
                'date'=>$dienVien
            ]);
            }
            return response()->json([
                'message'   => 'Id diễn viên không tồn tại',
                'code'      => 403
            ]);
        }
        return response()->json([
            'message'   => 'Bạn không thể thực hiện chức năng này',
            'code'      => 403
        ]);
    }

    public function danhSachDienVienDaXoa()
    {
       
        $dienVien=dien_vien::onlyTrashed()->get();
        return response()->json([
            'message_vn'    => 'Lấy danh sách xóa thành công',
            'message_en'    => 'List delete successful',
            'code'=>200,
            'date'=>$dienVien
        ]);
    }

    public function khoiPhucDienVienDaXoa($id)
    {
        if (JWTAuth::user()->id == $id || JWTAuth::user()->roles[0]->name == 'supper_admin' || JWTAuth::user()->roles[0]->name == 'quanTriVien' ) {
        $dienVien=dien_vien::onlyTrashed()->find($id);
        if($dienVien != null)
        {
        $dienVien->restore();
        return response()->json([
            'message_vn'    => 'Khôi phục thành công',
            'message_en'    => 'Restore successful',
            'code'=>200,
            'date'=>$dienVien
        ]);
        }
        return response()->json([
            'message'   => 'Id diễn viên này chưa được xóa hoặc không tồn tại',
            'code'      => 403
        ]);
    }
    return response()->json([
        'message'   => 'Bạn không thể thực hiện chức năng này',
        'code'      => 403
    ]);
    }
}
