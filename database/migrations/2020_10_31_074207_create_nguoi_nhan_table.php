<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNguoiNhanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nguoinhan', function (Blueprint $table) {
            $table->bigInteger('tb_id')->unsigned();
            $table->foreign('tb_id')->references('tb_id')->on('thongbao')->onDelete('cascade');
            $table->integer('nn_id');
            $table->integer('nn_trangthai');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nguoinhan');
    }
}
