<?php

use Illuminate\Database\Seeder;

class KieuPhimSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kieu_phims')->insert([
        	['kieu_phim'=>'Phim Bộ'],['kieu_phim'=>'Phim lẻ']
        ]);
    }
}
