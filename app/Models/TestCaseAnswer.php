<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestCaseAnswer extends Model
{
    protected $table = 'test_case_answer';
    protected $fillable = [
        'id_test_case', 'nomor_soal'
    ];

    public function details()
    {
        return $this->hasMany( \App\Models\TestCaseAnswerDetail::class, 'id_test_case_answer', 'id' );
    }
}
