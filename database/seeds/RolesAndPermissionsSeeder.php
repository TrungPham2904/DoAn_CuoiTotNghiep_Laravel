<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        
        Permission::findOrCreate('xem_tai', 'nguoiDung');
        
        
        Permission::findOrCreate('qtv_xem_tai', 'quanTriVien');
        Permission::findOrCreate('qtv_them_xoa_sua_phim', 'quanTriVien');
        Permission::findOrCreate('qtv_them_xoa_sua_nguoidung', 'quanTriVien');
        Permission::findOrCreate('quanTriVien', 'quanTriVien');
        

        Role::findOrCreate('nguoi_dung', 'nguoiDung');
        Role::findOrCreate('quan_tri_vien', 'quanTriVien');
        Role::findOrCreate('supper_admin', 'quanTriVien');

        $roleQuanTriVien = Role::findByName('quan_tri_vien', 'quanTriVien')
                               ->givePermissionTo([
                                   'qtv_xem_tai',
                                   'qtv_them_xoa_sua_phim',
                                   'qtv_them_xoa_sua_nguoidung',
                               ]);
        $roleNguoiDung = Role::findByName('nguoi_dung', 'nguoiDung')
                             ->givePermissionTo([
                                 'xem_tai'
                             ]);
        $roleNguoiDung = Role::findByName('supper_admin', 'quanTriVien')
                             ->givePermissionTo([
                                'qtv_xem_tai',
                                'qtv_them_xoa_sua_phim',
                                'qtv_them_xoa_sua_nguoidung',
                                'quanTriVien',

                             ]);
    }
}
