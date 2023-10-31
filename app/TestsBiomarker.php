<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class TestsBiomarker extends Model
{
    use Loggable;
    public function biomarker_categories() {
        return $this->belongsTo(Biomarker::class, 'biomarker_id')->groupBy('biomarker_type');
    }
    public function biomarker_detail() {
        return $this->belongsTo(Biomarker::class, 'biomarker_id');
    }

    public function test_detail() {
        return $this->belongsTo(Test::class, 'test_id');
    }
}
