<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePilihanJawabanDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pilihan_jawaban_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer( 'id_pilihan_jawaban' )->unsigned();

            $table->tinyInteger( 'index_opsi_terpilih' )->unsigned();
            $table->datetime( 'created_at' )->nullable();
        });

        Schema::table( 'pilihan_jawaban_detail', function ( Blueprint $table ){
            $table->foreign( 'id_pilihan_jawaban' )->references( 'id' )->on( 'pilihan_jawaban' );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pilihan_jawaban_detail');
    }
}
