<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gambar;
use App\Models\TestCase;
use App\Models\TestCaseAnswer;
use App\Models\TestCaseAnswerDetail;

use \Excel;

class HelpDevController extends Controller
{
    public function index( Gambar $gambar )
    {
        $gambar->load('ekstraksiTerakhir.pilihanJawaban.details');
        $ekstaksi_terakhir = $gambar->ekstraksiTerakhir;

        $test_case = TestCase::create([
            'id_meta_lik'   => $gambar->meta_lik_id,
            'nama'          => $ekstaksi_terakhir->nama,
            'nomor_siswa'   => $ekstaksi_terakhir->nomor_siswa,
            'tanggal_lahir' => $ekstaksi_terakhir->tanggal_lahir === '0000-00-00' ? NULL : $ekstaksi_terakhir->tanggal_lahir,
            'paket_soal'    => $ekstaksi_terakhir->paket_soal,
        ]);

        foreach( $ekstaksi_terakhir->pilihanJawaban as $pilihan_jawaban )
        {
            $test_case_answer = TestCaseAnswer::create([
                'id_test_case' => $test_case->id,
                'nomor_soal'   => $pilihan_jawaban->nomor_soal,
            ]);

            foreach( $pilihan_jawaban->details as $detail )
            {
                TestCaseAnswerDetail::create([
                    'id_test_case_answer' => $test_case_answer->id,
                    'index_terpilih'      => $detail->index_opsi_terpilih
                ]);
            }
        }
    }


    public function cekPersentase( Gambar $gambar )
    {
        $id_meta_lik = $gambar->meta_lik_id;
        $gambar->load( 'metaLik.testCase.answers.details', 'ekstraksiTerakhir.pilihanJawaban.details' );

        $test_case = $gambar->metaLik->testCase;
        $ekstraksi_terakhir = $gambar->ekstraksiTerakhir;

        $ekstraksi_pilihan_jawaban = $ekstraksi_terakhir->pilihanJawaban->keyBy('nomor_soal');
        $test_case_answers = $test_case->answers->keyBy('nomor_soal');

        $score_total = 0;
        $score = $this->compareString( $test_case->nama, $ekstraksi_terakhir->nama, 20 );
        $score_total += $score;
        echo "Nama : " . $test_case->nama . " - " . $ekstraksi_terakhir->nama . " -> SCORE " . $score . "<br>";
        $score = $this->compareString( $test_case->nomor_siswa, $ekstraksi_terakhir->nomor_siswa, 10 );
        $score_total += $score;
        echo "Nomor Siswa : " . $test_case->nomor_siswa . " - " . $ekstraksi_terakhir->nomor_siswa . " -> SCORE " . $score . "<br>";
        $score = $this->compareString( $test_case->paket_soal, $ekstraksi_terakhir->paket_soal, 2 );
        $score_total += $score;
        echo "Paket Soal : " . $test_case->paket_soal . " - " . $ekstraksi_terakhir->paket_soal . " -> SCORE " . $score . "<br>";
        $score = $this->compareString( $test_case->tanggal_lahir, $ekstraksi_terakhir->tanggal_lahir, 10 );
        $score_total += $score;
        echo "Tanggal Lahir : " . $test_case->tanggal_lahir . " - " . $ekstraksi_terakhir->tanggal_lahir . " -> SCORE " . $score . "<br>";

        echo "Jawaban<br>";
        $total_terpilih_seharusnya = 0;
        $total_terpilih = 0;
        foreach( $test_case_answers as $nomor_soal => $test_case_answer )
        {
            $test_case_answer_details = $test_case_answer->details->keyBy('index_terpilih');
            if ( !isset($ekstraksi_pilihan_jawaban[$nomor_soal]) )
            {
                continue;
            }
            $ekstraksi = $ekstraksi_pilihan_jawaban[$nomor_soal];
            $ekstraksi_answer_details = $ekstraksi->details->keyBy('index_opsi_terpilih');

            $total_terpilih_seharusnya += count( $test_case_answer_details );
            foreach( $test_case_answer_details as $index_terpilih => $test_case_answer_detail )
            {
                if ( isset($ekstraksi_answer_details[$index_terpilih]) )
                {
                    $total_terpilih += 1;
                    echo $nomor_soal . " " . $index_terpilih . " SELECTED";
                }
                else
                {
                    echo $nomor_soal . " " . $index_terpilih . " NOT SELECTED";
                }
                echo "<br>";
            }
        }

        if ( $total_terpilih_seharusnya == 0 ) $total_terpilih_seharusnya = 1;
        $score_jawaban = ($total_terpilih * 100) / $total_terpilih_seharusnya;
        echo '-> SCORE : ' . $score_jawaban . "<br>";

        $score_total += $score_jawaban;
        echo "SCORE AKHIR : " . ($score_total / 5);
    }

    public function compareString( $string_1, $string_2, $data_length )
    {
        if ( $string_1 == $string_2 )
            return 100;
        else
        {
            $string_1 = str_pad($string_1, $data_length, " ");
            $string_2 = str_pad($string_2, $data_length, " ");
            $string_1 = str_split( $string_1 );
            $string_2 = str_split( $string_2 );

            $total_right = 0;
            foreach( $string_1 as $index => $item )
            {
                if ( isset($string_2[$index]) )
                    if ( $item == $string_2[$index] ) $total_right += 1;
            }
            return ($total_right * 100)/ $data_length;
        }
    }

    public function createExcel()
    {
        Excel::create( 'filename', function( $excel ){
            $excel->sheet( 'sheetname', function( $sheet ){
                $sheet->row(1, [
                    ''
                ]);
            });
        })->download( 'xls' );
    }
}
