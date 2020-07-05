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
        	['ten'=>'Phim kinh dị'],['ten'=>'Song hổn']
        ]);
    }
}
