<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKunciJawabanDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kunci_jawaban_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_kunci_jawaban')->unsigned();
            $table->integer('nomor_soal')->unsigned();
            $table->integer('index_pilihan_benar')->unsigned();
            $table->timestamps();

            $table->foreign('id_kunci_jawaban')->references('id')->on('kunci_jawaban');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kunci_jawaban_detail');
    }
}
