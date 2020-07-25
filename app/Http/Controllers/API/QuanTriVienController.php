<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Spatie\Permission\Models\Role;
use App\quan_tri_vien;
use App\nguoi_dung;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Admin\AddNewRequest;
use App\Http\Requests\Admin\UpdateRequest;
use Illuminate\Support\Facades\Validator;


class QuanTriVienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        $limit=20;
        if(isset($req->limit) && !empty($req->limit)){
            $limit=$req->limit;
        }
        $listDanhSachQuanTriVien = quan_tri_vien::where('id','>',1);
        if(!empty($req->ten))
        {
            $listDanhSachQuanTriVien->where('ten','<>','SupperAdmin')
                                    ->where('ten','like','%' .$req->ten. '%');    
        }
        if(!empty($req->tai_khoan))
        {
            $listDanhSachQuanTriVien->where('tai_khoan','<>','Supper-Admin')
                                    ->where('tai_khoan','like','%' .$req->tai_khoan. '%');
        }
        if(!empty($req->email))
        {
            $listDanhSachQuanTriVien->where('email','<>','supperadmin@gmail.com')
                                    ->where('email','like','%' .$req->email. '%');
        }
        if(!empty($req->fb_token))
        {
            $listDanhSachQuanTriVien->where('fb_token',$req->fb_token);
        }
        $listDanhSachQuanTriVien->orderBy('ten');
        $data=$listDanhSachQuanTriVien->paginate($limit);

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
        $existsEmail = quan_tri_vien::whereEmail($email)
                            ->first();
        if (!empty($existsEmail)) {
            return response()->json([
                'message_vn'    => 'Email đã tồn tại',
                'message_en'    => 'Email already exists',
                'code'          => 417
            ]);
        }
        $role = Role::findByName('quan_tri_vien', 'quanTriVien');
        $quantrivien = new quan_tri_vien;
        $quantrivien->ten =$req->ten;
        $quantrivien->tai_khoan=$req->tai_khoan;
        $quantrivien->mat_khau=Hash::make($req->mat_khau);
        $quantrivien->email=$email;
        $quantrivien->fb_token=$req->fb_token;
        $quantrivien->save();
        $quantrivien->assignRole($role->name)
                    ->givePermissionTo([
                        'qtv_xem_tai',
                        'qtv_them_xoa_sua_phim',
                        'qtv_them_xoa_sua_nguoidung',
                    ]);
        return response()->json([
            'message_vn'    => 'Thêm thành công',
            'message_en'    => 'Add successful',
            'code'          => 200,
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
        if (JWTAuth::user()->id == $id || JWTAuth::user()->roles[0]->name == 'supper_admin' ) {
            $quanTriVien = quan_tri_vien::find($id);
            if(empty($quanTriVien)){
                return response()->json([
                    'message_vn'   => 'Không tìm thấy thông tin quản trị viên tương ứng',
                    'message_en'    => 'No admin information found',
                    'code'      => 404
                ]);
            }
            return response()->json([
                'message_vn'   => 'Lấy chi tiết thông tin quản trị viên thành công!',
                'message_en'    => 'Get the detail information of successful',
                'code'      => 200,
                'data'      => $quanTriVien
            ]);
        }
        return response()->json([
            'message_vn'   => 'Bạn không thể thực hiện chức năng này',
            'message_en'    => 'User incorrect',
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
    public function update(Request $req,$id)
    {
        
        if(JWTAuth::user()->id == $id || JWTAuth::user()->roles[0]->name == 'supper_admin')
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
    //   $quantrivien = quan_tri_vien::where('id',$req->id);
        $quantrivien = quan_tri_vien::find($id);
      if(empty($quantrivien)){
        return response()->json([
            'message'   => 'Không tìm thấy thông tin quản trị viên tương ứng',
            'code'      => 404
        ]);
      }
      if (isset($req->ten) && !empty($req->ten)) {
        if ($req->ten != $quantrivien->ten) {
            $existsTen = quan_tri_vien::whereTen($req->ten)
                               ->first();
            if (!empty($existsTen)) {
                return response()->json([
                    'message_vn'    => 'Tên đã tồn tại',
                    'message_en'    => 'Name already exists',
                    'code'          => 417
                ]);
            }
        }
         $quantrivien->ten =$req->ten;
    }
    if(isset($req->tai_khoan) && !empty($req->tai_khoan)){
        if($req->tai_khoan !=$quantrivien->tai_khoan){
            $existsTaiKhoan=quan_tri_vien::whereTaiKhoan($req->tai_khoan)
                                ->first();
            if(!empty($existsTaiKhoan)){
                return response()->json([
                'message_vn'    => 'Tên tài khoản đã tồn tại',
                 'message_en'    => 'Name account already exists',
                'code'          => 417
                ]);
            }
        }
         $quantrivien->tai_khoan=$req->tai_khoan;
    }
        $quantrivien->save();
      return response()->json([
        'message_vn'    => 'Cập nhật thành công',
        'message_en'    => 'Update successful',
        'code'=>200,
        'date'=>$quantrivien
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
