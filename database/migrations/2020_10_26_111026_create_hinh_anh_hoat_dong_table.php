<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHinhAnhHoatDongTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hinhanhhoatdong', function (Blueprint $table) {
            $table->bigIncrements('hahd_id');
            $table->string('hahd_duongdan');
            $table->bigInteger('ctlhd_id')->unsigned();
            $table->foreign('ctlhd_id')->references('ctlhd_id')->on('chitietlichhoatdong')->onDelete('cascade');
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
        Schema::dropIfExists('hinhanhhoatdong');
    }
}
