<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PilihanNomorSiswa extends Model
{
    protected $table = 'pilihan_nomor_siswa';

    public function details()
    {
        return $this->hasMany( \App\Models\PilihanNomorSiswaDetail::class, 'id_pilihan_nomor_siswa', 'id' );
    }
}
