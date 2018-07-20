<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePilihanJawabanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pilihan_jawaban', function (Blueprint $table) {
            $table->increments('id');
            $table->integer( 'id_ekstraksi' )->unsigned();

            $table->tinyInteger( 'nomor_soal' )->unsigned();
            $table->datetime( 'created_at' )->nullable();
        });

        Schema::table( 'pilihan_jawaban', function ( Blueprint $table ){
            $table->foreign( 'id_ekstraksi' )->references( 'id' )->on( 'ekstraksi' );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pilihan_jawaban');
    }
}
