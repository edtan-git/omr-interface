<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePilihanNomorSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pilihan_nomor_siswa', function (Blueprint $table) {
            $table->increments('id');
            $table->integer( 'id_ekstraksi' )->unsigned();

            $table->tinyInteger( 'index_pilihan' )->unsigned();
            $table->datetime( 'created_at' )->nullable();
        });

        Schema::table( 'pilihan_nomor_siswa', function ( Blueprint $table ){
            $table->foreign( 'id_ekstraksi' )->references( 'id' )->on( 'ekstraksi' );
        });

        Schema::create('pilihan_nomor_siswa_detail', function (Blueprint $table){
            $table->increments('id');
            $table->integer( 'id_pilihan_nomor_siswa' )->unsigned();

            $table->tinyInteger( 'index_opsi_terpilih' )->unsigned();
            $table->datetime( 'created_at' )->nullable();
        });

        Schema::table( 'pilihan_nomor_siswa_detail', function ( Blueprint $table ){
            $table->foreign( 'id_pilihan_nomor_siswa' )->references( 'id' )->on( 'pilihan_nomor_siswa' );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pilihan_nomor_siswa_detail');
        Schema::dropIfExists('pilihan_nomor_siswa');
    }
}
