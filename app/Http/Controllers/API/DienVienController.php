<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
        $dienVien->anh_dai_dien = $req->anh_dai_dien;
        $dienVien->save();
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
        //
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
