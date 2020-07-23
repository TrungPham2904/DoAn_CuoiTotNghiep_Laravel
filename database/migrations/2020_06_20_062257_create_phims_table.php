<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phims', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten_phim')->nullable();
            $table->string('poster')->nullable();
            $table->string('loai_phim_id')->nullable();
            $table->string('quoc_gia_id')->nullable();
            $table->string('kieu_phim_id')->nullable();
            $table->string('thoi_luong')->nullable();
            $table->string('trailer')->nullable();
            $table->string('dien_vien')->nullable();
            $table->string('dao_dien')->nullable();
            $table->string('link_server')->nullable();
            $table->string('link_trailer')->nullable(); 
            $table->string('nam_san_xuat')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phims');
    }
}
