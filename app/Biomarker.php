<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class Biomarker extends Model
{
    use SoftDeletes,Loggable;
    protected $dates = ['deleted_at'];

    public function biomarker_type_detail() {
        return $this->belongsTo(BiomarkerType::class, 'biomarker_type');
    }
}
