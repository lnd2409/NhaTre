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
            $table->integer('hs_gioitinh')->comment("1 là nam ; 0 là nữ");
            $table->integer('hs_trangthaitienhoc')->nullable();
            $table->string('hs_avata')->nullable();
            $table->bigInteger('lh_id')->unsigned()->nullable();
            $table->foreign('lh_id')->references('lh_id')->on('lophoc');
            $table->bigInteger('ph_id')->unsigned()->nullable();
            $table->foreign('ph_id')->references('ph_id')->on('phuhuynh');
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
