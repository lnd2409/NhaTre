<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLichHoatDongTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lichhoatdong', function (Blueprint $table) {
            $table->bigIncrements('lhd_id');
            $table->date('lhd_ngayapdung');
            $table->bigInteger('lh_id')->unsigned();
            $table->foreign('lh_id')->references('lh_id')->on('lophoc')->onDelete('cascade');
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
        Schema::dropIfExists('lichhoatdong');
    }
}
