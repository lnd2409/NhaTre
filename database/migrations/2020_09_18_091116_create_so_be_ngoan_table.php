<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoBeNgoanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sobengoan', function (Blueprint $table) {
            $table->bigIncrements('sbn_id');
            $table->string('sbn_ngayviet');
            $table->text('sbn_nhanxetchung');
            $table->string('sbn_suckhoe');
            $table->integer('sbn_hoctap');
            $table->integer('sbn_cannang');
            $table->integer('sbn_chieucao');
            $table->bigInteger('hs_id')->unsigned();
            $table->foreign('hs_id')->references('hs_id')->on('hocsinh')->onDelete('cascade');
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
        Schema::dropIfExists('sobengoan');
    }
}
