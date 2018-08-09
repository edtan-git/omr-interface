<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PilihanNama extends Model
{
    protected $table = 'pilihan_nama';

    public function details()
    {
        return $this->hasMany( \App\Models\PilihanNamaDetail::class, 'id_pilihan_nama', 'id' );
    }
}
