<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Models\KunciJawaban;
use App\Models\KunciJawabanDetail;

class SeedJawabanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        KunciJawaban::truncate();
        KunciJawabanDetail::truncate();

        $kunci_jawaban = "abcdeedcbaedcbaabcdeabcbaedcdeabcdcabbababbcccddee";
        $array_konversi = ['a' => 0, 'b' => 1, 'c' => 2, 'd' => 3, 'e' => 4];

        $array_index_pilihan = str_split($kunci_jawaban);
        KunciJawaban::insert([
            ['id' => 1, 'nama' => 'Kunci Jawaban 1'],
        ]);

        $list_kunci_jawaban_detail = [];
        foreach( $array_index_pilihan as $nomor_soal => $index_pilihan )
        {
            $list_kunci_jawaban_detail[] = [
                'id_kunci_jawaban'    => 1,
                'nomor_soal'          => $nomor_soal + 1,
                'index_pilihan_benar' => $array_konversi[$index_pilihan],
            ];
        }

        KunciJawabanDetail::insert($list_kunci_jawaban_detail);
        Schema::enableForeignKeyConstraints();
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
