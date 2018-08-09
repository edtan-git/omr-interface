<?php

namespace App\Http\Controllers;

use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Illuminate\Http\Request;

use App\Models\Gambar;
use App\Models\Ekstraksi;

class EkstrakController extends Controller
{
    protected $ekstraksi;
    protected $base_alphabets = [
        'A', 'B', 'C', 'D', 'E', 'F',
        'G', 'H', 'I', 'J', 'K', 'L',
        'M', 'N', 'O', 'P', 'Q', 'R',
        'S', 'T', 'U', 'V', 'W', 'X',
        'Y', 'Z', ' '
    ];
    protected $base_number = [
        '0', '1', '2', '3', '4', '5', '6', '7', '8', '9', ' '
    ];
    protected $input_convert_functions = [
        'NAME' => 'convertInputNama',
        'STUDENT_NUMBER' => 'convertInputNomorSiswa',
        'DATE_OF_BIRTH' => 'convertInputTanggalLahir',
        'PACKAGE_NUMBER' => 'convertInputPaketSoal',
        'ANSWER' => 'convertInputJawaban',
    ];

    public function ekstrak( Gambar $gambar )
    {
        $gambar->load('metaLik');

        $process_query  = "python ";
        $process_query .= "D:\Data\Learn\Python\OMR-Rewrite\omr.py ";
        $process_query .= "-i ";
        $process_query .= "D:\\xampp\htdocs\omr_grader\public\storage\lembar_jawaban_komputer\\" . $gambar->nama . " ";
        $process_query .= "-l " . $gambar->metaLik->nama . " ";
        $process_query .= "-gambarid " . $gambar->id;

        $process = new Process( $process_query );
        $process->run();

        if ( !$process->isSuccessful() )
            throw new ProcessFailedException( $process );

        $respons = json_decode($process->getOutput());
        $ekstraksi = Ekstraksi::findOrFail($respons->id_ekstraksi);
        $ekstraksi->finished_at = date( 'Y-m-d H:i:s' );

        $ekstraksi = $this->convertInput($gambar, $ekstraksi);
        // $ekstraksi = $this->convertInputNama($ekstraksi);
        $ekstraksi->save();

        return redirect()->route( 'gambar.show', ['gambar' => $gambar] );
    }

    public function convertInput( Gambar $gambar, Ekstraksi $ekstraksi )
    {
        $gambar->load( 'metaLik.details' );

        foreach( $gambar->metaLik->details as $meta_lik_detail )
        {
            $nama_input = $meta_lik_detail->nama;
            $convertFunction = $this->input_convert_functions[$nama_input];
            $this->$convertFunction( $ekstraksi );
        }

        $ekstraksi->save();

        // return $ekstraksi;
    }

    private function convertInputNama( Ekstraksi $ekstraksi )
    {
        $ekstraksi->load( 'pilihanNama.details' );

        $nama = '';
        foreach( $ekstraksi->pilihanNama as $pilihan_nama )
        {
            $details_count = count( $pilihan_nama->details );
            if ( $details_count > 0 )
                $index_opsi_terpilih = $pilihan_nama->details[0]->index_opsi_terpilih;
            else
                $index_opsi_terpilih = 26;

            $nama .= $this->base_alphabets[$index_opsi_terpilih];
        }

        $nama = trim($nama);
        $ekstraksi->nama = $nama;

        return $ekstraksi;
    }

    private function convertInputNomorSiswa( Ekstraksi $ekstraksi )
    {
        $ekstraksi->load( 'pilihanNomorSiswa.details' );

        $nomor_siswa = '';
        foreach( $ekstraksi->pilihanNomorSiswa as $pilihan_nomor_siswa )
        {
            $details_count = count( $pilihan_nomor_siswa->details );
            if ( $details_count > 0 )
                $index_opsi_terpilih = $pilihan_nomor_siswa->details[0]->index_opsi_terpilih;
            else
                $index_opsi_terpilih = 11;

            $nomor_siswa .= $this->base_number[$index_opsi_terpilih];
        }

        $nomor_siswa = trim($nomor_siswa);
        $ekstraksi->nomor_siswa = $nomor_siswa;

        return $ekstraksi;
    }

    private function convertInputTanggalLahir( Ekstraksi $ekstraksi )
    {
        $ekstraksi->load( 'pilihanTanggalLahir.details' );

        $tanggal_lahir = '';
        foreach( $ekstraksi->pilihanTanggalLahir as $pilihan_tanggal_lahir )
        {
            $details_count = count( $pilihan_tanggal_lahir->details );
            if ( $details_count > 0 )
                $index_opsi_terpilih = $pilihan_tanggal_lahir->details[0]->index_opsi_terpilih;
            else
                $index_opsi_terpilih = 11;

            $tanggal_lahir .= $this->base_number[$index_opsi_terpilih];
        }

        $tanggal_lahir = trim($tanggal_lahir);

        if ( !(strlen($tanggal_lahir) == 6) )
        {
            $tanggal_lahir = str_pad($tanggal_lahir, 6, '0');
        }

        $tanggal_lahir = chunk_split($tanggal_lahir, 2, '|');
        $tanggal_lahir = explode('|', substr($tanggal_lahir, 0, -1));
        $tanggal_lahir[2] = '19' . $tanggal_lahir[2];
        $tanggal_lahir = array_reverse($tanggal_lahir);
        $ekstraksi->tanggal_lahir = implode($tanggal_lahir, '-');

        return $ekstraksi;
    }

    private function convertInputPaketSoal( Ekstraksi $ekstraksi )
    {
        $ekstraksi->load( 'pilihanPaketSoal.details' );

        $paket_soal = '';
        foreach( $ekstraksi->pilihanPaketSoal as $pilihan_paket_soal )
        {
            $details_count = count( $pilihan_paket_soal->details );
            if ( $details_count > 0 )
                $index_opsi_terpilih = $pilihan_paket_soal->details[0]->index_opsi_terpilih;
            else
                $index_opsi_terpilih = 11;

            $paket_soal .= $this->base_number[$index_opsi_terpilih];
        }

        $paket_soal = trim($paket_soal);
        $ekstraksi->paket_soal = $paket_soal;

        return $ekstraksi;
    }

    private function convertInputJawaban( Ekstraksi $ekstraksi )
    {

    }

}
