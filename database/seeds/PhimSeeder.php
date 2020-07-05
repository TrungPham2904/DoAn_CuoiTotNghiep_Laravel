<?php

use Illuminate\Database\Seeder;

class PhimSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('phims')->insert([
        	['ten_phim'=>'Linh hồn quỷ dữ',
        	'loai_phim_id'=>1,
        	'quoc_gia_id'=>1,
        	'thoi_luong'=>60,
        	'dien_vien'=>'Văn Thịnh']
        ]);
    }
}
