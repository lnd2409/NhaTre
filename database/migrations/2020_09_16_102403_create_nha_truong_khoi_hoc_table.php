<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNhaTruongKhoiHocTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhatruong_khoihoc', function (Blueprint $table) {
            $table->bigInteger('nt_id')->unsigned();
            $table->bigInteger('kh_id')->unsigned();
            $table->primary(['nt_id','kh_id']);
            $table->foreign('nt_id')->references('nt_id')->on('nhatruong')->onDelete('cascade');
            $table->foreign('kh_id')->references('kh_id')->on('khoihoc')->onDelete('cascade');
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
        Schema::dropIfExists('nhatruong_khoihoc');
    }
}
