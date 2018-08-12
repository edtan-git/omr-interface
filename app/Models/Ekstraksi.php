<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ekstraksi extends Model
{
    public $timestamps = false;
    protected $table = 'ekstraksi';
    protected $fillable = [
        'id_gambar', 'nama', 'nomor_siswa', 'tanggal_lahir', 'paket_soal', 'skor', 'finished_at'
    ];

    public function pilihanNama()
    {
        return $this->hasMany( \App\Models\PilihanNama::class, 'id_ekstraksi', 'id' );
    }

    public function pilihanNomorSiswa()
    {
        return $this->hasMany( \App\Models\PilihanNomorSiswa::class, 'id_ekstraksi', 'id' );
    }

    public function pilihanTanggalLahir()
    {
        return $this->hasMany( \App\Models\PilihanTanggalLahir::class, 'id_ekstraksi', 'id' );
    }

    public function pilihanPaketSoal()
    {
        return $this->hasMany( \App\Models\PilihanPaketSoal::class, 'id_ekstraksi', 'id' );
    }

    public function pilihanJawaban()
    {
        return $this->hasMany( \App\Models\PilihanJawaban::class, 'id_ekstraksi', 'id' );
    }
}
