<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiemDanhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diemdanh', function (Blueprint $table) {
            $table->bigIncrements('dd_id');
            $table->date('dd_ngay');
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
        Schema::dropIfExists('diemdanh');
    }
}
