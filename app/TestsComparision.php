<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class TestsComparision extends Model
{
    use Loggable;
    public function test_detail() {
        return $this->belongsTo(Test::class, 'test_id');
    }

    public function compared_test_detail() {
        return $this->belongsTo(Test::class, 'ref_id');
    }

    public function biomarkers() {
        return $this->hasMany(TestsBiomarker::class, 'test_id','ref_id');
    }

    public function biomarkers_female() {
        return $this->hasMany(TestsFemaleBiomarkerr::class, 'test_id','ref_id');
    }
}
