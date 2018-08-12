<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BulkEkstraksiProcess;
use App\Jobs\ProcessEkstrakGambar;

class BulkEkstrakController extends Controller
{
    public function index()
    {

    }

    public function store( Request $request )
    {
        $list_gambar = [];
        foreach( $request->gambar as $gambar )
        {
            $list_gambar[] = [
                'id_gambar' => $gambar
            ];
        }

        BulkEkstraksiProcess::insert( $list_gambar );
        ProcessEkstrakGambar::dispatch();

        return redirect()->route( 'gambar.index' );
    }
}
