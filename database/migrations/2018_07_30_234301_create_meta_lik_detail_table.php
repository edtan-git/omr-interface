<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMetaLikDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meta_lik_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer( 'id_meta_lik' )->unsigned();
            $table->string( 'nama' );
            $table->integer( 'mulai_koordinat_x' );
            $table->integer( 'mulai_koordinat_y' );
            $table->integer( 'akhir_koordinat_x' );
            $table->integer( 'akhir_koordinat_y' );
            $table->integer( 'jumlah_lingkaran' );

            $table->timestamps();
        });

        Schema::table( 'meta_lik_detail', function(Blueprint $table){
            $table->foreign( 'id_meta_lik' )->references( 'id' )->on( 'meta_lik' );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meta_lik_detail');
    }
}
