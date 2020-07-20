<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use App\phim;

class PhimController extends Controller
{
    public function layDanhSach(Request $req)
    {
        $limit=30;
        if(isset($req->limit) && !empty($req->limit)){
            $limit=$req->limit;
        }
        $listDanhSach = phim::where('id','>',0);
        if(!empty($req->quoc_gia_id)){
            $quocgiatheoid=$req->quoc_gia_id;
            $listDanhSach->whereHas('Quocgia', function (Builder $query) use ($quocgiatheoid) {
                $query->where('id',$quocgiatheoid);
        });
        }
        // if(!empty($req->loai_phim_id)){
        //      $loaiphimid=$req->loai_phim_id;
        //      $listDanhSach->whereHas('Loaiphim',function (Builder $query) use ($loaiphimid){
        //         $query->where('id',$loaiphimid);
        //      });
        if(!empty($req->loai_phim_id))
        {
            $listDanhSach=where('loai_phim_id','like','%' .$req->loai_phim_id. '%');
        }
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
    public function TaoPhim(Request $request)
    { 
        if(Request::hasFile('fileFilm')){
            $file = Request::file('fileFilm');
            $filename = $file->getClientOriginalName();
            $path = public_path().'/uploads/';
             $file->move($path, $filename);
            return response()->json(
                [
                  'message'=>'Upload thành công',
                   'code'=>200   
                ]
            );
        }
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
        //
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
        //
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
