<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AddNewRequest;
use Spatie\Permission\Models\Role;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\nguoi_dung;
use App\phim;
// use Analytics;
// use Spatie\Analytics\Period;


class NguoiDungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data=Analytics::fetchMostVisitedPages(Period::days(7));
        // var_dump($data);
        // exit;
        $limit=20;
        if(isset($req->limit) && !empty($req->limit)){
            $limit=$req->limit;
        }
        $listDanhSachNguoiDung = nguoi_dung::where('id','>',0);
        if(!empty($req->ten))
        {
            $listDanhSachNguoiDung=where('ten','like','%' .$req->ten. '%');
        }
        if(!empty($req->tai_khoan))
        {
            $listDanhSachNguoiDung=where('tai_khoan','like','%' .$req->tai_khoan. '%');
        }
        if(!empty($req->email))
        {
            $listDanhSachNguoiDung=where('email','like','%' .$req->email. '%');
        }
        if(!empty($req->fb_token))
        {
            $listDanhSachNguoiDung=where('fb_token','like','%' .$req->fb_token. '%');
        }
        $data=$listDanhSachNguoiDung->paginate($limit);
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
        $valid = new AddNewRequest;
        $validation = Validator::make($req->all(), $valid->rules(), $valid->messages());
        $msgError = $validation->messages()->first();
        if ($validation->fails()) {
            return response()->json([
                'message'   => $msgError,
                'code'      => 417
            ]);
        }
        $email = strtolower($req->email);
        $existsEmail = nguoi_dung::whereEmail($email)
                            ->first();
        if (!empty($existsEmail)) {
            return response()->json([
                'message_vn'    => 'Email đã tồn tại',
                'message_en'    => 'Email already exists',
                'code'          => 417
            ]);
        }
        $role = Role::findByName('nguoi_dung', 'nguoiDung');
        $quantrivien = new nguoi_dung;
        $quantrivien->ten =$req->ten;
        $quantrivien->tai_khoan=$req->tai_khoan;
        $quantrivien->mat_khau=Hash::make($req->mat_khau);
        $quantrivien->email=$req->email;
        $quantrivien->fb_token=$req->fb_token;
        $quantrivien->save();
        $quantrivien->assignRole($role->name)
                    ->givePermissionTo('xem_tai');
        return response()->json([
            'message'=>'Thêm thành công người dùng',
            'code'=>200,
            'data'          => $quantrivien
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
        if (JWTAuth::user()->id == $id || JWTAuth::user()->roles[0]->name == 'quan_tri_vien' || JWTAuth::user()->roles[0]->name == 'supper_admin') {
            $nguoiDung = nguoi_dung::find($id);
            if(empty($nguoiDung)){
                return response()->json([
                    'message'   => 'Không tìm thấy thông tin người dùng tương ứng',
                    'code'      => 404
                ]);
            }
            return response()->json([
                'message'   => 'Lấy chi tiết thông tin người dùng thành công!',
                'code'      => 200,
                'data'      => $nguoiDung
            ]);
        }
        return response()->json([
            'message'   => 'Bạn không thể thực hiện chức năng này',
            'code'      => 403
        ]);
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
        $valid = new UpdateRequest;
        $validation = Validator::make($req->all(), $valid->rules(), $valid->messages());
        $msgError = $validation->messages()->first();
        if ($validation->fails()) {
            return response()->json([
                'message'   => $msgError,
                'code'      => 417
            ]);
        }
        if(JWTAuth::user()->id == $id || JWTAuth::user()->roles[0]->name == 'quan_tri_vien' || JWTAuth::user()->roles[0]->name == 'supper_admin')
        {
    //   $quantrivien = quan_tri_vien::where('id',$req->id);
        $nguoiDung = nguoi_dung::find($id);
      if(empty($nguoiDung)){
        return response()->json([
            'message'   => 'Không tìm thấy người dùng tương ứng',
            'code'      => 404
        ]);
      }
      if (isset($req->ten) && !empty($req->ten)) {
        if ($req->ten != $nguoiDung->ten) {
            $existsTen = nguoi_dung::whereTen($req->ten)
                               ->first();
            if (!empty($existsTen)) {
                return response()->json([
                    'message_vn'    => 'Tên đã tồn tại',
                    'message_en'    => 'Name already exists',
                    'code'          => 417
                ]);
            }
        }
         $nguoiDung->ten =$req->ten;
    }
    if(isset($req->tai_khoan) && !empty($req->tai_khoan)){
        if($req->tai_khoan !=$nguoiDung->tai_khoan){
            $existsTaiKhoan=nguoi_dung::whereTaiKhoan($req->tai_khoan)
                                ->first();
            if(!empty($existsTaiKhoan)){
                return response()->json([
                'message_vn'    => 'Tên tài khoản đã tồn tại',
                 'message_en'    => 'Name account already exists',
                'code'          => 417
                ]);
            }
        }
         $nguoiDung->tai_khoan=$req->tai_khoan;
    }
        $nguoiDung->save();
      return response()->json([
        'message_vn'    => 'Cập nhật thành công',
        'message_en'    => 'Update successful',
        'code'=>200,
        'date'=>$nguoiDung
    ]);
        }
        return response()->json([
            'message'   => 'Bạn không thể thực hiện chức năng này',
            'code'      => 403
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
