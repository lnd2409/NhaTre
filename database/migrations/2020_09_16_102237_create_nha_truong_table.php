<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNhaTruongTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhatruong', function (Blueprint $table) {
            $table->bigIncrements('nt_id');
            $table->string('nt_tentruong', 150);
            $table->string('nt_diachi', 150);
            $table->string('nt_thanhpho');
            $table->string('nt_sodienthoai', 150);
            $table->string('nt_email', 150);
            $table->string('username', 150);
            $table->string('password', 150);
            $table->string('nt_anhdaidien')->nullable();
            $table->text('nt_khauhieu')->nullable();
            $table->text('nt_gioithieubangiamhieu')->nullable();
            $table->text('nt_gioithieugiaovien')->nullable();
            $table->text('nt_gioithieucosovatchat')->nullable();
            $table->text('nt_gioithieuchung')->nullable();
            $table->integer('nt_trangthai')->unsigned()->default(0);
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
        Schema::dropIfExists('nhatruong');
    }
}
