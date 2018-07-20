<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePilihanPaketSoalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pilihan_paket_soal', function (Blueprint $table) {
            $table->increments('id');
            $table->integer( 'id_ekstraksi' )->unsigned();

            $table->tinyInteger( 'index_pilihan' )->unsigned();
            $table->datetime( 'created_at' )->nullable();
        });

        Schema::table( 'pilihan_paket_soal', function ( Blueprint $table ){
            $table->foreign( 'id_ekstraksi' )->references( 'id' )->on( 'ekstraksi' );
        });

        Schema::create( 'pilihan_paket_soal_detail', function ( Blueprint $table ){
            $table->increments( 'id' );
            $table->integer( 'id_pilihan_paket_soal' )->unsigned();

            $table->tinyInteger( 'index_opsi_terpilih' )->unsigned();
            $table->datetime( 'created_at' )->nullable();
        });

        Schema::table( 'pilihan_paket_soal_detail', function ( Blueprint $table ){
            $table->foreign( 'id_pilihan_paket_soal' )->references( 'id' )->on( 'pilihan_paket_soal' );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pilihan_paket_soal_detail');
        Schema::dropIfExists('pilihan_paket_soal');
    }
}
