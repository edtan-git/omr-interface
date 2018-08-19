<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MetaLik extends Model
{
    protected $table = 'meta_lik';

    public function details()
    {
        return $this->hasMany( \App\Models\MetaLikDetail::class, 'id_meta_lik', 'id' );
    }

    public function testCase()
    {
        return $this->hasOne( \App\Models\TestCase::class, 'id_meta_lik', 'id' );
    }
}
