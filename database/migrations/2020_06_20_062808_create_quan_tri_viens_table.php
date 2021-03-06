<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuanTriViensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quan_tri_viens', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten')->nullable();
            $table->string('tai_khoan')->nullable();
            $table->string('mat_khau')->nullable();
            $table->string('email')->nullable();
            $table->string('fb_token')->nullable();
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
        Schema::dropIfExists('quan_tri_viens');
    }
}
