<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gambar;

class UnggahGambarController extends Controller
{
    protected $direktori_ljk = 'public/lembar_jawaban_komputer';

    public function index()
    {
        return view( 'unggah-gambar.index' );
    }

    public function store( Request $request )
    {
        $lembar_jawaban_komputer = $request->file( 'gambar' );

        $extension = $lembar_jawaban_komputer->getClientOriginalExtension();
        $filename  = Gambar::createFileName() . '.' . $extension;

        $path = $request->file( 'gambar' )->storeAs( $this->direktori_ljk, $filename );

        Gambar::create([
            'nama'   => $filename,
            'status' => 0
        ]);

        $this->createThumbnail( $filename );

        return redirect()->route( 'unggah-gambar.index' );
    }

    private function createThumbnail( $nama_gambar )
    {
        $path_gambar = storage_path( 'app/' . $this->direktori_ljk . '/' . $nama_gambar );
        $gambar = \Image::make( $path_gambar );
        $gambar->resize(400, 400, function( $constraint ){
            $constraint->aspectRatio();
        })->save( storage_path('app/public/thumb_lembar_jawaban_komputer/' .  $nama_gambar) );

        return true;
    }
}
