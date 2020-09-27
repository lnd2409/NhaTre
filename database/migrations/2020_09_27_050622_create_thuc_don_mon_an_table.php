<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThucDonMonAnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thucdon_monan', function (Blueprint $table) {
            // $table->bigIncrements('id');
            $table->bigInteger('ma_id')->unsigned();
            $table->bigInteger('td_id')->unsigned();
            $table->primary(['td_id','ma_id']);
            $table->foreign('ma_id')->references('ma_id')->on('monan')->onDelete('cascade');
            $table->foreign('td_id')->references('td_id')->on('thucdon')->onDelete('cascade');
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
        Schema::dropIfExists('thucdon_monan');
    }
}
