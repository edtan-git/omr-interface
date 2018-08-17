<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestCaseAnswerDetail extends Model
{
    protected $table = 'test_case_answer_detail';
    protected $fillable = [
        'id_test_case_answer', 'index_terpilih'
    ];
}
