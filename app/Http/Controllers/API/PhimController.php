<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Phim\AddNewRequest;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\phim;
use App\chi_tiet_dien_vien;
use App\dien_vien;

class PhimController extends Controller
{
    public function layDanhSach(Request $req)
    {
        $limit=30;
        if(isset($req->limit) && !empty($req->limit)){
            $limit=$req->limit;
        }
        $listDanhSach = phim::where('id','>',0);
        
        // if(!empty($req->loai_phim_id)){
        //      $loaiphimid=$req->loai_phim_id;
        //      $listDanhSach->whereHas('Loaiphim',function (Builder $query) use ($loaiphimid){
        //         $query->where('id',$loaiphimid);
        //      });
        if(!empty($req->kieu_phim_id))
        {
             $listDanhSach=where('kieu_phim_id','like','%' .$req->kieu_phim_id. '%');
        }
        if(!empty($req->nam_san_xuat))
        {
            $listDanhSach=where('nam_san_xuat','like','%' .$req->nam_san_xuat. '%');
        }
        $data=$listDanhSach->paginate($limit);


        return response()->json(
            [
              'message'=>'Lấy danh sách thành công',
               'data'=>$data,
               'code'=>200   
            ]
        );
    }
    public function TiemKiem(Request $req)
	{
		$limit=30;
        if(isset($req->limit) && !empty($req->limit)){
            $limit=$req->limit;
        }
        $listDanhSach = phim::where('id','>',0);
        if(!empty($req->key_word)){
        $keyWord=$req->key_word;
        $listDanhSach->where(function($query) use ($keyWord){
            $query->where('ten_phim','like','%' .$keyWord. '%')
                  ->orWhere('dien_vien','like','%' .$keyWord. '%');          
        });
        }
        
        $data=$listDanhSach->paginate($limit);

        return response()->json(
            [
              'message'=>'Tìm kiếm thành công',
              'message_en'    => 'Find successful',
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
    // public function TaoPhim(Request $request)
    // { 
    //     if(Request::hasFile('fileFilm')){
    //         $file = Request::file('fileFilm');
    //         $filename = $file->getClientOriginalName();
    //         $path = public_path().'/uploads/';
    //          $file->move($path, $filename);
    //         return response()->json(
    //             [
    //               'message'=>'Upload thành công',
    //                'code'=>200   
    //             ]
    //         );
    //     }
    // }

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
        $phim = new phim;
        $chitietDienVien= new chi_tiet_dien_vien; 
        $phim->ten_phim=$req->ten_phim;
        $phim->poster=$req->poster;
        $phim->loai_phim_id=$req->loai_phim_id;      
        $phim->quoc_gia_id=$req->quoc_gia_id;
        $phim->kieu_phim_id=$req->kieu_phim_id;
        $phim->thoi_luong=$req->thoi_luong;
        $chitietDienVien->dien_vien_id=$req->dien_vien_id;
        $phim->link_server=$req->link_server;
        $phim->link_trailer=$req->link_trailer;
        $phim->nam_san_xuat=$req->nam_san_xuat;
        $phim->tieu_de = $req->tieu_de;
        $phim->save();
        $chitietDienVien->phim_id=$phim->id;
        $chitietDienVien->save();
        return response()->json([
            'message_vn'    => 'Thêm thành công',
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
        if (JWTAuth::user()->id == $id ) {
            $Phim = phim::find($id);
            if(empty($Phim)){
                return response()->json([
                    'message'   => 'Không tìm thấy thông tin phim tương ứng',
                    'code'      => 404
                ]);
            }
            return response()->json([
                'message'   => 'Lấy chi tiết thông tin phim thành công!',
                'code'      => 200,
                'data'      => $Phim
            ]);
        }
        return response()->json([
            'message'   => 'Bạn không thể thực hiện chức năng này',
            'code'      => 403
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
