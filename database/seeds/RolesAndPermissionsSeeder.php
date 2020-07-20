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
        Permission::findOrCreate('toan_quyen', 'quanTriVien');
        
        Role::findOrCreate('nguoi_dung', 'nguoiDung');
        Role::findOrCreate('quan_tri_vien', 'quanTriVien');

        $roleQuanTriVien = Role::findByName('quan_tri_vien', 'quanTriVien')
                               ->givePermissionTo([
                                   'toan_quyen'
                               ]);
        $roleNguoiDung = Role::findByName('nguoi_dung', 'nguoiDung')
                             ->givePermissionTo([
                                 'xem_tai'
                             ]);
    }
}
