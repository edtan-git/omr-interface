<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Models\MetaLikDetail;

class InsertDataToMetaLik3 extends Migration
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
                'id_meta_lik' => 5,
                'nama' => 'NAME',
                'mulai_koordinat_x' => 600,
                'mulai_koordinat_y' => 918,
                'akhir_koordinat_x' => 1351,
                'akhir_koordinat_y' => 1812,
                'jumlah_lingkaran' => 520
            ],
            [
                'id_meta_lik' => 5,
                'nama' => 'STUDENT_NUMBER',
                'mulai_koordinat_x' => 84,
                'mulai_koordinat_y' => 952,
                'akhir_koordinat_x' => 544,
                'akhir_koordinat_y' => 1304,
                'jumlah_lingkaran' => 90
            ],
            [
                'id_meta_lik' => 5,
                'nama' => 'DATE_OF_BIRTH',
                'mulai_koordinat_x' => 86,
                'mulai_koordinat_y' => 1425,
                'akhir_koordinat_x' => 318,
                'akhir_koordinat_y' => 1777,
                'jumlah_lingkaran' => 46
            ],
            [
                'id_meta_lik' => 5,
                'nama' => 'PACKAGE_NUMBER',
                'mulai_koordinat_x' => 402,
                'mulai_koordinat_y' => 1426,
                'akhir_koordinat_x' => 485,
                'akhir_koordinat_y' => 1774,
                'jumlah_lingkaran' => 20
            ],
            [
                'id_meta_lik' => 5,
                'nama' => 'ANSWER',
                'mulai_koordinat_x' => -1,
                'mulai_koordinat_y' => 367,
                'akhir_koordinat_x' => 1424,
                'akhir_koordinat_y' => 762,
                'jumlah_lingkaran' => 250
            ],
            [
                'id_meta_lik' => 6,
                'nama' => 'NAME',
                'mulai_koordinat_x' => 600,
                'mulai_koordinat_y' => 918,
                'akhir_koordinat_x' => 1351,
                'akhir_koordinat_y' => 1812,
                'jumlah_lingkaran' => 520
            ],
            [
                'id_meta_lik' => 6,
                'nama' => 'STUDENT_NUMBER',
                'mulai_koordinat_x' => 81,
                'mulai_koordinat_y' => 1423,
                'akhir_koordinat_x' => 541,
                'akhir_koordinat_y' => 1772,
                'jumlah_lingkaran' => 90
            ],
            [
                'id_meta_lik' => 6,
                'nama' => 'DATE_OF_BIRTH',
                'mulai_koordinat_x' => 82,
                'mulai_koordinat_y' => 943,
                'akhir_koordinat_x' => 315,
                'akhir_koordinat_y' => 1292,
                'jumlah_lingkaran' => 46
            ],
            [
                'id_meta_lik' => 6,
                'nama' => 'PACKAGE_NUMBER',
                'mulai_koordinat_x' => 400,
                'mulai_koordinat_y' => 945,
                'akhir_koordinat_x' => 480,
                'akhir_koordinat_y' => 1288,
                'jumlah_lingkaran' => 20
            ],
            [
                'id_meta_lik' => 6,
                'nama' => 'ANSWER',
                'mulai_koordinat_x' => -1,
                'mulai_koordinat_y' => 367,
                'akhir_koordinat_x' => 1424,
                'akhir_koordinat_y' => 762,
                'jumlah_lingkaran' => 250
            ],
            [
                'id_meta_lik' => 7,
                'nama' => 'NAME',
                'mulai_koordinat_x' => 598,
                'mulai_koordinat_y' => 481,
                'akhir_koordinat_x' => 1349,
                'akhir_koordinat_y' => 1370,
                'jumlah_lingkaran' => 520
            ],
            [
                'id_meta_lik' => 7,
                'nama' => 'STUDENT_NUMBER',
                'mulai_koordinat_x' => 88,
                'mulai_koordinat_y' => 480,
                'akhir_koordinat_x' => 538,
                'akhir_koordinat_y' => 825,
                'jumlah_lingkaran' => 90
            ],
            [
                'id_meta_lik' => 7,
                'nama' => 'DATE_OF_BIRTH',
                'mulai_koordinat_x' => 86,
                'mulai_koordinat_y' => 951,
                'akhir_koordinat_x' => 315,
                'akhir_koordinat_y' => 1297,
                'jumlah_lingkaran' => 46
            ],
            [
                'id_meta_lik' => 7,
                'nama' => 'PACKAGE_NUMBER',
                'mulai_koordinat_x' => 404,
                'mulai_koordinat_y' => 955,
                'akhir_koordinat_x' => 484,
                'akhir_koordinat_y' => 1302,
                'jumlah_lingkaran' => 20
            ],
            [
                'id_meta_lik' => 7,
                'nama' => 'ANSWER',
                'mulai_koordinat_x' => -8,
                'mulai_koordinat_y' => 1405,
                'akhir_koordinat_x' => 1421,
                'akhir_koordinat_y' => 1821,
                'jumlah_lingkaran' => 250
            ],
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
