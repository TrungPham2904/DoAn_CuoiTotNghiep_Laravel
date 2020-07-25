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
            $table->string('ten_dien_vien')->nullable();
            $table->string('nam_sinh')->nullable();
            $table->string('gioi_tinh')->nullable();
            $table->integer('chieu_cao')->nullable();
            $table->string('quoc_tich')->nullable();
            $table->string('tieu_su')->nullable();
            $table->string('anh_dai_dien')->nullable(); 
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
