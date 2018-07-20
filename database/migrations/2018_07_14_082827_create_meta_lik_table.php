<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMetaLikTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'meta_lik', function (Blueprint $table) {
            $table->increments( 'id' );
            $table->string( 'nama' );
            $table->unsignedMediumInteger( 'koordinat_x' );
            $table->unsignedMediumInteger( 'koordinat_y' );
            $table->tinyInteger( 'jumlah_lingkaran' )->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meta_lik');
    }
}
