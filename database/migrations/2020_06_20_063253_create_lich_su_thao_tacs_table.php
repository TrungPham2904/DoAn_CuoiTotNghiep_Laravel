<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLichSuThaoTacsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lich_su_thao_tacs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nguoi_dung_id')->nullable();
            $table->string('chuc_nang')->nullable();
            $table->string('thoi_gian')->nullable();
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
        Schema::dropIfExists('lich_su_thao_tacs');
    }
}
