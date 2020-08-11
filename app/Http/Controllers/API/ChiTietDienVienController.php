<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\ChiTietDienVien\AddNewRequest;
use App\chi_tiet_dien_vien;
use App\phim;
use App\dien_vien;

class ChiTietDienVienController extends Controller
{
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
        $phimId=phim::where('id',$req->phim_id)->first();
        if(empty($phimId))
        {
            return response()->json([
                'message_vn'    => ' Phim id này chưa tồn tại',
                'code'          => 417
            ]);
        }
        $dienVienId=dien_vien::where('id',$req->dien_vien_id)->first();
        if(empty($dienVienId))
        {
            return response()->json([
                'message_vn'    => ' Diễn viên id này chưa tồn tại',
                'code'          => 417
            ]);
        }
        $chiTiet= new chi_tiet_dien_vien;
        $chiTiet->phim_id=$phimId->id;
        $chiTiet->dien_vien_id=$dienVienId->id;
        $chiTiet->save();
        return response()->json([
            'message_vn'    => 'Thêm chi tiết diễn viên thành công',
            'code'          => 200,
            'data'          => $chiTiet
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
        $phimId=phim::where('id',$req->phim_id)->first();
        if(empty($phimId))
        {
            return response()->json([
                'message_vn'    => ' Phim id này chưa tồn tại',
                'code'          => 417
            ]);
        }
        $dienVienId=dien_vien::where('id',$req->dien_vien_id)->first();
        if(empty($dienVienId))
        {
            return response()->json([
                'message_vn'    => ' Diễn viên id này chưa tồn tại',
                'code'          => 417
            ]);
        }
        $chiTiet= chi_tiet_dien_vien::find($id);
        if(empty($chiTiet)){
            return response()->json([
                'message'   => 'Không tìm thấy thông tin chi tiết diễn viên tương ứng',
                'code'      => 404
            ]);
          }
        $chiTiet->phim_id=$phimId->id;
        $chiTiet->dien_vien_id=$dienVienId->id;
        $chiTiet->save();
        return response()->json([
            'message_vn'    => 'Cập nhật chi tiết diễn viên thành công',
            'code'          => 200,
            'data'          => $chiTiet
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
        //
    }
}
