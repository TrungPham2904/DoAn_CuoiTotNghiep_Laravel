<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDienViensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dien_viens', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten');
            $table->string('nam_sinh');
            $table->string('gioi_tinh');
            $table->integer('chieu_cao');
            $table->string('quoc_tich');
            $table->string('tieu_su');
            $table->string('anh_dai_dien'); 
            $table->timestamps(); 
            $table->softDeletes(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dien_viens');
    }
}
