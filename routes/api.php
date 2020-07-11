<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//Đăng nhập
Route::post('dang-nhap','API\LoginController@dangNhap');

// Lấy thông tin đăng nhập

Route::middleware(['assign.guard:api','jwt.auth'])->group(function(){
	Route::get('lay-thong-tin','API\LoginController@layThongTin');

});

Route::prefix('nguoi-dung')->group(function(){
        Route::get('','NguoiDungController@index');
        Route::get('tiem-kiem','API\PhimController@TiemKiem');
});

Route::prefix('phim')->group(function(){
        Route::get('','API\PhimController@layDanhSach');
});







