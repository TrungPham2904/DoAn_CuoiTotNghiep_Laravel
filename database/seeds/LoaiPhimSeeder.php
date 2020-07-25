<?php

use Illuminate\Database\Seeder;

class LoaiPhimSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('loai_phims')->insert([
        	['the_loai_phim'=>'Phim kinh dị'],['the_loai_phim'=>'Song hổn']
        ]);
    }
}
