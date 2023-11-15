<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class BiomarkerType extends Model
{
    use SoftDeletes,Loggable;
    protected $dates = ['deleted_at'];

    public function biomarkers() {
        return $this->hasMany(Biomarker::class, 'biomarker_type');
    }
}
