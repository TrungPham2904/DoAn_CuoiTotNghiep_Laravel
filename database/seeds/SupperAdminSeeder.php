<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\quan_tri_vien;
class SupperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $role = Role::findByName('supper_admin', 'quanTriVien');
            quan_tri_vien::firstOrCreate([
                    'email'     => 'supperadmin@gmail.com',
                    
                 ])
                 ->assignRole($role->name)
                 ->givePermissionTo([
                  'qtv_xem_tai',
                  'qtv_them_xoa_sua_phim',
                  'qtv_them_xoa_sua_nguoidung',
                  'quanTriVien',
                 ])
                 ->update([
                    'mat_khau'  => Hash::make('admin@123'),
                    'ten'      => 'Supper Admin',
                    'tai_khoan' => 'Supper-Admin'
                 ]);
                
    }
}
