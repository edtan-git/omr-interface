<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PilihanPaketSoal extends Model
{
    protected $table = 'pilihan_paket_soal';

    public function details()
    {
        return $this->hasMany( \App\Models\PilihanPaketSoalDetail::class, 'id_pilihan_paket_soal', 'id' );
    }
}
