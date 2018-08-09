<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Models\MetaLik;
use App\Models\MetaLikDetail;

class InsertDataToMetaLik extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        MetaLik::insert([
            ['id' => 1, 'nama' => '01', 'koordinat_x' => 0, 'koordinat_y' => 0, 'jumlah_lingkaran' => 0],
            ['id' => 2, 'nama' => '02', 'koordinat_x' => 0, 'koordinat_y' => 0, 'jumlah_lingkaran' => 0],
            ['id' => 3, 'nama' => '03', 'koordinat_x' => 0, 'koordinat_y' => 0, 'jumlah_lingkaran' => 0],
            ['id' => 4, 'nama' => '04', 'koordinat_x' => 0, 'koordinat_y' => 0, 'jumlah_lingkaran' => 0],
            ['id' => 5, 'nama' => '05', 'koordinat_x' => 0, 'koordinat_y' => 0, 'jumlah_lingkaran' => 0],
            ['id' => 6, 'nama' => '06', 'koordinat_x' => 0, 'koordinat_y' => 0, 'jumlah_lingkaran' => 0],
            ['id' => 7, 'nama' => '07', 'koordinat_x' => 0, 'koordinat_y' => 0, 'jumlah_lingkaran' => 0],
        ]);

        MetaLikDetail::insert([
            [
                'id_meta_lik' => 1,
                'nama' => 'NAME',
                'mulai_koordinat_x' => 594,
                'mulai_koordinat_y' => 924,
                'akhir_koordinat_x' => 1345,
                'akhir_koordinat_y' => 1818,
                'jumlah_lingkaran' => 520
            ],
            [
                'id_meta_lik' => 1,
                'nama' => 'STUDENT_NUMBER',
                'mulai_koordinat_x' => 76,
                'mulai_koordinat_y' => 915,
                'akhir_koordinat_x' => 541,
                'akhir_koordinat_y' => 1269,
                'jumlah_lingkaran' => 90
            ],
            [
                'id_meta_lik' => 1,
                'nama' => 'ANSWER',
                'mulai_koordinat_x' => -14,
                'mulai_koordinat_y' => 399,
                'akhir_koordinat_x' => 1432,
                'akhir_koordinat_y' => 804,
                'jumlah_lingkaran' => 250
            ],
            [
                'id_meta_lik' => 2,
                'nama' => 'NAME',
                'mulai_koordinat_x' => 591,
                'mulai_koordinat_y' => 488,
                'akhir_koordinat_x' => 1345,
                'akhir_koordinat_y' => 1386,
                'jumlah_lingkaran' => 520
            ],
            [
                'id_meta_lik' => 2,
                'nama' => 'STUDENT_NUMBER',
                'mulai_koordinat_x' => 79,
                'mulai_koordinat_y' => 486,
                'akhir_koordinat_x' => 538,
                'akhir_koordinat_y' => 841,
                'jumlah_lingkaran' => 90
            ],
            [
                'id_meta_lik' => 2,
                'nama' => 'ANSWER',
                'mulai_koordinat_x' => -9,
                'mulai_koordinat_y' => 1416,
                'akhir_koordinat_x' => 1418,
                'akhir_koordinat_y' => 1832,
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
