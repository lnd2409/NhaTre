<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChiTietDiemDanhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietdiemdanh', function (Blueprint $table) {
            // $table->bigIncrements('id');
            $table->bigInteger('dd_id')->unsigned();
            $table->foreign('dd_id')->references('dd_id')->on('diemdanh')->onDelete('cascade');
            $table->bigInteger('hs_id')->unsigned();
            $table->foreign('hs_id')->references('hs_id')->on('hocsinh')->onDelete('cascade');
            $table->text('ctdd_lydo')->nullable();
            $table->string('ctdd_giovaolop')->nullable();
            $table->string('ctdd_giorave')->nullable();
            $table->integer('ctdd_trangthai');
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
        Schema::dropIfExists('chitietdiemdanh');
    }
}
