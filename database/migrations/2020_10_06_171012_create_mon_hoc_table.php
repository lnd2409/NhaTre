<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMonHocTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monhoc', function (Blueprint $table) {
            $table->bigIncrements('mh_id');
            $table->string('mh_tenmon');
            $table->text('mh_mota');
            $table->bigInteger('nt_id')->unsigned();
            $table->foreign('nt_id')->references('nt_id')->on('nhatruong')->onDelete('cascade');
            $table->bigInteger('hknh_id')->unsigned();
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
        Schema::dropIfExists('monhoc');
    }
}
