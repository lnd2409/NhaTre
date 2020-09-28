<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHocSinhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hocsinh', function (Blueprint $table) {
            $table->bigIncrements('hs_id');
            $table->string('hs_hoten');
            $table->string('hs_noisinh');
            $table->date('hs_ngaysinh');
            $table->bigInteger('lh_id')->unsigned()->nullable();
            $table->foreign('lh_id')->references('lh_id')->on('lophoc');
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
        Schema::dropIfExists('hocsinh');
    }
}
