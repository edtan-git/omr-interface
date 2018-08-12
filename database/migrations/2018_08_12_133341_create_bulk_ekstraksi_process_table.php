<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBulkEkstraksiProcessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bulk_ekstraksi_process', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_gambar')->unsigned();
            $table->boolean('status_sukses')->default(0);
            $table->boolean('status_coba')->default(0);

            $table->foreign('id_gambar')->references('id')->on('gambar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bulk_ekstraksi_process');
    }
}
