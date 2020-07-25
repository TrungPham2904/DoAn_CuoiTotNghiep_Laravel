<?php

use Illuminate\Database\Seeder;

class DienVienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dien_viens')->insert([
        	['ten_dien_vien' => 'Drame',
        	'nam_sinh' => '1992',
        	'gioi_tinh' => 'Nam',
            'quoc_tich' => 'Mỹ']
        ]);
    }
}
