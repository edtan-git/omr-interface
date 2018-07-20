<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMetaJawabanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meta_jawaban', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedMediumInteger( 'nomor_soal' );
            $table->unsignedTinyInteger( 'skor_salah' );
            $table->unsignedTinyInteger( 'skor_benar' );
            $table->unsignedTinyInteger( 'skor_kosong' );
            $table->unsignedTinyInteger( 'index_jawaban' );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meta_jawaban');
    }
}
