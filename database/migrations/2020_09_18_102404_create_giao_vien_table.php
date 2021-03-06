<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiaoVienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giaovien', function (Blueprint $table) {
            $table->bigIncrements('gv_id');
            $table->string('username');
            $table->string('password')->default(Hash::make(123));
            $table->string('gv_ten');
            $table->string('gv_diachi');
            $table->string('gv_sdt');
            $table->string('gv_ngaysinh');
            $table->integer('gv_gioitinh')->comment('1 là Nam 0 là Nữ');
            $table->string('gv_avata')->nullable();
            $table->integer('gv_trangthai')->default(1);
            $table->string('gv_bangcap');
            $table->bigInteger('nt_id')->unsigned();
            $table->foreign('nt_id')->references('nt_id')->on('nhatruong_khoihoc')->onDelete('cascade');
            $table->bigInteger('lh_id')->unsigned()->nullable();
            $table->foreign('lh_id')->references('lh_id')->on('lophoc')->onDelete('cascade');
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
        Schema::dropIfExists('giaovien');
    }
}
