<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoDoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sodo', function (Blueprint $table) {
            $table->bigIncrements('sd_id');
            $table->float('sd_chieucao');
            $table->float('sd_cannang');
            $table->bigInteger('sbn_id')->unsigned();
            $table->foreign('sbn_id')->references('sbn_id')->on('sobengoan')->onDelete('cascade');
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
        Schema::dropIfExists('sodo');
    }
}
