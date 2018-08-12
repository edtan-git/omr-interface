<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BulkEkstraksiProcess extends Model
{
    protected $table = 'bulk_ekstraksi_process';
    protected $fillable = ['status_sukses', 'status_coba', 'id_gambar'];

    public function gambar()
    {
        return $this->hasOne( \App\Models\Gambar::class, 'id', 'id_gambar' );
    }
}
