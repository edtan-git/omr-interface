<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Models\MetaLikDetail;

class InsertDataToMetaLik2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        MetaLikDetail::insert([
            [
                'id_meta_lik' => 3,
                'nama' => 'NAME',
                'mulai_koordinat_x' => 596,
                'mulai_koordinat_y' => 921,
                'akhir_koordinat_x' => 1351,
                'akhir_koordinat_y' => 1816,
                'jumlah_lingkaran' => 520
            ],
            [
                'id_meta_lik' => 3,
                'nama' => 'STUDENT_NUMBER',
                'mulai_koordinat_x' => 85,
                'mulai_koordinat_y' => 916,
                'akhir_koordinat_x' => 543,
                'akhir_koordinat_y' => 1267,
                'jumlah_lingkaran' => 90
            ],
            [
                'id_meta_lik' => 3,
                'nama' => 'DATE_OF_BIRTH',
                'mulai_koordinat_x' => 86,
                'mulai_koordinat_y' => 1347,
                'akhir_koordinat_x' => 316,
                'akhir_koordinat_y' => 1699,
                'jumlah_lingkaran' => 46
            ],
            [
                'id_meta_lik' => 3,
                'nama' => 'ANSWER',
                'mulai_koordinat_x' => -11,
                'mulai_koordinat_y' => 400,
                'akhir_koordinat_x' => 1437,
                'akhir_koordinat_y' => 808,
                'jumlah_lingkaran' => 250
            ],
            [
                'id_meta_lik' => 4,
                'nama' => 'NAME',
                'mulai_koordinat_x' => 596,
                'mulai_koordinat_y' => 479,
                'akhir_koordinat_x' => 1349,
                'akhir_koordinat_y' => 1370,
                'jumlah_lingkaran' => 520
            ],
            [
                'id_meta_lik' => 4,
                'nama' => 'STUDENT_NUMBER',
                'mulai_koordinat_x' => 86,
                'mulai_koordinat_y' => 479,
                'akhir_koordinat_x' => 538,
                'akhir_koordinat_y' => 825,
                'jumlah_lingkaran' => 90
            ],
            [
                'id_meta_lik' => 4,
                'nama' => 'DATE_OF_BIRTH',
                'mulai_koordinat_x' => 88,
                'mulai_koordinat_y' => 951,
                'akhir_koordinat_x' => 315,
                'akhir_koordinat_y' => 1297,
                'jumlah_lingkaran' => 46
            ],
            [
                'id_meta_lik' => 4,
                'nama' => 'ANSWER',
                'mulai_koordinat_x' => -8,
                'mulai_koordinat_y' => 1405,
                'akhir_koordinat_x' => 1421,
                'akhir_koordinat_y' => 1821,
                'jumlah_lingkaran' => 250
            ]
        ]);
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
