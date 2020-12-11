<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChiTietLichHoatDongTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietlichhoatdong', function (Blueprint $table) {
            $table->bigIncrements('ctlhd_id');
            $table->string('ctlhd_giobatdau')->nullable();
            $table->string('ctlhd_gioketthuc')->nullable();
            $table->bigInteger('lhd_id')->unsigned();
            $table->foreign('lhd_id')->references('lhd_id')->on('lichhoatdong')->onDelete('cascade');
            $table->bigInteger('mh_id')->unsigned();
            $table->foreign('mh_id')->references('mh_id')->on('monhoc')->onDelete('cascade');
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
        Schema::dropIfExists('chitietlichhoatdong');
    }
}
