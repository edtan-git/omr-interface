<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PilihanJawaban extends Model
{
    protected $table = 'pilihan_jawaban';

    public function details()
    {
        return $this->hasMany( \App\Models\PilihanJawabanDetail::class, 'id_pilihan_jawaban', 'id' );
    }

    public function detail()
    {
        return $this->hasOne( \App\Models\PilihanJawabanDetail::class, 'id_pilihan_jawaban', 'id' )
            ->orderBy('index_opsi_terpilih', 'ASC');
    }
}
