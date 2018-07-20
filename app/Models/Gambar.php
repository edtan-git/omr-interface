<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gambar extends Model
{
    public $timestamps = true;
    protected $table = 'gambar';
    protected $fillable = [
        'nama', 'status'
    ];

    // relationship
    public function listEkstraksi()
    {
        return $this->hasMany( \App\Models\Ekstraksi::class, 'id_gambar', 'id' );
    }

    public static function createFileName()
    {
        $valid = false;

        while( !$valid )
        {
            $now  = date( 'Ymd_His_' );
            $filename = $now . substr( md5($now), 0, 5 );

            $count_rows = Gambar::where( 'nama', 'like', $filename . '%' )->count();

            if ($count_rows < 1) $valid = true;
        }

        return $filename;
    }
}
