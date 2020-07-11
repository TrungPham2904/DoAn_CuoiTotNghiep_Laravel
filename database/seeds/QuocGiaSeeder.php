<?php

use Illuminate\Database\Seeder;

class QuocGiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('quoc_gias')->insert([
        	['ten'=>'Việt Nam']
        ]);
    }
}
