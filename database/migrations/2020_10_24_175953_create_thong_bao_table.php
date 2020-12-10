<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThongBaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thongbao', function (Blueprint $table) {
            $table->bigIncrements('tb_id');
            $table->string('tb_tieude');
            $table->text('tb_noidung');
            $table->date('tb_ngayviet');
            // $table->date('tb_ngayviet')->nullable()->default(new DateTime());
            $table->string('tb_nguoinhan');
            $table->bigInteger('gv_id')->unsigned()->nullable();
            $table->foreign('gv_id')->references('gv_id')->on('giaovien');
            $table->bigInteger('nt_id')->unsigned()->nullable();
            $table->foreign('nt_id')->references('nt_id')->on('nhatruong');
            $table->bigInteger('ph_id')->unsigned()->nullable();
            $table->foreign('ph_id')->references('ph_id')->on('phuhuynh');
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
        Schema::dropIfExists('thongbao');
    }
}
