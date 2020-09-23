<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLopHocTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lophoc', function (Blueprint $table) {
            $table->bigIncrements('lh_id');
            $table->string('lh_tenlop');
            $table->bigInteger('nt_id')->unsigned();
            $table->bigInteger('kh_id')->unsigned();
            $table->bigInteger('hknh_id')->unsigned();
            $table->foreign('nt_id')->references('nt_id')->on('nhatruong_khoihoc')->onDelete('cascade');
            $table->foreign('kh_id')->references('kh_id')->on('nhatruong_khoihoc')->onDelete('cascade');
            $table->foreign('hknh_id')->references('hknh_id')->on('hocky_namhoc')->onDelete('cascade');
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
        Schema::dropIfExists('lophoc');
    }
}
