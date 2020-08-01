<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
        	LoaiPhimSeeder::class,
        	NguoiDungSeeder::class,
            PhimSeeder::class,
            ChiTietDienVienSeeder::class,
            DienVienSeeder::class,
            QuocGiaSeeder::class,
            KieuPhimSeeder::class,
            RolesAndPermissionsSeeder::class,
            SupperAdminSeeder::class,
        ]);
    }
}
