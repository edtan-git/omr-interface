<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePilihanTanggalLahirTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pilihan_tanggal_lahir', function (Blueprint $table) {
            $table->increments('id');
            $table->integer( 'id_ekstraksi' )->unsigned();

            $table->tinyInteger( 'index_pilihan' )->unsigned();
            $table->datetime( 'created_at' )->nullable();
        });

        Schema::table( 'pilihan_tanggal_lahir', function ( Blueprint $table ){
            $table->foreign( 'id_ekstraksi' )->references( 'id' )->on( 'ekstraksi' );
        });

        Schema::create('pilihan_tanggal_lahir_detail', function (Blueprint $table){
            $table->increments('id');
            $table->integer( 'id_pilihan_tanggal_lahir' )->unsigned();

            $table->tinyInteger( 'index_opsi_terpilih' )->unsigned();
            $table->datetime( 'created_at' )->nullable();
        });

        Schema::table( 'pilihan_tanggal_lahir_detail', function (Blueprint $table){
            $table->foreign( 'id_pilihan_tanggal_lahir' )->references( 'id' )->on( 'pilihan_tanggal_lahir' );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pilihan_tanggal_lahir_detail');
        Schema::dropIfExists('pilihan_tanggal_lahir');
    }
}
