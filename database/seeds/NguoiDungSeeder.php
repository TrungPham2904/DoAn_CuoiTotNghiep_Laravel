<?php

use Illuminate\Database\Seeder;
class NguoiDungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nguoi_dungs')->insert([
        	['ten' => 'TrungPham',
        	'tai_khoan' => 'trung',
        	'mat_khau' => Hash::make('123'),
        	'email' => 'khactrung123@gmail.com',
        	'fb_token' => 'trungpham']       	
        ]);
    }
}
