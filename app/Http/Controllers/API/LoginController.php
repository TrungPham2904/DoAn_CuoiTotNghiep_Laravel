<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function dangNhap(Request $req)
    {
    	$credentials= [
    		'tai_khoan' => $req->tai_khoan,
    		'password' => $req->mat_khau
    	];
    #chứng thật thông tin đăng nhập
    	if(!$token = auth('api')->attempt($credentials)){
    		#sai tên đăng nhập hoặc mật khẩu
    		return response()->json([
    			'status' => false,
    			'message' => 'Đăng nhập thất bại'
    		], 401);
    	}
    	#Chứng thật thành công
    	return response()->json([
    		'status' => true,
    		'message' => 'Đăng nhập thành công',
    		'token' => $token,
    		'type' => 'bearer',
    		'expires' => auth('api')->factory()->getTTL() * 60
    	], 200);
    }
    public function layThongTin()
    {
        return auth('api')->user();
	}
}
