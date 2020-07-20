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
Route::group(['prefix' => 'quan-tri-vien'], function () {
        Route::post('login', 'API\LoginController@dangNhap');
Route::middleware(['assign.guard:quanTriVien|nguoiDung','jwt.auth', 'role:quan_tri_vien|nguoi_dung'])->group(function(){
        Route::post('logout', 'API\LoginController@dangXuat');
    });
    Route::middleware(['assign.guard:quanTriVien|nguoiDung', 'jwt.auth','role:quan_tri_vien'])->group(function(){
        Route::get('','API\QuanTriVienController@index');
        Route::post('them-moi-quantrivien','API\QuanTriVienController@create');
        Route::get('{id}','API\QuanTriVienController@show');
        Route::post('{id}','API\QuanTriVienController@update');
    });
});

Route::group(['prefix' => 'nguoi-dung'], function () {
        Route::get('','API\NguoiDungController@index');
        Route::post('login', 'API\LoginController@dangNhapNguoiDung');
        Route::middleware(['assign.guard:quanTriVien|nguoiDung', 'jwt.auth','role:quan_tri_vien|nguoi_dung'])->group(function(){
                        
        });
        Route::middleware(['assign.guard:quanTriVien|nguoiDung', 'jwt.auth','role:quan_tri_vien'])->group(function(){
                Route::post('them-moi-nguoidung','API\NguoiDungController@create');
        });     
        Route::get('tiem-kiem','API\PhimController@TiemKiem');
        Route::get('{id}','API\PhimController@ChiTietTrang');
        Route::post('them-phim','API\PhimController@TaoPhim');
});

Route::prefix('phim')->group(function(){
        Route::get('','API\PhimController@layDanhSach');
        Route::get('tim-kiem','API\PhimController@TiemKiem');
        Route::get('{id}','API\PhimController@ChiTietTrang');
        Route::post('them-phim','API\PhimController@TaoPhim');
});










