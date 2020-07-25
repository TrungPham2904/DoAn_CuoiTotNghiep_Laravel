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
        Route::middleware(['assign.guard:quanTriVien|nguoiDung','jwt.auth', 'role:quan_tri_vien|supper_admin'])->group(function(){ 
                Route::get('','API\NguoiDungController@index');
        }); 

});
Route::group(['prefix' => 'phim'], function () {
        Route::middleware(['assign.guard:quanTriVien|nguoiDung','jwt.auth', 'role:quan_tri_vien|supper_admin'])->group(function(){ 
        Route::get('','API\PhimController@layDanhSach');
        Route::post('them-phim','API\PhimController@create');
        Route::get('{id}','API\PhimController@show');
        }); 
});
Route::group(['prefix' => 'dien-vien'], function () {
        Route::middleware(['assign.guard:quanTriVien|nguoiDung','jwt.auth', 'role:quan_tri_vien|supper_admin'])->group(function(){ 
                Route::get('','API\DienVienController@index');
                Route::post('them-dienvien','API\DienVienController@create');

        });
});










