<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestCase extends Model
{
    protected $table = 'test_case';
    protected $fillable = [
        'id_meta_lik', 'nama', 'nomor_siswa', 'tanggal_lahir', 'paket_soal'
    ];
}
