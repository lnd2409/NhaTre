<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMonAnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monan', function (Blueprint $table) {
            $table->bigIncrements('ma_id');
            $table->string('ma_ten',150);
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
        Schema::dropIfExists('monan');
    }
}
