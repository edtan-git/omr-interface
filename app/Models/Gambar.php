<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gambar extends Model
{
    use SoftDeletes;

    public $timestamps = true;
    protected $table = 'gambar';
    protected $fillable = [
        'nama', 'status', 'meta_lik_id'
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

    public function metaLik()
    {
        return $this->hasOne( \App\Models\MetaLik::class, 'id', 'meta_lik_id' );
    }
}
