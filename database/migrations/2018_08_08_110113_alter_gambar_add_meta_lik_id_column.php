<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterGambarAddMetaLikIdColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if ( !Schema::hasColumn('gambar', 'meta_lik_id') )
            Schema::table( 'gambar', function( Blueprint $table ){
                $table->integer( 'meta_lik_id' )->unsigned()->nullable()->after('id');

                $table->foreign( 'meta_lik_id' )->references( 'id' )->on( 'meta_lik' );
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
