<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterPilihanJawabanDetailStatusKebenaranColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if ( !Schema::hasColumn('pilihan_jawaban_detail', 'status_kebenaran') )
            Schema::table('pilihan_jawaban_detail', function( Blueprint $table ){
                $table->boolean('status_kebenaran')->default(0)->after('index_opsi_terpilih');
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
