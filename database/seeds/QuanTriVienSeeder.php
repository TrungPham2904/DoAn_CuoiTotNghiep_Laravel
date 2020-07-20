<?php

use Illuminate\Database\Seeder;

class QuanTriVienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('quan_tri_viens')->insert([
            ['ten' => 'TrungNhaBe',
        	'tai_khoan' => 'TrungPro',
        	'mat_khau' => Hash::make('123'),
        	'email' => 'khactrung1999@gmail.com',
        	'fb_token' => 'NhaBe'] 
        ]);
    }
}
