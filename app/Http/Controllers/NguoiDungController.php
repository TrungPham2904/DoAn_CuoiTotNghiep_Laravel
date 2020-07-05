<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\nguoi_dung;



class NguoiDungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $NguoiDung = nguoi_dung::all();
        return Response()->json($NguoiDung);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
    public function xuLyDangNhap(Request $req)
    {
       
        $credentials= [
            'tai_khoan' => $req->tai_khoan,
            'password' => $req->mat_khau
        ];
    #chứng thật thông tin đăng nhập
        if(!auth('web')->attempt($credentials)){
            #sai tên đăng nhập hoặc mật khẩu
            return 'Đăng nhập thất bại';
        }
        return redirect()->route('vào trang chủ');
    }
}
