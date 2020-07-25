<?php

use Illuminate\Database\Seeder;

class ChiTietDienVienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('chi_tiet_dien_viens')->insert([
        	['phim_id' => '1',
            'dien_vien_id' => '1'
            ]
        ]);
    }
}
