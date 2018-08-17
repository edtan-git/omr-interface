<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gambar;
use App\Models\TestCase;
use App\Models\TestCaseAnswer;
use App\Models\TestCaseAnswerDetail;

class HelpDevController extends Controller
{
    public function index( Gambar $gambar )
    {
        $gambar->load('ekstraksiTerakhir.pilihanJawaban.details');
        $ekstaksi_terakhir = $gambar->ekstraksiTerakhir;

        foreach( $ekstaksi_terakhir->pilihanJawaban as $pilihan_jawaban )
        {
            foreach( $pilihan_jawaban->details as $detail )
            {
                
            }
        }
    }
}
