<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Models\KunciJawaban;
use App\Models\KunciJawabanDetail;

class SeedJawabanTableLayout02 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        KunciJawaban::where( 'id', 2 )->delete();
        KunciJawabanDetail::where( 'id_kunci_jawaban', 2 )->delete();

        $kunci_jawaban = "becaecbedaeadddbcdaeadcbebeadccadbeacdbebecbdbecbe";
        $array_konversi = ['a' => 0, 'b' => 1, 'c' => 2, 'd' => 3, 'e' => 4, '-' => 5];

        $array_index_pilihan = str_split($kunci_jawaban);
        KunciJawaban::insert([
            ['id' => 2, 'nama' => 'Kunci Jawaban 2'],
        ]);

        $list_kunci_jawaban_detail = [];
        foreach( $array_index_pilihan as $nomor_soal => $index_pilihan )
        {
            $list_kunci_jawaban_detail[] = [
                'id_kunci_jawaban'    => 2,
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
