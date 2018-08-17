<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestCaseAnswer extends Model
{
    protected $table = 'test_case_answer';
    protected $fillable = [
        'id_test_case', 'nomor_soal'
    ];
}
