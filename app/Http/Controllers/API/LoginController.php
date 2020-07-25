<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Validator;
use App\quan_tri_vien;
use App\nguoi_dung;
use App\Http\Requests\Admin\LoginRequest;

class LoginController extends Controller
{
    public function dangNhap(Request $req)
    {
       
    	$credentials= [
    		'email' => $req->email,
			'password' => $req->mat_khau
		];
		if ($token = auth('quanTriVien')->attempt($credentials)) {
            if (auth('quanTriVien')->user()->status == 0) {
                $quanTriVien = quan_tri_vien::find(auth('quanTriVien')->user()->id);
                if (!empty($req->fcm_token)) {
                    $quanTriVien->fcm_token = $req->fcm_token;
                }
                $quanTriVien->save();
                $quanTriVien['token'] = $token;
                return response()->json([
                    'message_vn'    => 'Đăng nhập thành công',
                    'message_en'    => 'Login successful',
                    'code'          => 200,
                    'data'          => $quanTriVien
                ]);
            } 
            return response()->json([
                'message_vn'    => 'Tài khoản của bạn đã bị khóa',
                'message_en'    => 'Your account has been locked',
                'code'          => 417
            ]);
        }
        return response()->json([
            'message_vn'    => 'Email hoặc mật khẩu không đúng',
            'message_en'    => 'Email or password incorrect',
            'code'          => 417
        ]);
    }
    public function dangNhapNguoiDung(Request $req)
    {
        
    	$credentials= [
    		'email' => $req->email,
			'password' => $req->mat_khau
		];
		if ($token = auth('nguoiDung')->attempt($credentials)) {
            if (auth('nguoiDung')->user()->status == 0) {
                $nguoiDung = nguoi_dung::find(auth('nguoiDung')->user()->id);
                if (!empty($req->fcm_token)) {
                    $nguoiDung->fcm_token = $req->fcm_token;
                }
                $nguoiDung->save();
                $nguoiDung['token'] = $token;
                return response()->json([
                    'message_vn'    => 'Đăng nhập thành công',
                    'message_en'    => 'Login successful',
                    'code'          => 200,
                    'data'          => $nguoiDung
                ]);
            } 
            return response()->json([
                'message_vn'    => 'Tài khoản của bạn đã bị khóa',
                'message_en'    => 'Your account has been locked',
                'code'          => 417
            ]);
        }
        return response()->json([
            'message_vn'    => 'Email hoặc mật khẩu không đúng',
            'message_en'    => 'Email or password incorrect',
            'code'          => 417
        ]);
    }
    // public function dangNhapAdmin()
    // {
    //     $credentials= [
    // 		'email' => $req->email,
	// 		'password' => $req->mat_khau
	// 	];
	// 	if ($token = auth('quanTriVien')->attempt($credentials)) {
    //         if (auth('quanTriVien')->user()->status == 0) {
    //             $nguoiDung = quan_tri_vien::find(auth('quanTriVien')->user()->id);
    //             if (!empty($req->fcm_token)) {
    //                 $nguoiDung->fcm_token = $req->fcm_token;
    //             }
    //             $nguoiDung->save();
    //             $nguoiDung['token'] = $token;
    //             return response()->json([
    //                 'message_vn'    => 'Đăng nhập thành công',
    //                 'message_en'    => 'Login successful',
    //                 'code'          => 200,
    //                 'data'          => $nguoiDung
    //             ]);
    //         } 
    //         return response()->json([
    //             'message_vn'    => 'Tài khoản của bạn đã bị khóa',
    //             'message_en'    => 'Your account has been locked',
    //             'code'          => 417
    //         ]);
    //     }
    //     return response()->json([
    //         'message_vn'    => 'Email hoặc mật khẩu không đúng',
    //         'message_en'    => 'Email or password incorrect',
    //         'code'          => 417
    //     ]);  
    // }
    public function dangXuat() {
        $admin = quan_tri_vien::find(JWTAuth::user()->id);
        auth('quanTriVien')->logout();
        return response()->json([
            'message_vn'    => 'Đăng xuất thành công',
            'message_en'    => 'Logout successful',
            'code'          => 200
        ]);
    }
    public function dangXuatNguoiDung() {
        $admin = nguoi_dung::find(JWTAuth::user()->id);
        auth('quanTriVien')->logout();
        return response()->json([
            'message_vn'    => 'Đăng xuất thành công',
            'message_en'    => 'Logout successful',
            'code'          => 200
        ]);
    }

    
}
