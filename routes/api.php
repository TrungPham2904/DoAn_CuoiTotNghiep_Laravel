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
Route::middleware(['assign.guard:quanTriVien|nguoiDung','jwt.auth', 'role:quan_tri_vien|nguoi_dung|supper_admin'])->group(function(){
        Route::post('logout', 'API\LoginController@dangXuat');
    });
    Route::middleware(['assign.guard:quanTriVien|nguoiDung', 'jwt.auth','role:supper_admin|quan_tri_vien'])->group(function(){
        Route::get('','API\QuanTriVienController@index');
       
        Route::get('{id}','API\QuanTriVienController@show');
        
    });
    Route::middleware(['assign.guard:quanTriVien|nguoiDung', 'jwt.auth','role:supper_admin'])->group(function(){
        Route::post('them-moi-quantrivien','API\QuanTriVienController@create');
        Route::post('{id}','API\QuanTriVienController@update');
    });
});

Route::group(['prefix' => 'nguoi-dung'], function () {
        Route::post('login', 'API\LoginController@dangNhapNguoiDung');
        Route::post('them-moi-nguoidung','API\NguoiDungController@create');
        Route::middleware(['assign.guard:quanTriVien|nguoiDung', 'jwt.auth','role:quan_tri_vien|nguoi_dung'])->group(function(){
                          
        });
        Route::middleware(['assign.guard:quanTriVien|nguoiDung', 'jwt.auth','role:quan_tri_vien|supper_admin|nguoi_dung'])->group(function(){
               
        });     
        Route::get('tiem-kiem','API\PhimController@TiemKiem');
        Route::get('{id}','API\PhimController@ChiTietTrang');
        
       
});
Route::group(['prefix' => 'admin'], function () {
        Route::get('','API\NguoiDungController@index');

        Route::middleware(['assign.guard:quanTriVien|nguoiDung','jwt.auth', 'role:quan_tri_vien|supper_admin'])->group(function(){ 
        }); 

});
Route::group(['prefix' => 'phim'], function () {
       
        Route::middleware(['assign.guard:quanTriVien|nguoiDung','jwt.auth', 'role:quan_tri_vien|supper_admin'])->group(function(){ 
        Route::get('','API\PhimController@layDanhSach');
        Route::get('/ds-xoa-phim','API\PhimController@danhSachPhimDaXoa');
        Route::post('them-phim','API\PhimController@create');
        Route::get('{id}','API\PhimController@show');
        Route::post('{id}','API\PhimController@update');
        Route::get('/xoa-phim/{id}','API\PhimController@destroy');
        Route::get('/khoi-phuc-phim/{id}','API\PhimController@khoiPhucPhimDaXoa');
        }); 
});
Route::group(['prefix' => 'dien-vien'], function () {
        Route::middleware(['assign.guard:quanTriVien|nguoiDung','jwt.auth', 'role:quan_tri_vien|supper_admin'])->group(function(){ 
                Route::get('','API\DienVienController@index');
                Route::get('/ds-xoa-dienvien','API\DienVienController@danhSachDienVienDaXoa');
                Route::get('/khoi-phuc-dienvien/{id}','API\DienVienController@khoiPhucDienVienDaXoa');
                Route::post('them-dienvien','API\DienVienController@create');
                Route::get('{id}','API\DienVienController@show');
                Route::post('{id}','API\DienVienController@update');
                Route::get('/xoa-dienvien/{id}','API\DienVienController@destroy');
               

        });
});










