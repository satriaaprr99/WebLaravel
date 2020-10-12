<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTagihan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tagihan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kd_tagihan');
            $table->string('jenis_tagihan');
            $table->string('tahun');
            $table->integer('nominal');
            $table->bigInteger('id_siswa')->unsigned();
            $table->foreign('id_siswa')->references('id')->on('siswa')->onDelete('cascade');
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
        Schema::dropIfExists('tagihan');
    }
}
