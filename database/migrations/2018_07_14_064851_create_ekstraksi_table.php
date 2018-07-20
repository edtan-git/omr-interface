<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEkstraksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'ekstraksi', function (Blueprint $table) {
            $table->increments( 'id' );
            $table->integer( 'id_gambar' )->unsigned();
            $table->string( 'nama', 20 );
            $table->string( 'nomor_siswa', 10 );
            $table->date( 'tanggal_lahir' );
            $table->string( 'paket_soal', 4 );
            $table->double( 'skor' );
            
            $table->datetime( 'created_at' )->nullable();
            $table->datetime( 'finished_at' )->nullable();
        });

        Schema::table( 'ekstraksi', function( Blueprint $table ){
            $table->foreign( 'id_gambar' )->references( 'id' )->on( 'gambar' );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists( 'ekstraksi' );
    }
}
