<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonXinPhepTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donxinphep', function (Blueprint $table) {
            $table->bigIncrements('dxp_id');
            $table->text('dxp_noidung');
            $table->integer('dxp_trangthai');
            $table->bigInteger('hs_id')->unsigned();
            $table->foreign('hs_id')->references('hs_id')->on('hocsinh')->onDelete('cascade');
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
        Schema::dropIfExists('donxinphep');
    }
}
