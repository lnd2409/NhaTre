<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhuHuynhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phuhuynh', function (Blueprint $table) {
            $table->bigIncrements('ph_id');
            $table->string('ph_hoten');
            $table->string('username');
            $table->string('password')->default(Hash::make(123));
            $table->date('ph_ngaysinh');
            $table->string('ph_nghenghiep');
            $table->string('ph_sdt');
            $table->string('ph_diachi');
            $table->string('ph_avata');
            $table->integer('ph_gioitinh');
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
        Schema::dropIfExists('phuhuynh');
    }
}
