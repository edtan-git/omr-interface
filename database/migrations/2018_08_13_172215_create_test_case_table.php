<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestCaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_case', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_meta_lik')->unsigned()->nullable();
            $table->string('nama');
            $table->string('nomor_siswa');
            $table->date('tanggal_lahir');
            $table->string('paket_soal');
            $table->timestamps();
        });

        Schema::create('test_case_answer', function( Blueprint $table ){
            $table->increments('id');
            $table->integer('id_test_case')->unsigned();
            $table->integer('nomor_soal')->unsigned();
            $table->timestamps();

            $table->foreign('id_test_case')->references('id')->on('test_case');
        });

        Schema::create('test_case_answer_detail', function( Blueprint $table ){
            $table->increments('id');
            $table->integer('id_test_case_answer')->unsigned();
            $table->timestamps();

            $table->foreign('id_test_case_answer')->references('id')->on('test_case_answer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('test_case_answer_detail');
        Schema::dropIfExists('test_case_answer');
        Schema::dropIfExists('test_case');
    }
}
