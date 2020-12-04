<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChiTietDonXinPhep extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietdonxinphep', function (Blueprint $table) {
            $table->bigInteger('dxp_id')->unsigned();
            $table->foreign('dxp_id')->references('dxp_id')->on('donxinphep')->onDelete('cascade');
            $table->bigInteger('hs_id')->unsigned();
            $table->foreign('hs_id')->references('hs_id')->on('hocsinh')->onDelete('cascade');
            $table->date('ctdxp_ngay');
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
        Schema::dropIfExists('chitietdonxinphep');
    }
}
