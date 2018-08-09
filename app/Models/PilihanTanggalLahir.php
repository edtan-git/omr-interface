<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PilihanTanggalLahir extends Model
{
    protected $table = 'pilihan_tanggal_lahir';

    public function details()
    {
        return $this->hasMany( \App\Models\PilihanTanggalLahirDetail::class, 'id_pilihan_tanggal_lahir', 'id' );
    }
}
