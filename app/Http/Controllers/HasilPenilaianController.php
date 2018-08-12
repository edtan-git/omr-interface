<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MetaLik;
use App\Models\Gambar;

class HasilPenilaianController extends Controller
{
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

    public function index( Request $request )
    {
        if ( $request->has('tanggal_unggah') )
        {
            $tanggal_unggah_start = date( 'Y-m-d 00:00:00', strtotime($request->tanggal_unggah[0]) );
            $tanggal_unggah_end = date( 'Y-m-d 23:59:59', strtotime($request->tanggal_unggah[1]) );
        }
        else
        {
            $tanggal_unggah_start = date( 'Y-m-d 00:00:00' );
            $tanggal_unggah_end = date( 'Y-m-d 23:59:59' );
        }
        $list_meta_lik = MetaLik::all();

        $list_gambar = Gambar::with([
                'ekstraksiTerakhir.pilihanJawaban.detail' => function( $query )
                {
                    $query->select(
                        'pilihan_jawaban_detail.id_pilihan_jawaban',
                        'pilihan_jawaban_detail.index_opsi_terpilih',
                        'pilihan_jawaban_detail.status_kebenaran'
                    );
                },
                'metaLik'
            ])
            ->where( 'created_at', '>=', $tanggal_unggah_start )
            ->where( 'created_at', '<=', $tanggal_unggah_end );
        if ( $request->has('layout_id') && $request->layout_id != 0 )  $list_gambar->where('meta_lik_id', $request->layout_id);

        $list_gambar = $list_gambar->get();

        return view( 'hasil-penilaian.index', [
            'list_meta_lik'  => $list_meta_lik,
            'list_gambar'    => $list_gambar,
            'base_alphabets' => $this->base_alphabets,

            'request' => $request
        ]);
    }
}
