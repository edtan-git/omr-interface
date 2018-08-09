<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gambar;
use App\Models\Ekstraksi;
use App\Models\MetaLik;

class GambarController extends Controller
{
    protected $direktori_ljk = 'storage/lembar_jawaban_komputer';
    protected $direktori_thumb_ljk = 'storage/thumb_lembar_jawaban_komputer';

    public function index()
    {
        $list_gambar = Gambar::with('metaLik')->get();

        $data = [
            'list_gambar'   => $list_gambar,
        ];

        return view( 'gambar.index', $data );
    }

    public function show( Gambar $gambar )
    {
        $data = [
            'gambar'              => $gambar,
            'list_ekstraksi'      => $gambar->listEkstraksi,
            'direktori_ljk'       => $this->direktori_ljk,
            'direktori_thumb_ljk' => $this->direktori_thumb_ljk,
        ];

        return view( 'gambar.show', $data );
    }

    public function destroy( Gambar $gambar )
    {
        $gambar->delete();

        return redirect()->route( 'gambar.index' );
    }
}
