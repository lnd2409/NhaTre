<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHocKyNamHocTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hocky_namhoc', function (Blueprint $table) {
            $table->bigIncrements('hknh_id');
            $table->string('namhoc');
            $table->string('hocky');
            $table->integer('trangthai');
            $table->bigInteger('nt_id')->unsigned();
            $table->foreign('nt_id')->references('nt_id')->on('nhatruong')->onDelete('cascade');
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
        Schema::dropIfExists('hocky_namhoc');
    }
}
